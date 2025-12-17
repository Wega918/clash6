/**
 * storage_modal.js
 * Логика для динамической загрузки и навигации в модальном окне хранилищ
 */

(function() {
    // Безопасное чтение csrfToken
    const csrfToken = (typeof window.APP_CONFIG !== 'undefined' && window.APP_CONFIG.csrfToken)
                        ? window.APP_CONFIG.csrfToken
                        : document.querySelector('meta[name="csrf_token"]').content;
                        
    if (!csrfToken) {
        console.error("CSRF Token is missing. Modal functionality disabled.");
        return;
    }
                        
    const historyStack = [];

    /**
     * Начинает процесс открытия модального окна и загружает главный вид.
     */
    window.showStorageModal = function(view, type = '', id = 0) {
        // Добавляем небольшую задержку, чтобы гарантировать, что DOM-элемент
        // модального окна уже существует, если он был только что вставлен AJAX-ом.
        setTimeout(() => {
            const modal = document.getElementById('storage-modal');
            
            if (!modal) {
                 // Этот лог выдает ошибку, если элемент не найден даже после паузы
                 console.error("Storage modal element (#storage-modal) not found. Убедитесь, что HTML-структура присутствует в AJAX-ответе.");
                 return;
            }
            
            // Очищаем историю при первом открытии
            historyStack.length = 0; 
            loadContent(view, type, id, true);
            modal.classList.add('active');
        }, 50); // Пауза 50 мс
    }

    /**
     * Загружает контент через AJAX и управляет историей.
     */
    function loadContent(view, type = '', id = 0, isInitial = false) {
        const modal = document.getElementById('storage-modal');
        const modalContent = document.getElementById('storage-modal-content');

        if (!modal || !modalContent) {
            return; 
        }
        
        let url = `ajax.php?page=storage&view=${view}`;
        if (type) url += `&type=${type}`;
        if (id) url += `&id=${id}`;
        
        // Управление историей
        if (!isInitial) {
            const currentState = historyStack.length > 0 ? historyStack[historyStack.length - 1] : { view: 'main' };
            if (currentState.view !== view || currentState.type !== type || currentState.id !== id) {
                 historyStack.push({ view, type, id });
            }
        }
        
        // Показываем лоадер
        modalContent.innerHTML = `<div style="text-align:center; padding: 40px;"><div class="loader-spinner"></div> Загрузка...</div>`; 
        
        fetch(url, {
            method: 'GET',
            headers: { 'X-CSRF-Token': csrfToken, 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(response => {
            if (!response.ok) {
                const contentType = response.headers.get("content-type");
                
                if (contentType && contentType.indexOf("application/json") !== -1) {
                    return response.json().then(data => Promise.reject(data.error || `Ошибка HTTP: ${response.status}`));
                } else {
                    // КРИТИЧЕСКОЕ ИСПРАВЛЕНИЕ: Получаем полный текст ответа сервера, который содержит ошибку PHP.
                    return response.text().then(text => Promise.reject({
                        message: `Ошибка HTTP ${response.status}: Произошла ошибка на сервере.`, 
                        fullText: text // Сохраняем полный текст ответа
                    })); 
                }
            }
			
            return response.text();
        })
        .then(html => {
            modalContent.innerHTML = html;
        })
        .catch(error => {
            console.error('Ошибка загрузки модального окна:', error);
            
            // ИСПРАВЛЕНИЕ: Проверяем, есть ли полный текст ответа сервера
            if (error.fullText) {
                // Если есть полный текст (который содержит HTML/текст PHP ошибки), выводим его.
                modalContent.innerHTML = `<div class="modal-content"><button class="close-modal" onclick="hideModal('storage-modal')">×</button>
                                          <div class="error-container" style="margin: 20px; color: black; background: white; padding: 15px; border: 1px solid red; overflow: auto; max-height: 70vh;">
                                            <h3>❌ Ошибка сервера (HTTP 500)</h3>
                                            <p>Ниже приводится полный вывод сервера, содержащий подробную информацию об ошибке PHP:</p>
                                            ${error.fullText}
                                          </div>
                                        </div>`;
            } else {
                // Иначе выводим стандартное сообщение
                const errorMessage = (typeof error === 'object' && error.message) ? error.message : String(error);
                modalContent.innerHTML = `<div class="modal-content"><button class="close-modal" onclick="hideModal('storage-modal')">×</button><div class="error" style="margin: 20px;">❌ Ошибка загрузки: ${errorMessage}</div></div>`;
            }
        });
    }

    // --- Глобальные функции для кликабельности в HTML ---
    window.loadStorageList = function(storageType) { loadContent('list', storageType); }
    window.loadStorageDetail = function(buildingId) { loadContent('detail', '', buildingId); }
    
    window.goBack = function(defaultView, defaultType = '') {
        historyStack.pop(); 
        const previousState = historyStack.pop(); 
        if (previousState) {
             loadContent(previousState.view, previousState.type, previousState.id, true);
        } else {
            loadContent('main', '', 0, true);
        }
    }
    
    // --- Заглушки для действий ---
    window.collectResource = function(buildingId, buildingType) { alert(`Сбор ресурсов со здания ID ${buildingId} (${buildingType}).`); }
    window.startUpgrade = function(buildingId, nextLevel) { alert(`Начато улучшение здания ID ${buildingId} до уровня ${nextLevel}.`); }

})();
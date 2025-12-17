/**
 * storage_modal.js
 * Логика для динамической загрузки и навигации в модальном окне хранилищ И производства.
 */

(function() {
    // Функция для безопасного получения CSRF токена.
    const getCsrfToken = () => {
        if (typeof window.APP_CONFIG !== 'undefined' && window.APP_CONFIG.csrfToken) {
            return window.APP_CONFIG.csrfToken;
        }
        const meta = document.querySelector('meta[name="csrf_token"]');
        if (meta) {
            return meta.content;
        }
        return '';
    };

    const historyMap = new Map(); // Key: modalId, Value: historyStack

    /**
     * Инициализирует и открывает модальное окно.
     */
    window.showDynamicModal = function(modalId, view, type = '', id = 0) {
        setTimeout(() => {
            const modal = document.getElementById(modalId);
            
            if (!modal) {
                 console.error(`Dynamic modal element (#${modalId}) not found.`);
                 return;
            }
            
            historyMap.set(modalId, []);
            loadContent(modalId, view, type, id, 'storage', true); 
            modal.classList.add('active');
        }, 50); 
    }

    window.showStorageModal = function(view, type = '', id = 0) {
        window.showDynamicModal('storage-modal', view, type, id);
    }
    
    window.showProductionModal = function(view, type = '', id = 0) {
        window.showDynamicModal('production-modal', view, type, id);
    }

    /**
     * Загружает контент через AJAX и управляет историей.
     */
    function loadContent(modalId, view, type = '', id = 0, pageRoute, isInitial = false) {
        const modalContentId = modalId + '-content';
        const modalContent = document.getElementById(modalContentId);
        let historyStack = historyMap.get(modalId);
        
        if (!modalContent || !historyStack) {
            return; 
        }
        
        const csrfToken = getCsrfToken(); 
        
        let url = `ajax.php?page=${pageRoute}&view=${view}`;
        if (type) url += `&type=${type}`;
        if (id) url += `&id=${id}`;
        
        // Управление историей
        if (!isInitial) {
            const currentState = historyStack.length > 0 ? historyStack[historyStack.length - 1] : { view: 'main' };
            if (currentState.view !== view || currentState.type !== type || currentState.id !== id) {
                 historyStack.push({ view, type, id, pageRoute }); 
            }
        } else {
             historyStack.push({ view, type, id, pageRoute });
        }
        historyMap.set(modalId, historyStack);

        // Показываем лоадер
        modalContent.innerHTML = `
            <div class="modal-loading-content">
                <div class="loader-spinner"></div> 
                <div class="loader-text">Загрузка...</div>
            </div>
        `; 
        
        fetch(url, {
            method: 'GET',
            headers: { 
                'X-CSRF-Token': csrfToken, 
                'X-Requested-With': 'XMLHttpRequest' 
            }
        })
        .then(response => {
            if (!response.ok) {
                const contentType = response.headers.get("content-type");
                
                if (contentType && contentType.indexOf("application/json") !== -1) {
                    return response.json().then(data => Promise.reject(data.error || `Ошибка HTTP: ${response.status}`));
                } else {
                    return response.text().then(text => Promise.reject({
                        message: `Ошибка HTTP ${response.status}: Произошла ошибка на сервере.`, 
                        fullText: text 
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
            
            // Здесь используем минимальный HTML, так как модальное окно должно отображать ошибку
            // Кнопки "Назад" и "Закрыть" должны быть добавлены только в HTML из роутера
            modalContent.innerHTML = `<div class="modal-content">
                                        <button class="close-modal close-top-right modal-button-corner" onclick="hideModal('${modalId}')">
                                            <img src="/images/icons/close.png" alt="Закрыть">
                                        </button>
                                        <div class="error-container" style="margin: 20px; padding: 15px; overflow: auto; max-height: 70vh;">
                                            <h3>❌ Ошибка загрузки</h3>
                                            <p>${(typeof error === 'object' && error.message) ? error.message : String(error)}</p>
                                            ${error.fullText ? `<pre style="font-size:10px; background:#eee; padding:5px;">${error.fullText}</pre>` : ''}
                                        </div>
                                      </div>`;
        });
    }

    // --- Глобальные функции для кликабельности в HTML (с учетом modalId) ---
    window.loadStorageList = function(modalId, storageType) { loadContent(modalId, 'list', storageType, 0, 'storage', false); }
    window.loadStorageDetail = function(modalId, buildingId) { loadContent(modalId, 'detail', '', buildingId, 'storage', false); }
    window.collectResource = function(modalId, buildingId) { loadContent(modalId, 'collect', '', buildingId, 'storage', false); }
    window.startUpgrade = function(modalId, buildingId) { loadContent(modalId, 'upgrade', '', buildingId, 'storage', false); } 
    window.startBuilding = function(modalId, buildingType) { loadContent(modalId, 'buy', buildingType, 0, 'storage', false); }
    
    // goBack теперь требует modalId для работы со своей историей
    window.goBack = function(modalId, defaultView, type = '') {
        let historyStack = historyMap.get(modalId);
        
        if (!historyStack || historyStack.length <= 1) { 
             const pageRoute = 'storage';
             return loadContent(modalId, defaultView, type, 0, pageRoute, true);
        }
        
        historyStack.pop(); 
        const previousState = historyStack[historyStack.length - 1]; 
        
        if (previousState) {
             loadContent(modalId, previousState.view, previousState.type, previousState.id, previousState.pageRoute, true);
        } else {
            const pageRoute = 'storage'; 
            loadContent(modalId, defaultView, type, 0, pageRoute, true);
        }
    }
    
})();
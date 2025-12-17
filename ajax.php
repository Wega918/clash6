<?php
// ajax.php

// 1. Загрузка основных функций (содержит getUser)
require_once 'system/function.php';

// 2. Загрузка данных игры. 
require_once 'system/game_data.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Установка окружения (если не задано)
if (!defined('ENVIRONMENT')) {
    define('ENVIRONMENT', 'production');
}

// Проверка необходимых функций и переменных
if (!function_exists('isLoggedIn')) {
    die(json_encode(['error' => 'Функция isLoggedIn не определена']));
}
if (!function_exists('getUser')) {
    die(json_encode(['error' => 'Функция getUser не определена']));
}
if (!isset($mysqli)) {
    die(json_encode(['error' => '$mysqli не определена']));
}

// Безопасная инициализация сессии
$sessionParams = [
    'lifetime' => 86400,
    'path' => '/',
    'domain' => $_SERVER['HTTP_HOST'],
    'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
    'httponly' => true,
    'samesite' => 'Strict'
];

if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params($sessionParams);
    session_start();
}

// Инициализация CSRF токена
if (empty($_SESSION['csrf_token'])) {
    try {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    } catch (Exception $e) {
        // Fallback
    }
}

try {
    // Валидация страницы ДО проверки CSRF для условного пропуска
    $allowedPages = ['home', 'buildings', 'army', 'storage']; 
    $page = $_GET['page'] ?? 'home';
    if (!in_array($page, $allowedPages)) {
        $page = 'home';
    }
    
    // Проверка метода запроса и CSRF токена
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !check_csrf($_POST['csrf_token'] ?? '')) {
        throw new RuntimeException('Недействительный CSRF токен', 403);
    }
    
    // *** ИСПРАВЛЕНИЕ: Пропускаем строгую проверку CSRF для начальной загрузки страницы (page=home) ***
    // Проверка CSRF-токена для AJAX-запросов (Header check)
    if ($page !== 'home') {
        verifyCsrfAjax();
    }


    // Проверка авторизации
    if (!isLoggedIn()) {
        throw new RuntimeException('Требуется авторизация', 401);
    }

    // Получение данных пользователя (с обновлением ресурсов)
    $user = getUser($mysqli);
    if (empty($user['id'])) {
        throw new RuntimeException('Данные пользователя недействительны', 403);
    }

    // Подготовка данных
    $userData = [
        'id' => toInt($user['id'] ?? 0), 
        'login' => cleanString($user['login'] ?? 'Гость'),
        'gold' => toInt($user['gold'] ?? 0),
        'elixir' => toInt($user['elixir'] ?? 0),
        'dark_elixir' => toInt($user['dark_elixir'] ?? 0),
        'gems' => toInt($user['gems'] ?? 0),
        'townhall_lvl' => toInt($user['townhall_lvl'] ?? 1, 1, 20),
        'csrf_token' => $_SESSION['csrf_token']
    ];

    // Генерация контента
    $content = generatePageContent($page, $userData);

    // Отправка CSRF токена в заголовке
    header('X-CSRF-Token: ' . $_SESSION['csrf_token']);
    echo $content;

} catch (Throwable $e) {
    handleError($e, true); // Включаем AJAX-режим
}

/**
 * Генерирует HTML-содержимое страницы
 */
function generatePageContent(string $page, array $userData): string {
    ob_start();
    
	
	?>
<?
switch ($page) {
case 'home':
?>

  <div class="page-wrapper">

<div class="village-map">
  <div class="building" style="top: 16%;left: 65%;transform: rotate(0deg);" onclick="showProductionModal('production_main')">
    <div class="building-label">Производство</div>
    <img src="/images/building/production.png" alt="Производство">
    <div class="building-shadow"></div>
  </div>

<div class="building" style="top: 5%;right: 63%;transform: rotate(0deg);" onclick="showStorageModal('main')">
    <div class="building-label">Хранилища</div>
    <img src="/images/building/storage.png" alt="Хранилища">
    <div class="building-shadow"></div>
  </div>

<div class="building" style="top: 41%;right: 54%;transform: rotate(0deg);" onclick="showBuildingModal('townhall')">
    <div class="building-label">Ратуша</div>
    <img src="https://support.supercell.com/images/icon_CoC_Account_v1.png?v=1669362208" alt="Ратуша">
    
  </div>

<div class="building mirror" style="top: 39.47%;left: 66%;transform: rotate(1deg);" onclick="showBuildingModal('barracks')">
    <div class="building-label">Казармы</div>
    <img src="/images/building/barracks.png" alt="Казармы">
  </div>

<div class="building mirror" style="top: 19%;left: 44%;transform: translateX(-50%) rotate(0deg);" onclick="showBuildingModal('defense')">
    <div class="building-label">Оборона</div>
    <img src="/images/building/defense.png" alt="Оборона">
    <div class="building-shadow"></div>
  </div>

<div class="building mirror" style="bottom: 25%;left: 75%;transform: rotate(0deg);" onclick="showBuildingModal('lab')">
    <div class="building-label">Лаборатория</div>
    <img src="/images/building/lab.png" alt="Лаборатория">
  </div>

<div class="building" style="bottom: 17%;left: 15%;transform: translateX(-50%) rotate(-1deg);" onclick="showBuildingModal('clan')">
    <div class="building-label">Клановая крепость</div>
    <img src="/images/building/clan.png" alt="Клановая крепость">
    <div class="building-shadow"></div>
  </div>
</div>


<div id="production-modal" class="modal-overlay">
  <div class="modal-content" id="production-modal-content">
    </div>
</div>

<div id="storage-modal" class="modal-overlay">
  <div class="modal-content" id="storage-modal-content">
    </div>
</div>

<div id="townhall-modal" class="modal-overlay">
  <div class="modal-content">
    <button class="close-modal close-top-right modal-button-corner" onclick="hideModal('townhall-modal')"><img src="/images/icons/close.png" alt="Закрыть"></button>
    <div class="modal-header-controls">
        <div class="modal-title-bar">
            <h2 class="modal-title-text-inside-panel">РАТУША</h2>
        </div>
    </div>
    
    <div class="modal-body-custom">
        <p>🏛 Ратуша: уровень <?= $userData['townhall_lvl'] ?></p>
        <p>Это главное здание вашей деревни. Улучшение ратуши открывает новые возможности.</p>
    </div>
  </div>
</div>

<div id="barracks-modal" class="modal-overlay">
  <div class="modal-content">
    <button class="close-modal close-top-right modal-button-corner" onclick="hideModal('barracks-modal')"><img src="/images/icons/close.png" alt="Закрыть"></button>
    <div class="modal-header-controls">
        <div class="modal-title-bar">
            <h2 class="modal-title-text-inside-panel">КАЗАРМЫ</h2>
        </div>
    </div>
    <div class="modal-body-custom">
        <p>Здесь вы тренируете войска.</p>
        <p>Доступные юниты:</p>
        <ul>
        <li>Воины (уровень 1)</li>
        <li>Лучники (уровень 1)</li>
        </ul>
    </div>
  </div>
</div>

<div id="defense-modal" class="modal-overlay">
  <div class="modal-content">
    <button class="close-modal close-top-right modal-button-corner" onclick="hideModal('defense-modal')"><img src="/images/icons/close.png" alt="Закрыть"></button>
    <div class="modal-header-controls">
        <div class="modal-title-bar">
            <h2 class="modal-title-text-inside-panel">ОБОРОНА</h2>
        </div>
    </div>
    <div class="modal-body-custom">
        <p>Здания защиты вашей деревни.</p>
        <p>Доступные защиты:</p>
        <ul>
        <li>Пушка (уровень 2)</li>
        <li>Арбалет (уровень 1)</li>
        </ul>
    </div>
  </div>
</div>

<div id="lab-modal" class="modal-overlay">
  <div class="modal-content">
    <button class="close-modal close-top-right modal-button-corner" onclick="hideModal('lab-modal')"><img src="/images/icons/close.png" alt="Закрыть"></button>
    <div class="modal-header-controls">
        <div class="modal-title-bar">
            <h2 class="modal-title-text-inside-panel">ЛАБОРАТОРИЯ</h2>
        </div>
    </div>
    <div class="modal-body-custom">
        <p>Здесь вы улучшаете свои войска и заклинания.</p>
        <p>Доступные исследования:</p>
        <ul>
        <li>Улучшение воинов</li>
        <li>Улучшение лучников</li>
        </ul>
    </div>
  </div>
</div>

<div id="clan-modal" class="modal-overlay">
  <div class="modal-content">
    <button class="close-modal close-top-right modal-button-corner" onclick="hideModal('clan-modal')"><img src="/images/icons/close.png" alt="Закрыть"></button>
    <div class="modal-header-controls">
        <div class="modal-title-bar">
            <h2 class="modal-title-text-inside-panel">КЛАНОВАЯ КРЕПОСТЬ</h2>
        </div>
    </div>
    <div class="modal-body-custom">
        <p>Здесь вы можете вступить в клан или создать свой.</p>
        <p>Текущий клан: Нет</p>
    </div>
  </div>
</div>


</div>

<?php
            break;
    
    // Точка входа для роутера хранилищ/производства
    case 'storage':
        // Передаем актуальные данные пользователя в роутер
        include __DIR__ . '/app/storage_router.php';
        break;

    }

    return ob_get_clean();
}
?>
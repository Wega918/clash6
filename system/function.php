<?php
// Включаем отображение ошибок (только для разработки)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$start = microtime(true);

session_start(); // нужно до доступа к $_SESSION

header('Content-Type: text/html; charset=utf-8');
header('X-XSS-Protection: 1; mode=block'); 
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN'); 
header('Referrer-Policy: strict-origin-when-cross-origin');
header('Cache-Control: no-cache, must-revalidate');
header('Expires: 0');
header('Pragma: no-cache');
header('Referrer-Policy: no-referrer-when-downgrade');


// Логирование для отладки (только в dev-среде)
if (defined('ENVIRONMENT') && ENVIRONMENT === 'development') {
    error_log("===== AJAX Request =====");
    error_log("Time: ".date('Y-m-d H:i:s'));
    error_log("GET: ".print_r($_GET, true));
    error_log("SESSION: ".print_r($_SESSION, true));
}

// Настройки безопасности
define('ENVIRONMENT', 'production'); // 'development' или 'production'
define('DB_HOST', 'localhost');
define('DB_USER', 'nikand991_clash');
define('DB_PASS', 'jeJeQLj8QkkF1');
define('DB_NAME', 'nikand991_clash');
define('MAX_LOGIN_ATTEMPTS', 5);
define('RESOURCE_UPDATE_INTERVAL', 5); // секунд

// Инициализация ошибок

ini_set('error_log', __DIR__ . '/../logs/php_errors.log');

// Подключение к БД с обработкой ошибок
try {
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($mysqli->connect_errno) {
        throw new RuntimeException('DB connection failed: ' . $mysqli->connect_error);
    }
    $mysqli->set_charset("utf8mb4");
} catch (Exception $e) {
    error_log('Database error: ' . $e->getMessage());
    http_response_code(500);
    die('System temporarily unavailable');
}


// ------------------ ФУНКЦИИ БЕЗОПАСНОСТИ ------------------

/**
 * Очистка и обрезка строки
 * @param string $str Входная строка
 * @param int $max_length Максимальная длина (по умолчанию 255)
 * @return string Очищенная строка
 */
function cleanString($str, $max_length = 255) {
    if (!is_string($str)) {
        return '';
    }
    
    $str = trim($str);
    $str = htmlspecialchars($str, ENT_QUOTES | ENT_HTML5, 'UTF-8', true);
    return mb_substr($str, 0, $max_length, 'UTF-8');
}

/**
 * Безопасное преобразование в целое число с проверкой диапазона
 * @param mixed $val Входное значение
 * @param int $min Минимальное значение
 * @param int $max Максимальное значение
 * @return int Проверенное целое число
 */
function toInt($val, $min = 0, $max = PHP_INT_MAX) {
    $options = [
        'options' => [
            'min_range' => $min,
            'max_range' => $max
        ],
        'flags' => FILTER_NULL_ON_FAILURE
    ];
    
    $result = filter_var($val, FILTER_VALIDATE_INT, $options);
    return $result !== null ? $result : 0;
}

/**
 * Проверка аутентификации пользователя
 * @return bool True если пользователь аутентифицирован
 */
function isLoggedIn() {
    return !empty($_SESSION['user_id']) && 
           !empty($_SESSION['user_ip']) && 
           !empty($_SESSION['user_agent']) &&
           $_SESSION['user_ip'] === $_SERVER['REMOTE_ADDR'] &&
           $_SESSION['user_agent'] === ($_SERVER['HTTP_USER_AGENT'] ?? '');
}

/**
 * Генерация CSRF токена
 * @return string Токен
 * @throws RuntimeException Если невозможно сгенерировать токен
 */
function generateCsrfToken() {
    if (empty($_SESSION['csrf_token'])) {
        try {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            $_SESSION['csrf_token_time'] = time();
        } catch (Exception $e) {
            throw new RuntimeException('Ошибка генерации CSRF токена');
        }
    }
    return $_SESSION['csrf_token'];
}

/**
 * Валидация CSRF токена
 * @param string $token Токен для проверки
 * @param int $timeout Время жизни токена в секундах (по умолчанию 3600)
 * @return bool Результат проверки
 */
function validateCsrfToken($token, $timeout = 3600) {
    if (empty($_SESSION['csrf_token']) || 
        empty($_SESSION['csrf_token_time'])) {
        return false;
    }
    
    // Проверка времени жизни токена
    if (time() - $_SESSION['csrf_token_time'] > $timeout) {
        unset($_SESSION['csrf_token'], $_SESSION['csrf_token_time']);
        return false;
    }
    
    return hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Генерация HTML-поля с CSRF токеном
 * @return string HTML-код input элемента
 */
function csrfInput() {
    $token = generateCsrfToken();
    return '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($token, ENT_QUOTES) . '">';
}

/**
 * Проверка CSRF токена в POST запросе
 * @throws RuntimeException Если токен недействителен
 */
function verifyCsrfPost() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $token = $_POST['csrf_token'] ?? '';
        if (!validateCsrfToken($token)) {
            throw new RuntimeException('Недействительный CSRF токен');
        }
    }
}

/**
 * Проверка CSRF токена для AJAX запросов (Улучшенная логика)
 * @throws RuntimeException Если токен недействителен или отсутствует
 */
function verifyCsrfAjax() {
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
        
        $token = '';
        
        // 1. Standard PHP key
        $token = $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
        
        // 2. Common Apache/Nginx keys (may be capitalized)
        if (empty($token)) {
             $token = $_SERVER['X_CSRF_TOKEN'] ?? ''; 
        }

        // 3. Check via getallheaders() (most reliable non-standard method)
        if (empty($token) && function_exists('getallheaders')) {
            $headers = getallheaders();
            // Check for case variations
            $token = $headers['X-CSRF-Token'] ?? $headers['X-Csrf-Token'] ?? $headers['X-csrf-Token'] ?? '';
        }
        
        // 4. Fallback for environments that use apache_request_headers (rare, but possible)
        if (empty($token) && function_exists('apache_request_headers')) {
             $headers = apache_request_headers();
             $token = $headers['X-CSRF-Token'] ?? $headers['X-Csrf-Token'] ?? '';
        }


        if (empty($token)) {
            // Log this severe error
            error_log("CRITICAL CSRF ERROR: Token missing in AJAX request headers. SERVER keys checked.");
            throw new RuntimeException('CSRF токен отсутствует в запросе (AJAX)');
        }
        
        if (!validateCsrfToken($token)) {
            error_log("CSRF AJAX validation failed. Client token (short): " . substr($token, 0, 8) . 
                      ", Session token (short): " . substr(($_SESSION['csrf_token'] ?? 'NONE'), 0, 8));
            
            throw new RuntimeException('Недействительный CSRF токен (AJAX)');
        }
    }
}


// ------------------ ФУНКЦИИ ПОЛЬЗОВАТЕЛЯ ------------------
function getUser($mysqli) {
    // Проверка авторизации
    if (!isLoggedIn()) {
        error_log('Unauthorized access attempt. IP: '.$_SERVER['REMOTE_ADDR']);

        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            throw new RuntimeException('Требуется авторизация', 401);
        }

        header('Location: login.php');
        exit;
    }

    static $cached_user = null;
    $user_id = (int)$_SESSION['user_id'];

    // Проверка кэша (только если есть данные и ID совпадает)
    if ($cached_user !== null && 
        isset($cached_user['id']) && 
        $cached_user['id'] === $user_id &&
        (time() - ($cached_user['last_cache_update'] ?? 0)) < RESOURCE_UPDATE_INTERVAL
    ) {
        return $cached_user;
    }
    try {
        // --- ОБНОВЛЕННЫЙ ЗАПРОС ---
        $sql = "
            SELECT 
                u.id, u.login, u.gold, u.elixir, u.dark_elixir, u.gems, u.last_update,
                (SELECT level FROM player_buildings WHERE user_id = u.id AND building_id = 'townhall' LIMIT 1) as townhall_lvl
            FROM users u
            WHERE u.id = ?
        ";
        $stmt = $mysqli->prepare($sql);
        if ($stmt === false) {
            throw new RuntimeException('Prepare failed: '.$mysqli->error);
        }

        if (!$stmt->bind_param("i", $user_id)) {
            throw new RuntimeException('Bind failed: '.$stmt->error);
        }

        if (!$stmt->execute()) {
            throw new RuntimeException('Execute failed: '.$stmt->error);
        }

        $result = $stmt->get_result();
        if ($result === false) {
            throw new RuntimeException('Get result failed: '.$stmt->error);
        }

        $user = $result->fetch_assoc();
        $stmt->close();

        // Проверка наличия пользователя
        if (empty($user)) {
            error_log("User not found in DB. ID: $user_id, SESSION: ".json_encode($_SESSION));
            logout(); 
        }

        // Проверка обязательных полей
        $required = ['id', 'login', 'gold', 'elixir', 'dark_elixir', 'gems', 'last_update'];
        foreach ($required as $field) {
            if (!array_key_exists($field, $user)) {
                $user[$field] = 0; 
            }
        }
        
        // Инициализация townhall_lvl, если она не найдена
        if (!isset($user['townhall_lvl']) || $user['townhall_lvl'] === null) {
            $user['townhall_lvl'] = 1;
        }

        // Обновление ресурсов в зданиях
        $user = updateResources($user, $mysqli);
        $user['last_cache_update'] = time();
        $cached_user = $user;

        return $user;

    } catch (Exception $e) {
        error_log("Error in getUser(): ".$e->getMessage()."\nStack trace: ".$e->getTraceAsString());
        
        if ($cached_user !== null && isset($cached_user['id']) && $cached_user['id'] === $user_id) {
            return $cached_user;
        }

        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            throw $e;
        }
        
        header('Location: error.php?code=user_data_error');
        exit;
    }
}

function updateResources($user, $mysqli) {
    global $game_data;

    $now = time();
    
    // Определяем типы ресурсных зданий
    $resource_building_types = ['gold_mine', 'elixir_collector', 'dark_elixir_drill'];

    // 1. Получаем все ресурсные здания игрока, которые активны
    $in_clause = implode(',', array_fill(0, count($resource_building_types), '?'));
    $sql = "SELECT id, building_id, level, stored_resource, finish_time
            FROM player_buildings 
            WHERE user_id = ? AND building_id IN ($in_clause) AND status = 'active'";
    
    $stmt = $mysqli->prepare($sql);
    
    if (!$stmt) {
        error_log("Failed to prepare resource query: " . $mysqli->error);
        return $user; 
    }
    
    // Подготовка параметров для динамического запроса (user_id + building_ids)
    $bind_params = array_merge([$user['id']], $resource_building_types);
    $types = 'i' . str_repeat('s', count($resource_building_types)); 

    // Создаем массив ссылок для bind_param
    $refs = [$types];
    foreach ($bind_params as $key => $value) {
        $refs[] = &$bind_params[$key];
    }
    
    // bind_param требует ссылки, поэтому используем call_user_func_array
    call_user_func_array([$stmt, 'bind_param'], $refs);

    if (!$stmt->execute()) {
        error_log("Failed to execute resource query: " . $stmt->error);
        $stmt->close();
        return $user;
    }

    $result = $stmt->get_result();
    $buildings_to_update = [];
    $update_user_last_update = $user['last_update'];

    while ($row = $result->fetch_assoc()) {
        $building_id = $row['building_id'];
        $level = (int)$row['level'];
        $stored_resource = (int)$row['stored_resource'];
        $last_update_time = (int)($row['finish_time'] ?? time()); 

        // Получаем характеристики (rate, capacity) из $game_data.
        $info = $game_data[$building_id] ?? null;

        if (!isset($info['levels'][$level])) {
            continue; 
        }
        $stats = $info['levels'][$level];
        $rate_per_hour = $stats['rate'] ?? 0; 
        $capacity = $stats['capacity'] ?? 0;
        
        if ($rate_per_hour <= 0 || $capacity <= 0) {
            continue;
        }

        $rate_per_second = $rate_per_hour / 3600;

        $time_elapsed = $now - $last_update_time;
        
        $newly_produced = floor($time_elapsed * $rate_per_second);
        $new_stored_resource = min($stored_resource + $newly_produced, $capacity);
        
        if ($new_stored_resource > $stored_resource) {
            $buildings_to_update[] = [
                'id' => $row['id'],
                'new_stored_resource' => $new_stored_resource,
                'new_finish_time' => $now 
            ];
        }
    }
    
    $stmt->close();

    // 2. Обновление БД для всех зданий
    if (!empty($buildings_to_update)) {
        $mysqli->begin_transaction();
        $success = true;

        $stmt = $mysqli->prepare("UPDATE player_buildings SET stored_resource = ?, finish_time = ? WHERE id = ?");
        
        if ($stmt) {
            foreach ($buildings_to_update as $update_data) {
                $stmt->bind_param("iii", $update_data['new_stored_resource'], $update_data['new_finish_time'], $update_data['id']);
                if (!$stmt->execute()) {
                    $success = false;
                    error_log("Failed to update resource building ID " . $update_data['id'] . ": " . $stmt->error);
                    break;
                }
            }
            $stmt->close();
        } else {
             $success = false;
        }

        if ($success) {
            $mysqli->commit();
        } else {
            $mysqli->rollback();
        }
    }

    // 3. Обновляем общее время последнего обновления пользователя.
    $user['last_update'] = $now;
    $stmt = $mysqli->prepare("UPDATE users SET last_update = ? WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("ii", $user['last_update'], $user['id']);
        $stmt->execute();
        $stmt->close();
    }
    
    return $user;
}

function getTotalStorageCapacity(int $user_id, string $resource_type, mysqli $mysqli, int $townhall_level): int {
    global $game_data;
    
    $building_id = $resource_type . '_storage';
    // Для темного эликсира это dark_storage
    if ($resource_type === 'dark_elixir') {
        $building_id = 'dark_storage';
    } elseif ($resource_type === 'gold' || $resource_type === 'elixir') {
        $building_id = $resource_type . '_storage';
    } else {
        return 0; // Неизвестный ресурс
    }

    $total_capacity = 0;
    
    // Получаем все построенные хранилища этого типа
    $stmt = $mysqli->prepare("SELECT level FROM player_buildings WHERE user_id = ? AND building_id = ? AND status = 'active'");
    if (!$stmt) return 0;
    $stmt->bind_param("is", $user_id, $building_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $level = (int)$row['level'];
        $info = $game_data[$building_id] ?? null;
        $stats = $info['levels'][$level] ?? [];
        
        $capacity = $stats['capacity'] ?? 0;
        $total_capacity += $capacity;
    }
    $stmt->close();
    
    // Добавляем базовую емкость из Ратуши (Используем переданный уровень)
    $townhall_info = $game_data['townhall']['levels'][$townhall_level] ?? [];
    $townhall_capacity_key = 'cap_' . $resource_type;
    $total_capacity += $townhall_info[$townhall_capacity_key] ?? 0;

    return $total_capacity;
}


function logout() {
    $_SESSION = [];
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
    header('Location: login.php');
    exit;
}

// ------------------ АУТЕНТИФИКАЦИЯ ------------------

function registerUser($mysqli, $login, $password) {
    if (strlen($password) < 8) {
        throw new InvalidArgumentException('Password too short');
    }

    $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
    $stmt = $mysqli->prepare("INSERT INTO users (login, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $login, $hash);
    return $stmt->execute();
}

function verifyLogin($mysqli, $login, $password) {
    static $attempts = [];
    $ip = $_SERVER['REMOTE_ADDR'];
    $key = md5($login.$ip);

    if (($attempts[$key] ?? 0) >= MAX_LOGIN_ATTEMPTS) {
        sleep(($attempts[$key] - MAX_LOGIN_ATTEMPTS + 1) * 2);
        throw new RuntimeException('Too many attempts');
    }

    $stmt = $mysqli->prepare("SELECT id, password FROM users WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if (!$user || !password_verify($password, $user['password'])) {
        $attempts[$key] = ($attempts[$key] ?? 0) + 1;
        throw new RuntimeException('Invalid credentials');
    }

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_ip'] = $ip;
    session_regenerate_id(true);
    
    return true;
}

// ------------------ УТИЛИТЫ ------------------

function logError($message, $context = []) {
    $log = date('[Y-m-d H:i:s]') . ' ' . strip_tags($message);
    if ($context) {
        $log .= ' ' . json_encode($context);
    }
    file_put_contents(__DIR__.'/../logs/security.log', $log.PHP_EOL, FILE_APPEND);
}

function isPasswordStrong($password) {
    return preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,}$/', $password);
}

function generatePassword($length = 12) {
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_-=+';
    $password = '';
    $max = strlen($chars) - 1;
    
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[random_int(0, $max)];
    }
    
    return $password;
}







/**
 * Обрабатывает сбор ресурсов из производственного здания.
 * @param array $building Данные здания (player_buildings row)
 * @param array $user Текущие данные пользователя
 * @param mysqli $mysqli Соединение с БД
 * @return array Обновленные данные пользователя
 */
function collectAndStoreResources(array $building, array $user, mysqli $mysqli): array {
    global $game_data;

    $building_id = $building['building_id'];
    $stored_amount = (int)$building['stored_resource'];
    
    // 1. Определяем тип ресурса, который мы собираем
    $level = (int)$building['level'];
    $info = $game_data[$building_id] ?? null;

    if (!$info || !isset($info['levels'][$level]['res_type'])) {
        throw new RuntimeException("Неизвестное здание или уровень: {$building_id} (Ур. {$level})");
    }
    
    // res_type для производящих зданий указывает, ЧТО они производят (RES_GOLD, RES_ELIXIR, RES_DARK)
    $res_const = $info['levels'][$level]['res_type'];

    // Конвертируем константу в ключ пользователя 
    $resource_type_key = ($res_const === 'RES_DARK') ? 'dark_elixir' : str_replace('res_', '', strtolower($res_const));
    $resource_type_key = strtolower($resource_type_key);
    
    // 2. Определяем общую емкость хранилищ и текущий баланс
    $max_capacity = getTotalStorageCapacity($user['id'], $resource_type_key, $mysqli, (int)$user['townhall_lvl']);
    $current_balance = $user[$resource_type_key] ?? 0;
    
    // 3. Рассчитываем, сколько можно добавить
    $available_space = $max_capacity - $current_balance;
    $transfer_amount = min($stored_amount, $available_space);
    $remaining_in_building = $stored_amount - $transfer_amount;
    
    if ($transfer_amount <= 0) {
        throw new RuntimeException("Хранилища полны или нечего собирать. Сбор невозможен.");
    }

    // 4. Обновление транзакционно
    $mysqli->begin_transaction();
    try {
        // a) Обновляем баланс пользователя
        $new_balance = $current_balance + $transfer_amount;
        $sql_user = "UPDATE users SET {$resource_type_key} = ? WHERE id = ?";
        $stmt_user = $mysqli->prepare($sql_user);
        if (!$stmt_user) {
            throw new Exception("Ошибка подготовки запроса USER: " . $mysqli->error);
        }
        $stmt_user->bind_param("ii", $new_balance, $user['id']);
        $stmt_user->execute();
        $stmt_user->close();
        
        // b) Обновляем состояние производственного здания
        $sql_building = "UPDATE player_buildings SET stored_resource = ?, finish_time = ? WHERE id = ?";
        $stmt_building = $mysqli->prepare($sql_building);
        if (!$stmt_building) {
            throw new Exception("Ошибка подготовки запроса BUILDING: " . $mysqli->error);
        }
        
        $now = time();
        $stmt_building->bind_param("iii", $remaining_in_building, $now, $building['id']);
        $stmt_building->execute();
        $stmt_building->close();

        $mysqli->commit();
        
        // Обновляем локальные данные пользователя
        $user[$resource_type_key] = $new_balance;
        
    } catch (Exception $e) {
        $mysqli->rollback();
        error_log("Ошибка при сборе ресурсов: " . $e->getMessage());
        throw new RuntimeException("Ошибка базы данных при сборе ресурсов.");
    }
    
    return $user;
}

/**
 * ЗАПУСК ПРОЦЕССА УЛУЧШЕНИЯ СУЩЕСТВУЮЩЕГО ЗДАНИЯ.
 */
function startBuildingUpgrade(mysqli $mysqli, array $user, array $building): array {
    global $game_data;
    $user_id = $user['id'];
    $th_lvl = $user['townhall_lvl'];
    $building_row_id = $building['id'];
    $building_id = $building['building_id'];
    $current_level = (int)$building['level'];
    $next_level = $current_level + 1;

    // 1. Проверки
    if ($building['status'] !== 'active') {
        throw new RuntimeException("Здание уже находится в процессе улучшения или постройки.");
    }
    if (!isset($game_data[$building_id]['levels'][$next_level])) {
        throw new RuntimeException("Достигнут максимальный уровень для этого здания.");
    }
    
    $next_stats = $game_data[$building_id]['levels'][$next_level];
    $cost = $next_stats['cost'] ?? 0;
    $time = $next_stats['time'] ?? 0;
    $th_req = $next_stats['th_req'] ?? 1;

    if ($th_lvl < $th_req) {
        throw new RuntimeException("Требуется Ратуша Ур. {$th_req} для улучшения до Ур. {$next_level}.");
    }

    $resource_const = is_array($next_stats['res_type']) ? $next_stats['res_type'][0] : ($next_stats['res_type'] ?? 'RES_GOLD');
    $resource_type_key = ($resource_const === 'RES_DARK') ? 'dark_elixir' : str_replace('res_', '', strtolower($resource_const));
    $resource_type_key = strtolower($resource_type_key);
    
    if (($user[$resource_type_key] ?? 0) < $cost) {
        throw new RuntimeException("Не хватает ресурсов ({$cost} {$resource_type_key}).");
    }

    // 2. Транзакция
    $mysqli->begin_transaction();
    try {
        // a) Списание ресурсов
        $new_balance = $user[$resource_type_key] - $cost;
        $sql_user = "UPDATE users SET {$resource_type_key} = ? WHERE id = ?";
        $stmt_user = $mysqli->prepare($sql_user);
        $stmt_user->bind_param("ii", $new_balance, $user_id);
        $stmt_user->execute();
        $stmt_user->close();
        
        // b) Обновление статуса здания
        $finish_time = time() + $time;
        $sql_building = "UPDATE player_buildings SET status = 'upgrading', level = ?, finish_time = ? WHERE id = ? AND user_id = ?";
        $stmt_building = $mysqli->prepare($sql_building);
        $stmt_building->bind_param("iiii", $next_level, $finish_time, $building_row_id, $user_id);
        $stmt_building->execute();
        $stmt_building->close();

        $mysqli->commit();
        
        // Обновляем локальные данные пользователя
        $user[$resource_type_key] = $new_balance;
        
    } catch (Exception $e) {
        $mysqli->rollback();
        error_log("Ошибка при улучшении здания: " . $e->getMessage());
        throw new RuntimeException("Ошибка базы данных при улучшении здания.");
    }
    
    return $user;
}


/**
 * ПОКУПКА И СТРОИТЕЛЬСТВО НОВОГО ЗДАНИЯ.
 */
function buildNewBuilding(mysqli $mysqli, array $user, string $building_id): array {
    global $game_data;
    $user_id = $user['id'];
    $th_lvl = $user['townhall_lvl'];

    // 1. Проверки
    $built_count = count(getPlayerBuildingsByType($mysqli, $building_id));
    $max_count = getMaxCountForTH($building_id, $th_lvl);
    
    if ($built_count >= $max_count) {
        throw new RuntimeException("Достигнут максимальный лимит зданий '{$building_id}' для вашей Ратуши (Ур. {$th_lvl}).");
    }

    $initial_level = 1;
    $stats = $game_data[$building_id]['levels'][$initial_level] ?? null;
    if ($stats === null) {
        throw new RuntimeException("Данные для строительства '{$building_id}' Ур. 1 не найдены.");
    }

    $cost = $stats['cost'] ?? 0;
    $time = $stats['time'] ?? 0;
    $th_req = $stats['th_req'] ?? 1;

    if ($th_lvl < $th_req) {
        throw new RuntimeException("Требуется Ратуша Ур. {$th_req} для строительства '{$building_id}'.");
    }

    $resource_const = is_array($stats['res_type']) ? $stats['res_type'][0] : ($stats['res_type'] ?? 'RES_GOLD');
    $resource_type_key = ($resource_const === 'RES_DARK') ? 'dark_elixir' : str_replace('res_', '', strtolower($resource_const));
    $resource_type_key = strtolower($resource_type_key);
    
    if (($user[$resource_type_key] ?? 0) < $cost) {
        throw new RuntimeException("Не хватает ресурсов ({$cost} {$resource_type_key}).");
    }
    
    // 2. Транзакция
    $mysqli->begin_transaction();
    try {
        // a) Списание ресурсов
        $new_balance = $user[$resource_type_key] - $cost;
        $sql_user = "UPDATE users SET {$resource_type_key} = ? WHERE id = ?";
        $stmt_user = $mysqli->prepare($sql_user);
        $stmt_user->bind_param("ii", $new_balance, $user_id);
        $stmt_user->execute();
        $stmt_user->close();
        
        // b) Добавление нового здания
        $finish_time = time() + $time;
        // Упрощение: устанавливаем координаты X=0, Y=0 для нового здания, статус - 'upgrading' (строится)
        $status = ($time > 0) ? 'constructing' : 'active';
        $sql_building = "INSERT INTO player_buildings (user_id, building_id, level, x, y, status, finish_time) VALUES (?, ?, ?, 0, 0, ?, ?)";
        $stmt_building = $mysqli->prepare($sql_building);
        
        $stmt_building->bind_param("isssi", $user_id, $building_id, $initial_level, $status, $finish_time);
        $stmt_building->execute();
        $new_building_id = $stmt_building->insert_id;
        $stmt_building->close();

        $mysqli->commit();
        
        // Обновляем локальные данные пользователя
        $user[$resource_type_key] = $new_balance;
        
        // Возвращаем обновленного пользователя и ID нового здания
        return ['user' => $user, 'new_building_id' => $new_building_id];
        
    } catch (Exception $e) {
        $mysqli->rollback();
        error_log("Ошибка при покупке здания: " . $e->getMessage());
        throw new RuntimeException("Ошибка базы данных при покупке здания.");
    }
}


// ------------------ Получение данных зданий ------------------
function getPlayerBuildingsByType(mysqli $mysqli, string $building_id): array {
    $user_id = (int)($_SESSION['user_id'] ?? 0);
    if ($user_id === 0) {
        return [];
    }

    $stmt = $mysqli->prepare("SELECT id, building_id, level, x, y, stored_resource, status, finish_time FROM player_buildings WHERE user_id = ? AND building_id = ? ORDER BY level DESC");
    if (!$stmt) {
        error_log('Prepare failed: ' . $mysqli->error);
        return [];
    }

    $stmt->bind_param("is", $user_id, $building_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $buildings = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    
    return $buildings;
}

/**
 * Получает одно здание по ID
 */
function getPlayerBuildingById(mysqli $mysqli, int $building_id): ?array {
    $user_id = (int)($_SESSION['user_id'] ?? 0);
    if ($user_id === 0) {
        return null;
    }

    $stmt = $mysqli->prepare("SELECT id, building_id, level, x, y, stored_resource, status, finish_time FROM player_buildings WHERE user_id = ? AND id = ?");
    if (!$stmt) {
        error_log('Prepare failed: ' . $mysqli->error);
        return null;
    }

    $stmt->bind_param("ii", $user_id, $building_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $building = $result->fetch_assoc();
    $stmt->close();

    return $building;
}






// ------------------ ОБРАБОТКА ОШИБОК ------------------
/**
 * Логирование в файл
 * @param string $message Сообщение для логирования
 */
function logToFile(string $message) {
    $logFile = __DIR__ . '/../logs/system.log';
    $date = date('[Y-m-d H:i:s]');
    file_put_contents($logFile, "$date $message\n", FILE_APPEND);
}


/**
 * Универсальный обработчик ошибок
 * @param Throwable $e Исключение или ошибка
 * @param bool $isAjax Флаг AJAX-запроса
 */
function handleError(Throwable $e, bool $isAjax = false): void {
    $code = $e->getCode() ?: 500;
    http_response_code($code);

    $errorData = [
        'message' => $e->getMessage(),
        'code' => $code,
    ];

    if (defined('ENVIRONMENT') && ENVIRONMENT === 'development') {
        $errorData['file'] = $e->getFile();
        $errorData['line'] = $e->getLine();
        $errorData['trace'] = $e->getTrace();
    }

    if (function_exists('logToFile')) {
        logToFile("ERROR: " . json_encode($errorData));
    }

    if ($isAjax || (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')) {
        header('Content-Type: application/json');
        die(json_encode(['error' => $errorData['message']]));
    }

    if ($code === 401) {
        header('Location: login.php');
        exit;
    }

    $message = (defined('ENVIRONMENT') && ENVIRONMENT === 'development')
        ? '<pre>' . print_r($errorData, true) . '</pre>'
        : 'Произошла ошибка. Пожалуйста, попробуйте позже.';

    die('<div class="error">' . $message . '</div>');
}


// ------------------ БЕЗОПАСНОСТЬ ------------------

/**
 * Проверка CSRF токена
 * @param string $token Токен для проверки
 * @return bool Результат проверки
 */
function check_csrf(string $token): bool {
    return isset($_SESSION['csrf_token']) && 
           hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Защита от брутфорса
 * @param string $login Логин пользователя
 * @return bool Превышено ли количество попыток
 */
function isBruteforceAttempt(string $login): bool {
    global $mysqli;
    
    $stmt = $mysqli->prepare("SELECT login_attempts, last_attempt FROM users WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    
    return $result && 
           $result['login_attempts'] >= 5 && 
           time() - strtotime($result['last_attempt']) < 60;
}

/**
 * Логирование неудачной попытки входа
 * @param string $login Логин пользователя
 */
function logFailedLoginAttempt(string $login) {
    global $mysqli;
    
    $stmt = $mysqli->prepare("UPDATE users SET 
        login_attempts = IF(last_attempt < DATE_SUB(NOW(), INTERVAL 1 HOUR), 1, login_attempts + 1),
        last_attempt = NOW()
        WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $stmt->close();
}

/**
 * Сброс счетчика попыток входа
 * @param int $user_id ID пользователя
 */
function resetLoginAttempts(int $user_id) {
    global $mysqli;
    
    $stmt = $mysqli->prepare("UPDATE users SET login_attempts = 0 WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->close();
}

// ------------------ УТИЛИТЫ ------------------

/**
 * Получение базового URL сайта
 * @return string Базовый URL
 */
function getBaseUrl(): string {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
    return $protocol . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
}

/**
 * Подтверждение действия (JS)
 * @param string $message Текст подтверждения
 * @return string JavaScript код
 */
function confirm(string $message): string {
    return 'onclick="return confirm(\'' . addslashes($message) . '\')"';
}

// --- СИМУЛЯЦИЯ: Максимальное количество зданий на уровне Ратуши ---
function getMaxCountForTH(string $building_id, int $th_lvl): int {
    static $max_building_counts = [
        'gold_storage' => [1 => 1, 2 => 2, 3 => 2, 4 => 3, 5 => 3, 6 => 4, 7 => 4, 8 => 4, 9 => 4, 10 => 5, 11 => 5, 12 => 5, 13 => 6, 14 => 6, 15 => 7, 16 => 7],
        'elixir_storage' => [1 => 1, 2 => 2, 3 => 2, 4 => 3, 5 => 3, 6 => 4, 7 => 4, 8 => 4, 9 => 4, 10 => 5, 11 => 5, 12 => 5, 13 => 6, 14 => 6, 15 => 7, 16 => 7],
        'dark_storage' => [1 => 0, 7 => 1, 9 => 2, 11 => 3, 13 => 4, 15 => 5, 16 => 5],
        'gold_mine' => [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 6, 8 => 7, 9 => 7, 10 => 7, 11 => 7, 12 => 7, 13 => 7, 14 => 8, 15 => 8, 16 => 8],
        'elixir_collector' => [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 6, 8 => 7, 9 => 7, 10 => 7, 11 => 7, 12 => 7, 13 => 7, 14 => 8, 15 => 8, 16 => 8],
        'dark_elixir_drill' => [1 => 0, 7 => 1, 8 => 2, 9 => 3, 11 => 3, 12 => 3, 13 => 3, 14 => 3, 15 => 4, 16 => 4],
        'cannon' => [1 => 1, 2 => 1, 3 => 2, 4 => 2, 5 => 3, 6 => 3, 7 => 4, 8 => 5, 9 => 5, 10 => 6, 11 => 6, 12 => 7, 13 => 7, 14 => 8, 15 => 8, 16 => 9],
        'barracks' => [1 => 1, 2 => 2, 3 => 2, 4 => 3, 5 => 3, 6 => 4, 7 => 4, 8 => 4, 9 => 4, 10 => 4, 11 => 4, 12 => 4, 13 => 4, 14 => 4, 15 => 4, 16 => 4],
        'army_camp' => [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 4, 6 => 4, 7 => 4, 8 => 4, 9 => 4, 10 => 4, 11 => 4, 12 => 4, 13 => 4, 14 => 4, 15 => 4, 16 => 4],
    ];

    $max_counts = $max_building_counts[$building_id] ?? [];
    
    $count = 0;
    foreach ($max_counts as $th_req => $max) {
        if ($th_lvl >= $th_req) {
            $count = $max;
        }
    }
    return $count;
}
?>
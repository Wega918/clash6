<?php
/**
 * game_data.php
 * ПОЛНАЯ БАЗА ДАННЫХ CLASH OF CLANS
 */

// КРИТИЧЕСКОЕ ИСПРАВЛЕНИЕ: Оборачиваем константы в if (!defined) для предотвращения ошибок при множественной загрузке.
// Константы ресурсов
if (!defined('RES_GOLD')) define('RES_GOLD', 'gold');
if (!defined('RES_ELIXIR')) define('RES_ELIXIR', 'elixir');
if (!defined('RES_DARK')) define('RES_DARK', 'dark_elixir');
if (!defined('RES_GEMS')) define('RES_GEMS', 'gems');
if (!defined('RES_SHINY')) define('RES_SHINY', 'shiny_ore');
if (!defined('RES_GLOWY')) define('RES_GLOWY', 'glowy_ore');
if (!defined('RES_STARRY')) define('RES_STARRY', 'starry_ore');

// Константы типов
if (!defined('TYPE_TOWNHALL')) define('TYPE_TOWNHALL', 'townhall');
if (!defined('TYPE_RESOURCE')) define('TYPE_RESOURCE', 'resource');
if (!defined('TYPE_STORAGE')) define('TYPE_STORAGE', 'storage');
if (!defined('TYPE_ARMY')) define('TYPE_ARMY', 'army');
if (!defined('TYPE_DEFENSE')) define('TYPE_DEFENSE', 'defense');
if (!defined('TYPE_WALL')) define('TYPE_WALL', 'wall');
if (!defined('TYPE_TRAP')) define('TYPE_TRAP', 'trap');
if (!defined('TYPE_HERO_ALTAR')) define('TYPE_HERO_ALTAR', 'hero_altar');
if (!defined('TYPE_TROOP')) define('TYPE_TROOP', 'troop');
if (!defined('TYPE_DARK_TROOP')) define('TYPE_DARK_TROOP', 'dark_troop');
if (!defined('TYPE_SUPER_TROOP')) define('TYPE_SUPER_TROOP', 'super_troop');
if (!defined('TYPE_SPELL')) define('TYPE_SPELL', 'spell');
if (!defined('TYPE_DARK_SPELL')) define('TYPE_DARK_SPELL', 'dark_spell');
if (!defined('TYPE_HERO')) define('TYPE_HERO', 'hero');
if (!defined('TYPE_SIEGE')) define('TYPE_SIEGE', 'siege');
if (!defined('TYPE_PET')) define('TYPE_PET', 'pet');
if (!defined('TYPE_EQUIPMENT')) define('TYPE_EQUIPMENT', 'equipment');



$game_data = [

    // ============================================================
    // 1. РАТУША (Town Hall) - ДАННЫЕ ОСТАВЛЕНЫ БЕЗ ИЗМЕНЕНИЙ
    // ============================================================
    'townhall' => [
        'name' => 'Ратуша',
        'type' => TYPE_TOWNHALL,
        'description' => 'Сердце вашей деревни.',
        'levels' => [
            1  => ['cost' => 0, 'res_type' => RES_GOLD, 'time' => 0, 'hp' => 450, 'cap_gold' => 1000, 'cap_elixir' => 1000],
            2  => ['cost' => 1000, 'res_type' => RES_GOLD, 'time' => 10, 'hp' => 1600, 'cap_gold' => 2500, 'cap_elixir' => 2500],
            3  => ['cost' => 4000, 'res_type' => RES_GOLD, 'time' => 10800, 'hp' => 1850, 'cap_gold' => 10000, 'cap_elixir' => 10000],
            4  => ['cost' => 25000, 'res_type' => RES_GOLD, 'time' => 86400, 'hp' => 2100, 'cap_gold' => 50000, 'cap_elixir' => 50000],
            5  => ['cost' => 150000, 'res_type' => RES_GOLD, 'time' => 172800, 'hp' => 2400, 'cap_gold' => 100000, 'cap_elixir' => 100000],
            6  => ['cost' => 750000, 'res_type' => RES_GOLD, 'time' => 345600, 'hp' => 2800, 'cap_gold' => 250000, 'cap_elixir' => 250000],
            7  => ['cost' => 1200000, 'res_type' => RES_GOLD, 'time' => 604800, 'hp' => 3200, 'cap_gold' => 500000, 'cap_elixir' => 500000],
            8  => ['cost' => 2000000, 'res_type' => RES_GOLD, 'time' => 1209600, 'hp' => 3900, 'cap_gold' => 750000, 'cap_elixir' => 750000],
            9  => ['cost' => 3000000, 'res_type' => RES_GOLD, 'time' => 1728000, 'hp' => 4600, 'cap_gold' => 1000000, 'cap_elixir' => 1000000],
            10 => ['cost' => 5000000, 'res_type' => RES_GOLD, 'time' => 2592000, 'hp' => 5500, 'cap_gold' => 1500000, 'cap_elixir' => 1500000],
            11 => ['cost' => 7000000, 'res_type' => RES_GOLD, 'time' => 3456000, 'hp' => 6800, 'cap_gold' => 2000000, 'cap_elixir' => 2000000],
            12 => ['cost' => 9000000, 'res_type' => RES_GOLD, 'time' => 5184000, 'hp' => 8200, 'cap_gold' => 2000000, 'cap_elixir' => 2000000], // Giga Tesla
            13 => ['cost' => 12000000, 'res_type' => RES_GOLD, 'time' => 7776000, 'hp' => 9200, 'cap_gold' => 2000000, 'cap_elixir' => 2000000], // Giga Inferno
            14 => ['cost' => 16000000, 'res_type' => RES_GOLD, 'time' => 10368000, 'hp' => 9900, 'cap_gold' => 2000000, 'cap_elixir' => 2000000],
            15 => ['cost' => 18000000, 'res_type' => RES_GOLD, 'time' => 12096000, 'hp' => 10600, 'cap_gold' => 2000000, 'cap_elixir' => 2000000],
            16 => ['cost' => 20000000, 'res_type' => RES_GOLD, 'time' => 13824000, 'hp' => 11500, 'cap_gold' => 2000000, 'cap_elixir' => 2000000],
        ]
    ],

    // ============================================================
    // 2. РЕСУРСЫ (Resources) - ДАННЫЕ ОСТАВЛЕНЫ БЕЗ ИЗМЕНЕНИЙ
    // ============================================================
    
    'gold_mine' => [
        'name' => 'Золотая шахта',
        'type' => TYPE_RESOURCE,
        'description' => 'Добывает золото из недр земли.',
        'levels' => [
            1  => ['cost' => 150, 'res_type' => RES_ELIXIR, 'time' => 10, 'hp' => 400, 'rate' => 200, 'capacity' => 500, 'th_req' => 1],
            2  => ['cost' => 300, 'res_type' => RES_ELIXIR, 'time' => 60, 'hp' => 440, 'rate' => 400, 'capacity' => 1000, 'th_req' => 1],
            3  => ['cost' => 700, 'res_type' => RES_ELIXIR, 'time' => 240, 'hp' => 480, 'rate' => 600, 'capacity' => 1500, 'th_req' => 2],
            4  => ['cost' => 1400, 'res_type' => RES_ELIXIR, 'time' => 600, 'hp' => 520, 'rate' => 800, 'capacity' => 2500, 'th_req' => 2],
            5  => ['cost' => 3000, 'res_type' => RES_ELIXIR, 'time' => 2400, 'hp' => 560, 'rate' => 1000, 'capacity' => 10000, 'th_req' => 3],
            6  => ['cost' => 7000, 'res_type' => RES_ELIXIR, 'time' => 7200, 'hp' => 600, 'rate' => 1300, 'capacity' => 20000, 'th_req' => 3],
            7  => ['cost' => 14000, 'res_type' => RES_ELIXIR, 'time' => 21600, 'hp' => 640, 'rate' => 1600, 'capacity' => 40000, 'th_req' => 4],
            8  => ['cost' => 28000, 'res_type' => RES_ELIXIR, 'time' => 21600, 'hp' => 680, 'rate' => 1900, 'capacity' => 75000, 'th_req' => 4],
            9  => ['cost' => 56000, 'res_type' => RES_ELIXIR, 'time' => 36000, 'hp' => 720, 'rate' => 2200, 'capacity' => 100000, 'th_req' => 5],
            10 => ['cost' => 84000, 'res_type' => RES_ELIXIR, 'time' => 86400, 'hp' => 780, 'rate' => 2500, 'capacity' => 150000, 'th_req' => 6],
            11 => ['cost' => 168000, 'res_type' => RES_ELIXIR, 'time' => 172800, 'hp' => 860, 'rate' => 3000, 'capacity' => 200000, 'th_req' => 7],
            12 => ['cost' => 336000, 'res_type' => RES_ELIXIR, 'time' => 259200, 'hp' => 960, 'rate' => 3500, 'capacity' => 250000, 'th_req' => 8],
            13 => ['cost' => 500000, 'res_type' => RES_ELIXIR, 'time' => 345600, 'hp' => 1080, 'rate' => 4200, 'capacity' => 300000, 'th_req' => 9],
            14 => ['cost' => 800000, 'res_type' => RES_ELIXIR, 'time' => 432000, 'hp' => 1180, 'rate' => 4900, 'capacity' => 350000, 'th_req' => 11],
            15 => ['cost' => 1200000, 'res_type' => RES_ELIXIR, 'time' => 518400, 'hp' => 1280, 'rate' => 5500, 'capacity' => 400000, 'th_req' => 12],
            16 => ['cost' => 1500000, 'res_type' => RES_ELIXIR, 'time' => 604800, 'hp' => 1350, 'rate' => 6000, 'capacity' => 450000, 'th_req' => 14],
        ]
    ],

    'elixir_collector' => [
        'name' => 'Сборщик эликсира',
        'type' => TYPE_RESOURCE,
        'description' => 'Качает эликсир из лей-линий.',
        'levels' => [
            1  => ['cost' => 150, 'res_type' => RES_GOLD, 'time' => 10, 'hp' => 400, 'rate' => 200, 'capacity' => 500, 'th_req' => 1],
            2  => ['cost' => 300, 'res_type' => RES_GOLD, 'time' => 60, 'hp' => 440, 'rate' => 400, 'capacity' => 1000, 'th_req' => 1],
            3  => ['cost' => 700, 'res_type' => RES_GOLD, 'time' => 240, 'hp' => 480, 'rate' => 600, 'capacity' => 1500, 'th_req' => 2],
            4  => ['cost' => 1400, 'res_type' => RES_GOLD, 'time' => 600, 'hp' => 520, 'rate' => 800, 'capacity' => 2500, 'th_req' => 2],
            5  => ['cost' => 3000, 'res_type' => RES_GOLD, 'time' => 2400, 'hp' => 560, 'rate' => 1000, 'capacity' => 10000, 'th_req' => 3],
            6  => ['cost' => 7000, 'res_type' => RES_GOLD, 'time' => 7200, 'hp' => 600, 'rate' => 1300, 'capacity' => 20000, 'th_req' => 3],
            7  => ['cost' => 14000, 'res_type' => RES_GOLD, 'time' => 21600, 'hp' => 640, 'rate' => 1600, 'capacity' => 40000, 'th_req' => 4],
            8  => ['cost' => 28000, 'res_type' => RES_GOLD, 'time' => 21600, 'hp' => 680, 'rate' => 1900, 'capacity' => 75000, 'th_req' => 4],
            9  => ['cost' => 56000, 'res_type' => RES_GOLD, 'time' => 36000, 'hp' => 720, 'rate' => 2200, 'capacity' => 100000, 'th_req' => 5],
            10 => ['cost' => 84000, 'res_type' => RES_GOLD, 'time' => 86400, 'hp' => 780, 'rate' => 2500, 'capacity' => 150000, 'th_req' => 6],
            11 => ['cost' => 168000, 'res_type' => RES_GOLD, 'time' => 172800, 'hp' => 860, 'rate' => 3000, 'capacity' => 200000, 'th_req' => 7],
            12 => ['cost' => 336000, 'res_type' => RES_GOLD, 'time' => 259200, 'hp' => 960, 'rate' => 3500, 'capacity' => 250000, 'th_req' => 8],
            13 => ['cost' => 500000, 'res_type' => RES_GOLD, 'time' => 345600, 'hp' => 1080, 'rate' => 4200, 'capacity' => 300000, 'th_req' => 9],
            14 => ['cost' => 800000, 'res_type' => RES_GOLD, 'time' => 432000, 'hp' => 1180, 'rate' => 4900, 'capacity' => 350000, 'th_req' => 11],
            15 => ['cost' => 1200000, 'res_type' => RES_GOLD, 'time' => 518400, 'hp' => 1280, 'rate' => 5500, 'capacity' => 400000, 'th_req' => 12],
            16 => ['cost' => 1500000, 'res_type' => RES_GOLD, 'time' => 604800, 'hp' => 1350, 'rate' => 6000, 'capacity' => 450000, 'th_req' => 14],
        ]
    ],

    'dark_elixir_drill' => [
        'name' => 'Скважина черного эликсира',
        'type' => TYPE_RESOURCE,
        'description' => 'Добывает редкий черный эликсир.',
        'levels' => [
            1 => ['cost' => 100000, 'res_type' => RES_ELIXIR, 'time' => 43200, 'hp' => 550, 'rate' => 20, 'capacity' => 160, 'th_req' => 7],
            2 => ['cost' => 250000, 'res_type' => RES_ELIXIR, 'time' => 86400, 'hp' => 600, 'rate' => 30, 'capacity' => 320, 'th_req' => 7],
            3 => ['cost' => 500000, 'res_type' => RES_ELIXIR, 'time' => 172800, 'hp' => 650, 'rate' => 45, 'capacity' => 500, 'th_req' => 8],
            4 => ['cost' => 1000000, 'res_type' => RES_ELIXIR, 'time' => 259200, 'hp' => 710, 'rate' => 60, 'capacity' => 900, 'th_req' => 9],
            5 => ['cost' => 1500000, 'res_type' => RES_ELIXIR, 'time' => 345600, 'hp' => 770, 'rate' => 80, 'capacity' => 1400, 'th_req' => 9],
            6 => ['cost' => 2000000, 'res_type' => RES_ELIXIR, 'time' => 432000, 'hp' => 850, 'rate' => 100, 'capacity' => 2000, 'th_req' => 9],
            7 => ['cost' => 3000000, 'res_type' => RES_ELIXIR, 'time' => 518400, 'hp' => 960, 'rate' => 120, 'capacity' => 2600, 'th_req' => 10],
            8 => ['cost' => 4500000, 'res_type' => RES_ELIXIR, 'time' => 691200, 'hp' => 1100, 'rate' => 140, 'capacity' => 3600, 'th_req' => 11],
            9 => ['cost' => 6000000, 'res_type' => RES_ELIXIR, 'time' => 864000, 'hp' => 1280, 'rate' => 160, 'capacity' => 4500, 'th_req' => 12],
        ]
    ],

    // ============================================================
    // 3. ХРАНИЛИЩА (Storages) - ДАННЫЕ ОСТАВЛЕНЫ БЕЗ ИЗМЕНЕНИЙ
    // ============================================================

    'gold_storage' => [
        'name' => 'Золотохранилище',
        'type' => TYPE_STORAGE,
        'description' => 'Хранит золото.',
        'levels' => [
            1  => ['cost' => 300, 'res_type' => RES_ELIXIR, 'time' => 10, 'hp' => 400, 'capacity' => 1500, 'th_req' => 1],
            2  => ['cost' => 750, 'res_type' => RES_ELIXIR, 'time' => 60, 'hp' => 600, 'capacity' => 3000, 'th_req' => 2],
            3  => ['cost' => 1500, 'res_type' => RES_ELIXIR, 'time' => 300, 'hp' => 800, 'capacity' => 6000, 'th_req' => 2],
            4  => ['cost' => 3000, 'res_type' => RES_ELIXIR, 'time' => 1200, 'hp' => 1000, 'capacity' => 12000, 'th_req' => 3],
            5  => ['cost' => 6000, 'res_type' => RES_ELIXIR, 'time' => 3600, 'hp' => 1200, 'capacity' => 25000, 'th_req' => 3],
            6  => ['cost' => 12000, 'res_type' => RES_ELIXIR, 'time' => 7200, 'hp' => 1400, 'capacity' => 45000, 'th_req' => 3],
            7  => ['cost' => 25000, 'res_type' => RES_ELIXIR, 'time' => 14400, 'hp' => 1600, 'capacity' => 100000, 'th_req' => 4],
            8  => ['cost' => 50000, 'res_type' => RES_ELIXIR, 'time' => 28800, 'hp' => 1700, 'capacity' => 225000, 'th_req' => 4],
            9  => ['cost' => 100000, 'res_type' => RES_ELIXIR, 'time' => 43200, 'hp' => 1800, 'capacity' => 450000, 'th_req' => 5],
            10 => ['cost' => 250000, 'res_type' => RES_ELIXIR, 'time' => 86400, 'hp' => 1900, 'capacity' => 850000, 'th_req' => 6],
            11 => ['cost' => 500000, 'res_type' => RES_ELIXIR, 'time' => 172800, 'hp' => 2100, 'capacity' => 1750000, 'th_req' => 7],
            12 => ['cost' => 1000000, 'res_type' => RES_ELIXIR, 'time' => 345600, 'hp' => 2500, 'capacity' => 2000000, 'th_req' => 11],
            13 => ['cost' => 1800000, 'res_type' => RES_ELIXIR, 'time' => 518400, 'hp' => 2900, 'capacity' => 3000000, 'th_req' => 12],
            14 => ['cost' => 2800000, 'res_type' => RES_ELIXIR, 'time' => 691200, 'hp' => 3300, 'capacity' => 4000000, 'th_req' => 13],
            15 => ['cost' => 3000000, 'res_type' => RES_ELIXIR, 'time' => 777600, 'hp' => 3700, 'capacity' => 4500000, 'th_req' => 14],
            16 => ['cost' => 4000000, 'res_type' => RES_ELIXIR, 'time' => 950400, 'hp' => 3900, 'capacity' => 5000000, 'th_req' => 15],
        ]
    ],
    // Эликсирохранилище идентично золоту, копируем структуру
    'elixir_storage' => [
        'name' => 'Эликсирохранилище',
        'type' => TYPE_STORAGE,
        'description' => 'Хранит эликсир.',
        'levels' => [
            1  => ['cost' => 300, 'res_type' => RES_GOLD, 'time' => 10, 'hp' => 400, 'capacity' => 1500, 'th_req' => 1],
            2  => ['cost' => 750, 'res_type' => RES_GOLD, 'time' => 60, 'hp' => 600, 'capacity' => 3000, 'th_req' => 2],
            3  => ['cost' => 1500, 'res_type' => RES_GOLD, 'time' => 300, 'hp' => 800, 'capacity' => 6000, 'th_req' => 2],
            4  => ['cost' => 3000, 'res_type' => RES_GOLD, 'time' => 1200, 'hp' => 1000, 'capacity' => 12000, 'th_req' => 3],
            5  => ['cost' => 6000, 'res_type' => RES_GOLD, 'time' => 3600, 'hp' => 1200, 'capacity' => 25000, 'th_req' => 3],
            6  => ['cost' => 12000, 'res_type' => RES_GOLD, 'time' => 7200, 'hp' => 1400, 'capacity' => 45000, 'th_req' => 3],
            7  => ['cost' => 25000, 'res_type' => RES_GOLD, 'time' => 14400, 'hp' => 1600, 'capacity' => 100000, 'th_req' => 4],
            8  => ['cost' => 50000, 'res_type' => RES_GOLD, 'time' => 28800, 'hp' => 1700, 'capacity' => 225000, 'th_req' => 4],
            9  => ['cost' => 100000, 'res_type' => RES_GOLD, 'time' => 43200, 'hp' => 1800, 'capacity' => 450000, 'th_req' => 5],
            10 => ['cost' => 250000, 'res_type' => RES_GOLD, 'time' => 86400, 'hp' => 1900, 'capacity' => 850000, 'th_req' => 6],
            11 => ['cost' => 500000, 'res_type' => RES_GOLD, 'time' => 172800, 'hp' => 2100, 'capacity' => 1750000, 'th_req' => 7],
            12 => ['cost' => 1000000, 'res_type' => RES_GOLD, 'time' => 345600, 'hp' => 2500, 'capacity' => 2000000, 'th_req' => 11],
            13 => ['cost' => 1800000, 'res_type' => RES_GOLD, 'time' => 518400, 'hp' => 2900, 'capacity' => 3000000, 'th_req' => 12],
            14 => ['cost' => 2800000, 'res_type' => RES_GOLD, 'time' => 691200, 'hp' => 3300, 'capacity' => 4000000, 'th_req' => 13],
            15 => ['cost' => 3000000, 'res_type' => RES_GOLD, 'time' => 777600, 'hp' => 3700, 'capacity' => 4500000, 'th_req' => 14],
            16 => ['cost' => 4000000, 'res_type' => RES_GOLD, 'time' => 950400, 'hp' => 3900, 'capacity' => 5000000, 'th_req' => 15],
        ]
    ],
    'dark_storage' => [
        'name' => 'Хранилище черного эликсира',
        'type' => TYPE_STORAGE,
        'description' => 'Хранит темный эликсир.',
        'levels' => [
            1 => ['cost' => 600000, 'res_type' => RES_ELIXIR, 'time' => 43200, 'hp' => 2000, 'capacity' => 10000, 'th_req' => 7],
            2 => ['cost' => 1200000, 'res_type' => RES_ELIXIR, 'time' => 86400, 'hp' => 2200, 'capacity' => 20000, 'th_req' => 7],
            3 => ['cost' => 1800000, 'res_type' => RES_ELIXIR, 'time' => 172800, 'hp' => 2400, 'capacity' => 40000, 'th_req' => 8],
            4 => ['cost' => 2400000, 'res_type' => RES_ELIXIR, 'time' => 259200, 'hp' => 2600, 'capacity' => 80000, 'th_req' => 9],
            5 => ['cost' => 3000000, 'res_type' => RES_ELIXIR, 'time' => 345600, 'hp' => 2900, 'capacity' => 150000, 'th_req' => 9],
            6 => ['cost' => 3600000, 'res_type' => RES_ELIXIR, 'time' => 432000, 'hp' => 3200, 'capacity' => 200000, 'th_req' => 9],
            7 => ['cost' => 5000000, 'res_type' => RES_ELIXIR, 'time' => 518400, 'hp' => 3500, 'capacity' => 240000, 'th_req' => 11],
            8 => ['cost' => 7500000, 'res_type' => RES_ELIXIR, 'time' => 691200, 'hp' => 4000, 'capacity' => 300000, 'th_req' => 13],
            9 => ['cost' => 12000000, 'res_type' => RES_ELIXIR, 'time' => 1036800, 'hp' => 4400, 'capacity' => 350000, 'th_req' => 14],
            10 => ['cost' => 15000000, 'res_type' => RES_ELIXIR, 'time' => 1209600, 'hp' => 4800, 'capacity' => 380000, 'th_req' => 15],
        ]
    ],

// ============================================================
    // 4. ОБОРОНА (Defense) - ДАННЫЕ ОСТАВЛЕНЫ БЕЗ ИЗМЕНЕНИЙ
    // ============================================================

    // --- ПУШКА (Cannon) ---
    'cannon' => [
        'name' => 'Пушка',
        'type' => TYPE_DEFENSE,
        'description' => 'Отлично подходит для точечной защиты. Бьет только наземные цели.',
        'attack_type' => 'single', 'targets' => 'ground',
        'levels' => [
            1  => ['cost' => 250, 'res_type' => RES_GOLD, 'time' => 10, 'hp' => 420, 'dps' => 9, 'th_req' => 1],
            2  => ['cost' => 1000, 'res_type' => RES_GOLD, 'time' => 120, 'hp' => 470, 'dps' => 11, 'th_req' => 1],
            3  => ['cost' => 4000, 'res_type' => RES_GOLD, 'time' => 600, 'hp' => 520, 'dps' => 15, 'th_req' => 2],
            4  => ['cost' => 16000, 'res_type' => RES_GOLD, 'time' => 2700, 'hp' => 570, 'dps' => 19, 'th_req' => 3],
            5  => ['cost' => 50000, 'res_type' => RES_GOLD, 'time' => 3600, 'hp' => 620, 'dps' => 25, 'th_req' => 4],
            6  => ['cost' => 100000, 'res_type' => RES_GOLD, 'time' => 7200, 'hp' => 670, 'dps' => 31, 'th_req' => 5],
            7  => ['cost' => 150000, 'res_type' => RES_GOLD, 'time' => 14400, 'hp' => 730, 'dps' => 40, 'th_req' => 6],
            8  => ['cost' => 240000, 'res_type' => RES_GOLD, 'time' => 21600, 'hp' => 800, 'dps' => 48, 'th_req' => 7],
            9  => ['cost' => 360000, 'res_type' => RES_GOLD, 'time' => 28800, 'hp' => 880, 'dps' => 56, 'th_req' => 8],
            10 => ['cost' => 500000, 'res_type' => RES_GOLD, 'time' => 36000, 'hp' => 960, 'dps' => 64, 'th_req' => 8],
            11 => ['cost' => 800000, 'res_type' => RES_GOLD, 'time' => 43200, 'hp' => 1060, 'dps' => 74, 'th_req' => 9],
            12 => ['cost' => 900000, 'res_type' => RES_GOLD, 'time' => 50400, 'hp' => 1160, 'dps' => 85, 'th_req' => 10],
            13 => ['cost' => 1700000, 'res_type' => RES_GOLD, 'time' => 57600, 'hp' => 1260, 'dps' => 95, 'th_req' => 10],
            14 => ['cost' => 2000000, 'res_type' => RES_GOLD, 'time' => 64800, 'hp' => 1380, 'dps' => 100, 'th_req' => 11],
            15 => ['cost' => 2200000, 'res_type' => RES_GOLD, 'time' => 72000, 'hp' => 1500, 'dps' => 105, 'th_req' => 11],
            16 => ['cost' => 2500000, 'res_type' => RES_GOLD, 'time' => 86400, 'hp' => 1620, 'dps' => 110, 'th_req' => 12],
            17 => ['cost' => 3000000, 'res_type' => RES_GOLD, 'time' => 129600, 'hp' => 1740, 'dps' => 115, 'th_req' => 12],
            18 => ['cost' => 3500000, 'res_type' => RES_GOLD, 'time' => 172800, 'hp' => 1870, 'dps' => 125, 'th_req' => 13],
            19 => ['cost' => 4000000, 'res_type' => RES_GOLD, 'time' => 216000, 'hp' => 2000, 'dps' => 135, 'th_req' => 13],
            20 => ['cost' => 5000000, 'res_type' => RES_GOLD, 'time' => 259200, 'hp' => 2150, 'dps' => 150, 'th_req' => 14],
            21 => ['cost' => 6000000, 'res_type' => RES_GOLD, 'time' => 302400, 'hp' => 2250, 'dps' => 160, 'th_req' => 15],
        ]
    ],

    // --- БАШНЯ ЛУЧНИЦ (Archer Tower) ---
    'archer_tower' => [
        'name' => 'Башня лучниц',
        'type' => TYPE_DEFENSE,
        'description' => 'Большая дальность, атакует и землю, и воздух.',
        'attack_type' => 'single', 'targets' => 'air_ground',
        'levels' => [
            1  => ['cost' => 1000, 'res_type' => RES_GOLD, 'time' => 60, 'hp' => 380, 'dps' => 11, 'th_req' => 2],
            2  => ['cost' => 2000, 'res_type' => RES_GOLD, 'time' => 120, 'hp' => 420, 'dps' => 15, 'th_req' => 2],
            3  => ['cost' => 5000, 'res_type' => RES_GOLD, 'time' => 900, 'hp' => 460, 'dps' => 19, 'th_req' => 3],
            4  => ['cost' => 20000, 'res_type' => RES_GOLD, 'time' => 2700, 'hp' => 500, 'dps' => 25, 'th_req' => 4],
            5  => ['cost' => 80000, 'res_type' => RES_GOLD, 'time' => 7200, 'hp' => 540, 'dps' => 30, 'th_req' => 5],
            6  => ['cost' => 180000, 'res_type' => RES_GOLD, 'time' => 14400, 'hp' => 580, 'dps' => 35, 'th_req' => 5],
            7  => ['cost' => 360000, 'res_type' => RES_GOLD, 'time' => 21600, 'hp' => 630, 'dps' => 42, 'th_req' => 6],
            8  => ['cost' => 720000, 'res_type' => RES_GOLD, 'time' => 28800, 'hp' => 690, 'dps' => 48, 'th_req' => 7],
            9  => ['cost' => 1500000, 'res_type' => RES_GOLD, 'time' => 36000, 'hp' => 750, 'dps' => 56, 'th_req' => 8],
            10 => ['cost' => 2500000, 'res_type' => RES_GOLD, 'time' => 43200, 'hp' => 810, 'dps' => 63, 'th_req' => 8],
            11 => ['cost' => 3500000, 'res_type' => RES_GOLD, 'time' => 57600, 'hp' => 890, 'dps' => 70, 'th_req' => 9],
            12 => ['cost' => 4500000, 'res_type' => RES_GOLD, 'time' => 72000, 'hp' => 970, 'dps' => 75, 'th_req' => 10],
            13 => ['cost' => 5500000, 'res_type' => RES_GOLD, 'time' => 86400, 'hp' => 1050, 'dps' => 80, 'th_req' => 10],
            14 => ['cost' => 6500000, 'res_type' => RES_GOLD, 'time' => 108000, 'hp' => 1130, 'dps' => 90, 'th_req' => 11],
            15 => ['cost' => 7500000, 'res_type' => RES_GOLD, 'time' => 172800, 'hp' => 1230, 'dps' => 100, 'th_req' => 11],
            16 => ['cost' => 8500000, 'res_type' => RES_GOLD, 'time' => 259200, 'hp' => 1340, 'dps' => 110, 'th_req' => 12],
            17 => ['cost' => 9500000, 'res_type' => RES_GOLD, 'time' => 345600, 'hp' => 1450, 'dps' => 120, 'th_req' => 12],
            18 => ['cost' => 11000000, 'res_type' => RES_GOLD, 'time' => 432000, 'hp' => 1570, 'dps' => 125, 'th_req' => 13],
            19 => ['cost' => 12500000, 'res_type' => RES_GOLD, 'time' => 518400, 'hp' => 1630, 'dps' => 130, 'th_req' => 13],
            20 => ['cost' => 14000000, 'res_type' => RES_GOLD, 'time' => 604800, 'hp' => 1700, 'dps' => 135, 'th_req' => 14],
            21 => ['cost' => 15500000, 'res_type' => RES_GOLD, 'time' => 777600, 'hp' => 1780, 'dps' => 140, 'th_req' => 15],
        ]
    ],

    // --- МОРТИРА (Mortar) ---
    'mortar' => [
        'name' => 'Мортира',
        'type' => TYPE_DEFENSE,
        'description' => 'Наносит сплэш-урон наземным целям. Имеет "слепую зону" вблизи.',
        'attack_type' => 'splash', 'targets' => 'ground',
        'levels' => [
            1  => ['cost' => 8000, 'res_type' => RES_GOLD, 'time' => 1800, 'hp' => 400, 'dps' => 4, 'th_req' => 3],
            2  => ['cost' => 32000, 'res_type' => RES_GOLD, 'time' => 3600, 'hp' => 450, 'dps' => 5, 'th_req' => 4],
            3  => ['cost' => 120000, 'res_type' => RES_GOLD, 'time' => 7200, 'hp' => 500, 'dps' => 6, 'th_req' => 5],
            4  => ['cost' => 400000, 'res_type' => RES_GOLD, 'time' => 14400, 'hp' => 550, 'dps' => 7, 'th_req' => 6],
            5  => ['cost' => 800000, 'res_type' => RES_GOLD, 'time' => 21600, 'hp' => 600, 'dps' => 9, 'th_req' => 7],
            6  => ['cost' => 1600000, 'res_type' => RES_GOLD, 'time' => 28800, 'hp' => 650, 'dps' => 11, 'th_req' => 8],
            7  => ['cost' => 3200000, 'res_type' => RES_GOLD, 'time' => 43200, 'hp' => 700, 'dps' => 15, 'th_req' => 9],
            8  => ['cost' => 5000000, 'res_type' => RES_GOLD, 'time' => 64800, 'hp' => 750, 'dps' => 20, 'th_req' => 10],
            9  => ['cost' => 7000000, 'res_type' => RES_GOLD, 'time' => 86400, 'hp' => 850, 'dps' => 25, 'th_req' => 11],
            10 => ['cost' => 9000000, 'res_type' => RES_GOLD, 'time' => 172800, 'hp' => 950, 'dps' => 30, 'th_req' => 12],
            11 => ['cost' => 11000000, 'res_type' => RES_GOLD, 'time' => 259200, 'hp' => 1100, 'dps' => 35, 'th_req' => 13],
            12 => ['cost' => 13000000, 'res_type' => RES_GOLD, 'time' => 345600, 'hp' => 1250, 'dps' => 38, 'th_req' => 13],
            13 => ['cost' => 15000000, 'res_type' => RES_GOLD, 'time' => 432000, 'hp' => 1400, 'dps' => 42, 'th_req' => 14],
            14 => ['cost' => 17000000, 'res_type' => RES_GOLD, 'time' => 604800, 'hp' => 1550, 'dps' => 48, 'th_req' => 15],
            15 => ['cost' => 18000000, 'res_type' => RES_GOLD, 'time' => 777600, 'hp' => 1700, 'dps' => 54, 'th_req' => 16],
        ]
    ],

    // --- ПВО (Air Defense) ---
    'air_defense' => [
        'name' => 'ПВО',
        'type' => TYPE_DEFENSE,
        'description' => 'Уничтожает воздушные цели мощными ракетами.',
        'attack_type' => 'single', 'targets' => 'air',
        'levels' => [
            1  => ['cost' => 22500, 'res_type' => RES_GOLD, 'time' => 10800, 'hp' => 800, 'dps' => 80, 'th_req' => 4],
            2  => ['cost' => 90000, 'res_type' => RES_GOLD, 'time' => 21600, 'hp' => 850, 'dps' => 110, 'th_req' => 4],
            3  => ['cost' => 270000, 'res_type' => RES_GOLD, 'time' => 36000, 'hp' => 900, 'dps' => 140, 'th_req' => 5],
            4  => ['cost' => 500000, 'res_type' => RES_GOLD, 'time' => 57600, 'hp' => 950, 'dps' => 160, 'th_req' => 6],
            5  => ['cost' => 800000, 'res_type' => RES_GOLD, 'time' => 86400, 'hp' => 1000, 'dps' => 190, 'th_req' => 7],
            6  => ['cost' => 1000000, 'res_type' => RES_GOLD, 'time' => 129600, 'hp' => 1050, 'dps' => 230, 'th_req' => 8],
            7  => ['cost' => 1750000, 'res_type' => RES_GOLD, 'time' => 172800, 'hp' => 1100, 'dps' => 280, 'th_req' => 9],
            8  => ['cost' => 2300000, 'res_type' => RES_GOLD, 'time' => 216000, 'hp' => 1210, 'dps' => 320, 'th_req' => 10],
            9  => ['cost' => 3400000, 'res_type' => RES_GOLD, 'time' => 259200, 'hp' => 1300, 'dps' => 360, 'th_req' => 11],
            10 => ['cost' => 5800000, 'res_type' => RES_GOLD, 'time' => 345600, 'hp' => 1400, 'dps' => 400, 'th_req' => 12],
            11 => ['cost' => 7500000, 'res_type' => RES_GOLD, 'time' => 432000, 'hp' => 1500, 'dps' => 440, 'th_req' => 13],
            12 => ['cost' => 8500000, 'res_type' => RES_GOLD, 'time' => 518400, 'hp' => 1650, 'dps' => 500, 'th_req' => 14],
            13 => ['cost' => 11500000, 'res_type' => RES_GOLD, 'time' => 604800, 'hp' => 1750, 'dps' => 540, 'th_req' => 15],
            14 => ['cost' => 15400000, 'res_type' => RES_GOLD, 'time' => 950400, 'hp' => 1850, 'dps' => 600, 'th_req' => 16],
            15 => ['cost' => 21000000, 'res_type' => RES_GOLD, 'time' => 1317600, 'hp' => 1950, 'dps' => 650, 'th_req' => 17],
        ]
    ],

    // --- БАШНЯ КОЛДУНА (Wizard Tower) ---
    'wizard_tower' => [
        'name' => 'Башня колдуна',
        'type' => TYPE_DEFENSE,
        'description' => 'Магический сплэш-урон по земле и воздуху.',
        'attack_type' => 'splash', 'targets' => 'air_ground',
        'levels' => [
            1  => ['cost' => 180000, 'res_type' => RES_GOLD, 'time' => 21600, 'hp' => 620, 'dps' => 14, 'th_req' => 5],
            2  => ['cost' => 360000, 'res_type' => RES_GOLD, 'time' => 43200, 'hp' => 660, 'dps' => 17, 'th_req' => 5],
            3  => ['cost' => 720000, 'res_type' => RES_GOLD, 'time' => 86400, 'hp' => 700, 'dps' => 21, 'th_req' => 6],
            4  => ['cost' => 1280000, 'res_type' => RES_GOLD, 'time' => 129600, 'hp' => 750, 'dps' => 26, 'th_req' => 7],
            5  => ['cost' => 1900000, 'res_type' => RES_GOLD, 'time' => 172800, 'hp' => 800, 'dps' => 32, 'th_req' => 8],
            6  => ['cost' => 2600000, 'res_type' => RES_GOLD, 'time' => 259200, 'hp' => 860, 'dps' => 40, 'th_req' => 8],
            7  => ['cost' => 3800000, 'res_type' => RES_GOLD, 'time' => 345600, 'hp' => 1000, 'dps' => 52, 'th_req' => 9],
            8  => ['cost' => 5200000, 'res_type' => RES_GOLD, 'time' => 432000, 'hp' => 1200, 'dps' => 64, 'th_req' => 10],
            9  => ['cost' => 6800000, 'res_type' => RES_GOLD, 'time' => 518400, 'hp' => 1500, 'dps' => 80, 'th_req' => 10],
            10 => ['cost' => 8200000, 'res_type' => RES_GOLD, 'time' => 604800, 'hp' => 1800, 'dps' => 95, 'th_req' => 11],
            11 => ['cost' => 10200000, 'res_type' => RES_GOLD, 'time' => 691200, 'hp' => 2100, 'dps' => 110, 'th_req' => 12],
            12 => ['cost' => 12200000, 'res_type' => RES_GOLD, 'time' => 864000, 'hp' => 2400, 'dps' => 125, 'th_req' => 13],
            13 => ['cost' => 14200000, 'res_type' => RES_GOLD, 'time' => 1036800, 'hp' => 2700, 'dps' => 135, 'th_req' => 13],
            14 => ['cost' => 16200000, 'res_type' => RES_GOLD, 'time' => 1209600, 'hp' => 2900, 'dps' => 150, 'th_req' => 14],
            15 => ['cost' => 18200000, 'res_type' => RES_GOLD, 'time' => 1296000, 'hp' => 3100, 'dps' => 165, 'th_req' => 15],
        ]
    ],

    // --- ЧИСТИЛЬЩИК (Air Sweeper) ---
    'air_sweeper' => [
        'name' => 'Чистильщик',
        'type' => TYPE_DEFENSE,
        'description' => 'Сдувает воздушные войска, не наносит урона.',
        'attack_type' => 'push', 'targets' => 'air',
        'levels' => [
            1 => ['cost' => 400000, 'res_type' => RES_GOLD, 'time' => 21600, 'hp' => 750, 'push_strength' => 1.6, 'th_req' => 6],
            2 => ['cost' => 600000, 'res_type' => RES_GOLD, 'time' => 28800, 'hp' => 800, 'push_strength' => 2.0, 'th_req' => 6],
            3 => ['cost' => 900000, 'res_type' => RES_GOLD, 'time' => 43200, 'hp' => 850, 'push_strength' => 2.4, 'th_req' => 7],
            4 => ['cost' => 1200000, 'res_type' => RES_GOLD, 'time' => 64800, 'hp' => 900, 'push_strength' => 2.8, 'th_req' => 8],
            5 => ['cost' => 1800000, 'res_type' => RES_GOLD, 'time' => 86400, 'hp' => 950, 'push_strength' => 3.2, 'th_req' => 9],
            6 => ['cost' => 1900000, 'res_type' => RES_GOLD, 'time' => 172800, 'hp' => 1000, 'push_strength' => 3.6, 'th_req' => 10],
            7 => ['cost' => 3400000, 'res_type' => RES_GOLD, 'time' => 259200, 'hp' => 1050, 'push_strength' => 4.0, 'th_req' => 11],
        ]
    ],

    // --- ПОТАЙНАЯ ТЕСЛА (Hidden Tesla) ---
    'hidden_tesla' => [
        'name' => 'Потайная Тесла',
        'type' => TYPE_DEFENSE,
        'description' => 'Скрыта под землей, пока враг не подойдет близко. x2 урон по ПЕККА.',
        'attack_type' => 'single', 'targets' => 'air_ground',
        'levels' => [
            1  => ['cost' => 250000, 'res_type' => RES_GOLD, 'time' => 7200, 'hp' => 600, 'dps' => 34, 'th_req' => 7],
            2  => ['cost' => 350000, 'res_type' => RES_GOLD, 'time' => 10800, 'hp' => 630, 'dps' => 40, 'th_req' => 7],
            3  => ['cost' => 520000, 'res_type' => RES_GOLD, 'time' => 18000, 'hp' => 660, 'dps' => 48, 'th_req' => 7],
            4  => ['cost' => 800000, 'res_type' => RES_GOLD, 'time' => 43200, 'hp' => 690, 'dps' => 55, 'th_req' => 8],
            5  => ['cost' => 1000000, 'res_type' => RES_GOLD, 'time' => 64800, 'hp' => 730, 'dps' => 64, 'th_req' => 8],
            6  => ['cost' => 1200000, 'res_type' => RES_GOLD, 'time' => 86400, 'hp' => 770, 'dps' => 75, 'th_req' => 8],
            7  => ['cost' => 1500000, 'res_type' => RES_GOLD, 'time' => 129600, 'hp' => 810, 'dps' => 87, 'th_req' => 9],
            8  => ['cost' => 1600000, 'res_type' => RES_GOLD, 'time' => 172800, 'hp' => 850, 'dps' => 99, 'th_req' => 10],
            9  => ['cost' => 2500000, 'res_type' => RES_GOLD, 'time' => 259200, 'hp' => 900, 'dps' => 110, 'th_req' => 11],
            10 => ['cost' => 5000000, 'res_type' => RES_GOLD, 'time' => 302400, 'hp' => 980, 'dps' => 120, 'th_req' => 12],
            11 => ['cost' => 5500000, 'res_type' => RES_GOLD, 'time' => 345600, 'hp' => 1100, 'dps' => 130, 'th_req' => 13],
            12 => ['cost' => 6000000, 'res_type' => RES_GOLD, 'time' => 367200, 'hp' => 1200, 'dps' => 140, 'th_req' => 13],
            13 => ['cost' => 7000000, 'res_type' => RES_GOLD, 'time' => 432000, 'hp' => 1350, 'dps' => 150, 'th_req' => 14],
            14 => ['cost' => 10000000, 'res_type' => RES_GOLD, 'time' => 518400, 'hp' => 1450, 'dps' => 160, 'th_req' => 15],
            15 => ['cost' => 15500000, 'res_type' => RES_GOLD, 'time' => 907200, 'hp' => 1550, 'dps' => 170, 'th_req' => 16],
        ]
    ],

    // --- БАШНЯ-БОМБЕШКА (Bomb Tower) ---
    'bomb_tower' => [
        'name' => 'Башня-бомбешка',
        'type' => TYPE_DEFENSE,
        'description' => 'Кидает бомбы. Взрывается при разрушении.',
        'attack_type' => 'splash', 'targets' => 'ground',
        'levels' => [
            1  => ['cost' => 700000, 'res_type' => RES_GOLD, 'time' => 64800, 'hp' => 650, 'dps' => 24, 'death_dmg' => 150, 'th_req' => 8],
            2  => ['cost' => 1000000, 'res_type' => RES_GOLD, 'time' => 86400, 'hp' => 700, 'dps' => 28, 'death_dmg' => 180, 'th_req' => 8],
            3  => ['cost' => 1600000, 'res_type' => RES_GOLD, 'time' => 129600, 'hp' => 750, 'dps' => 32, 'death_dmg' => 220, 'th_req' => 9],
            4  => ['cost' => 2000000, 'res_type' => RES_GOLD, 'time' => 172800, 'hp' => 850, 'dps' => 40, 'death_dmg' => 260, 'th_req' => 10],
            5  => ['cost' => 2800000, 'res_type' => RES_GOLD, 'time' => 216000, 'hp' => 1050, 'dps' => 48, 'death_dmg' => 300, 'th_req' => 11],
            6  => ['cost' => 3000000, 'res_type' => RES_GOLD, 'time' => 259200, 'hp' => 1300, 'dps' => 56, 'death_dmg' => 350, 'th_req' => 11],
            7  => ['cost' => 6000000, 'res_type' => RES_GOLD, 'time' => 345600, 'hp' => 1600, 'dps' => 64, 'death_dmg' => 400, 'th_req' => 12],
            8  => ['cost' => 7000000, 'res_type' => RES_GOLD, 'time' => 388800, 'hp' => 1900, 'dps' => 72, 'death_dmg' => 450, 'th_req' => 13],
            9  => ['cost' => 8000000, 'res_type' => RES_GOLD, 'time' => 432000, 'hp' => 2300, 'dps' => 84, 'death_dmg' => 500, 'th_req' => 14],
            10 => ['cost' => 10500000, 'res_type' => RES_GOLD, 'time' => 518400, 'hp' => 2500, 'dps' => 94, 'death_dmg' => 550, 'th_req' => 15],
            11 => ['cost' => 15300000, 'res_type' => RES_GOLD, 'time' => 950400, 'hp' => 2700, 'dps' => 104, 'death_dmg' => 600, 'th_req' => 16],
            12 => ['cost' => 20000000, 'res_type' => RES_GOLD, 'time' => 1296000, 'hp' => 2900, 'dps' => 114, 'death_dmg' => 650, 'th_req' => 17],
        ]
    ],

    // --- АРБАЛЕТ (X-Bow) ---
    'x_bow' => [
        'name' => 'Арбалет',
        'type' => TYPE_DEFENSE,
        'description' => 'Скорострельная турель. Режимы: Земля или Земля+Воздух.',
        'levels' => [
            1  => ['cost' => 1000000, 'res_type' => RES_GOLD, 'time' => 86400, 'hp' => 1500, 'dps' => 60, 'th_req' => 9],
            2  => ['cost' => 1600000, 'res_type' => RES_GOLD, 'time' => 108000, 'hp' => 1900, 'dps' => 70, 'th_req' => 9],
            3  => ['cost' => 2400000, 'res_type' => RES_GOLD, 'time' => 172800, 'hp' => 2300, 'dps' => 80, 'th_req' => 9],
            4  => ['cost' => 2500000, 'res_type' => RES_GOLD, 'time' => 259200, 'hp' => 2700, 'dps' => 85, 'th_req' => 10],
            5  => ['cost' => 3900000, 'res_type' => RES_GOLD, 'time' => 345600, 'hp' => 3100, 'dps' => 95, 'th_req' => 11],
            6  => ['cost' => 6000000, 'res_type' => RES_GOLD, 'time' => 432000, 'hp' => 3400, 'dps' => 110, 'th_req' => 12],
            7  => ['cost' => 7000000, 'res_type' => RES_GOLD, 'time' => 518400, 'hp' => 3700, 'dps' => 130, 'th_req' => 13],
            8  => ['cost' => 7500000, 'res_type' => RES_GOLD, 'time' => 604800, 'hp' => 4000, 'dps' => 155, 'th_req' => 13],
            9  => ['cost' => 9000000, 'res_type' => RES_GOLD, 'time' => 691200, 'hp' => 4200, 'dps' => 185, 'th_req' => 14],
            10 => ['cost' => 12000000, 'res_type' => RES_GOLD, 'time' => 777600, 'hp' => 4400, 'dps' => 205, 'th_req' => 15],
            11 => ['cost' => 15800000, 'res_type' => RES_GOLD, 'time' => 972000, 'hp' => 4600, 'dps' => 225, 'th_req' => 16],
        ]
    ],

    // --- АДСКАЯ БАШНЯ (Inferno Tower) ---
    'inferno_tower' => [
        'name' => 'Адская башня',
        'type' => TYPE_DEFENSE,
        'description' => 'Жарит врагов потоком огня. Режимы: Одиночный (урон растет) или Мульти.',
        'levels' => [
            1  => ['cost' => 1500000, 'res_type' => RES_GOLD, 'time' => 172800, 'hp' => 1500, 'dps_multi' => 30, 'dps_single_max' => 1000, 'th_req' => 10],
            2  => ['cost' => 2000000, 'res_type' => RES_GOLD, 'time' => 216000, 'hp' => 1800, 'dps_multi' => 35, 'dps_single_max' => 1250, 'th_req' => 10],
            3  => ['cost' => 3000000, 'res_type' => RES_GOLD, 'time' => 259200, 'hp' => 2100, 'dps_multi' => 40, 'dps_single_max' => 1500, 'th_req' => 10],
            4  => ['cost' => 3400000, 'res_type' => RES_GOLD, 'time' => 345600, 'hp' => 2400, 'dps_multi' => 45, 'dps_single_max' => 1750, 'th_req' => 11],
            5  => ['cost' => 4200000, 'res_type' => RES_GOLD, 'time' => 432000, 'hp' => 2700, 'dps_multi' => 50, 'dps_single_max' => 2000, 'th_req' => 11],
            6  => ['cost' => 6500000, 'res_type' => RES_GOLD, 'time' => 518400, 'hp' => 3000, 'dps_multi' => 55, 'dps_single_max' => 2250, 'th_req' => 12],
            7  => ['cost' => 8000000, 'res_type' => RES_GOLD, 'time' => 604800, 'hp' => 3300, 'dps_multi' => 65, 'dps_single_max' => 2500, 'th_req' => 13],
            8  => ['cost' => 11000000, 'res_type' => RES_GOLD, 'time' => 777600, 'hp' => 3700, 'dps_multi' => 80, 'dps_single_max' => 2800, 'th_req' => 14],
            9  => ['cost' => 12500000, 'res_type' => RES_GOLD, 'time' => 864000, 'hp' => 4000, 'dps_multi' => 100, 'dps_single_max' => 3100, 'th_req' => 15],
            10 => ['cost' => 16500000, 'res_type' => RES_GOLD, 'time' => 972000, 'hp' => 4400, 'dps_multi' => 120, 'dps_single_max' => 3400, 'th_req' => 16],
        ]
    ],

    // --- ОРЛИНАЯ АРТИЛЛЕРИЯ (Eagle Artillery) ---
    'eagle_artillery' => [
        'name' => 'Орлиная артиллерия',
        'type' => TYPE_DEFENSE,
        'description' => 'Атакует по всей карте. Активируется после высадки части армии.',
        'attack_type' => 'splash_global',
        'levels' => [
            1 => ['cost' => 5500000, 'res_type' => RES_GOLD, 'time' => 345600, 'hp' => 4000, 'dps' => 300, 'th_req' => 11],
            2 => ['cost' => 8000000, 'res_type' => RES_GOLD, 'time' => 432000, 'hp' => 4400, 'dps' => 350, 'th_req' => 11],
            3 => ['cost' => 10000000, 'res_type' => RES_GOLD, 'time' => 691200, 'hp' => 4800, 'dps' => 400, 'th_req' => 12],
            4 => ['cost' => 11000000, 'res_type' => RES_GOLD, 'time' => 777600, 'hp' => 5200, 'dps' => 450, 'th_req' => 13],
            5 => ['cost' => 13000000, 'res_type' => RES_GOLD, 'time' => 1036800, 'hp' => 5600, 'dps' => 500, 'th_req' => 14],
            6 => ['cost' => 14000000, 'res_type' => RES_GOLD, 'time' => 1080000, 'hp' => 5900, 'dps' => 525, 'th_req' => 15],
            7 => ['cost' => 17500000, 'res_type' => RES_GOLD, 'time' => 1123200, 'hp' => 6200, 'dps' => 550, 'th_req' => 16],
        ]
    ],

    // --- ШВЫРЯТЕЛЬ (Scattershot) ---
    'scattershot' => [
        'name' => 'Швырятель',
        'type' => TYPE_DEFENSE,
        'description' => 'Кидает камни, которые рассыпаются и наносят урон конусом позади цели.',
        'levels' => [
            1 => ['cost' => 8000000, 'res_type' => RES_GOLD, 'time' => 691200, 'hp' => 3600, 'dps' => 125, 'th_req' => 13],
            2 => ['cost' => 9000000, 'res_type' => RES_GOLD, 'time' => 777600, 'hp' => 4200, 'dps' => 150, 'th_req' => 13],
            3 => ['cost' => 12600000, 'res_type' => RES_GOLD, 'time' => 864000, 'hp' => 4800, 'dps' => 175, 'th_req' => 14],
            4 => ['cost' => 13000000, 'res_type' => RES_GOLD, 'time' => 950400, 'hp' => 5100, 'dps' => 185, 'th_req' => 15],
            5 => ['cost' => 17000000, 'res_type' => RES_GOLD, 'time' => 993600, 'hp' => 5410, 'dps' => 190, 'th_req' => 16],
        ]
    ],

    // --- БАШНЯ ЗАКЛИНАНИЙ (Spell Tower) ---
    'spell_tower' => [
        'name' => 'Башня заклинаний',
        'type' => TYPE_DEFENSE,
        'description' => 'Бросает заклинания на защиту или против врагов (Яд, Ярость, Невидимость).',
        'levels' => [
            1 => ['cost' => 11000000, 'res_type' => RES_GOLD, 'time' => 777600, 'hp' => 2500, 'spell' => 'Rage', 'th_req' => 15],
            2 => ['cost' => 12000000, 'res_type' => RES_GOLD, 'time' => 928800, 'hp' => 2800, 'spell' => 'Poison', 'th_req' => 15],
            3 => ['cost' => 13000000, 'res_type' => RES_GOLD, 'time' => 950400, 'hp' => 3100, 'spell' => 'Invisibility', 'th_req' => 15],
        ]
    ],

    // --- МОНОЛИТ (Monolith) ---
    'monolith' => [
        'name' => 'Монолит',
        'type' => TYPE_DEFENSE,
        'description' => 'Наносит урон в % от здоровья цели. Убийца танков.',
        'levels' => [
            1 => ['cost' => 300000, 'res_type' => RES_DARK, 'time' => 993600, 'hp' => 4747, 'dps' => 150, 'bonus_pct' => 11, 'th_req' => 15],
            2 => ['cost' => 360000, 'res_type' => RES_DARK, 'time' => 1209600, 'hp' => 5050, 'dps' => 175, 'bonus_pct' => 12, 'th_req' => 15],
            3 => ['cost' => 370000, 'res_type' => RES_DARK, 'time' => 1296000, 'hp' => 5353, 'dps' => 193, 'bonus_pct' => 13, 'th_req' => 16],
        ]
    ],

    // --- РИКОШЕТНАЯ ПУШКА (Ricochet Cannon) - Слияние 2 пушек ---
    'ricochet_cannon' => [
        'name' => 'Рикошетная пушка',
        'type' => TYPE_DEFENSE,
        'description' => 'Снаряды отскакивают во вторую цель. Требует слияния двух Пушек макс. уровня.',
        'levels' => [
            1 => ['cost' => 20000000, 'res_type' => RES_GOLD, 'time' => 1209600, 'hp' => 5400, 'dps' => 360, 'th_req' => 16],
            2 => ['cost' => 22000000, 'res_type' => RES_GOLD, 'time' => 1296000, 'hp' => 5700, 'dps' => 390, 'th_req' => 16],
        ]
    ],

    // --- МНОГОЦЕЛЕВАЯ БАШНЯ ЛУЧНИЦ (Multi-Archer Tower) - Слияние 2 башен ---
    'multi_archer_tower' => [
        'name' => 'Многоцелевая башня',
        'type' => TYPE_DEFENSE,
        'description' => 'Атакует сразу 3 цели. Требует слияния двух Башен лучниц макс. уровня.',
        'levels' => [
            1 => ['cost' => 20000000, 'res_type' => RES_GOLD, 'time' => 1209600, 'hp' => 5000, 'dps' => 110, 'th_req' => 16],
            2 => ['cost' => 22000000, 'res_type' => RES_GOLD, 'time' => 1296000, 'hp' => 5300, 'dps' => 120, 'th_req' => 16],
        ]
    ],

    // ============================================================
    // 5. ЛОВУШКИ (Traps) - ОСТАВЛЕНЫ БЕЗ ИЗМЕНЕНИЙ
    // ============================================================

    'bomb' => [
        'name' => 'Бомба',
        'type' => TYPE_TRAP,
        'levels' => [
            1  => ['cost' => 400, 'res_type' => RES_GOLD, 'time' => 0, 'damage' => 20, 'th_req' => 3],
            2  => ['cost' => 1000, 'res_type' => RES_GOLD, 'time' => 360, 'damage' => 24, 'th_req' => 3],
            3  => ['cost' => 10000, 'res_type' => RES_GOLD, 'time' => 3600, 'damage' => 29, 'th_req' => 5],
            4  => ['cost' => 75000, 'res_type' => RES_GOLD, 'time' => 7200, 'damage' => 35, 'th_req' => 7],
            5  => ['cost' => 220000, 'res_type' => RES_GOLD, 'time' => 14400, 'damage' => 42, 'th_req' => 8],
            6  => ['cost' => 450000, 'res_type' => RES_GOLD, 'time' => 21600, 'damage' => 54, 'th_req' => 9],
            7  => ['cost' => 650000, 'res_type' => RES_GOLD, 'time' => 28800, 'damage' => 72, 'th_req' => 10],
            8  => ['cost' => 1100000, 'res_type' => RES_GOLD, 'time' => 43200, 'damage' => 92, 'th_req' => 11],
            9  => ['cost' => 1500000, 'res_type' => RES_GOLD, 'time' => 86400, 'damage' => 125, 'th_req' => 13],
            10 => ['cost' => 2000000, 'res_type' => RES_GOLD, 'time' => 172800, 'damage' => 140, 'th_req' => 14],
            11 => ['cost' => 3000000, 'res_type' => RES_GOLD, 'time' => 259200, 'damage' => 155, 'th_req' => 15],
            12 => ['cost' => 6750000, 'res_type' => RES_GOLD, 'time' => 518400, 'damage' => 170, 'th_req' => 16],
            13 => ['cost' => 10000000, 'res_type' => RES_GOLD, 'time' => 691200, 'damage' => 185, 'th_req' => 17],
        ]
    ],

    'spring_trap' => [
        'name' => 'Пружинная ловушка',
        'type' => TYPE_TRAP,
        'description' => 'Выбрасывает войска с карты (зависит от веса).',
        'levels' => [
            1 => ['cost' => 2000, 'res_type' => RES_GOLD, 'time' => 0, 'capacity' => 10, 'th_req' => 4],
            2 => ['cost' => 250000, 'res_type' => RES_GOLD, 'time' => 10800, 'capacity' => 12, 'th_req' => 7],
            3 => ['cost' => 375000, 'res_type' => RES_GOLD, 'time' => 32400, 'capacity' => 14, 'th_req' => 8],
            4 => ['cost' => 700000, 'res_type' => RES_GOLD, 'time' => 43200, 'capacity' => 16, 'th_req' => 9],
            5 => ['cost' => 800000, 'res_type' => RES_GOLD, 'time' => 86400, 'capacity' => 18, 'th_req' => 10],
        ]
    ],

    'giant_bomb' => [
        'name' => 'Гигантская бомба',
        'type' => TYPE_TRAP,
        'levels' => [
            1  => ['cost' => 12500, 'res_type' => RES_GOLD, 'time' => 0, 'damage' => 175, 'th_req' => 6],
            2  => ['cost' => 75000, 'res_type' => RES_GOLD, 'time' => 10800, 'damage' => 200, 'th_req' => 6],
            3  => ['cost' => 480000, 'res_type' => RES_GOLD, 'time' => 21600, 'damage' => 225, 'th_req' => 8],
            4  => ['cost' => 1500000, 'res_type' => RES_GOLD, 'time' => 43200, 'damage' => 250, 'th_req' => 10],
            5  => ['cost' => 2000000, 'res_type' => RES_GOLD, 'time' => 64800, 'damage' => 275, 'th_req' => 11],
            6  => ['cost' => 2500000, 'res_type' => RES_GOLD, 'time' => 86400, 'damage' => 325, 'th_req' => 13],
            7  => ['cost' => 3500000, 'res_type' => RES_GOLD, 'time' => 172800, 'damage' => 375, 'th_req' => 13],
            8  => ['cost' => 4000000, 'res_type' => RES_GOLD, 'time' => 259200, 'damage' => 400, 'th_req' => 14],
            9  => ['cost' => 5000000, 'res_type' => RES_GOLD, 'time' => 345600, 'damage' => 425, 'th_req' => 15],
            10 => ['cost' => 9000000, 'res_type' => RES_GOLD, 'time' => 691200, 'damage' => 450, 'th_req' => 16],
            11 => ['cost' => 12000000, 'res_type' => RES_GOLD, 'time' => 777600, 'damage' => 475, 'th_req' => 17],
        ]
    ],

    'air_bomb' => [
        'name' => 'Воздушная бомба',
        'type' => TYPE_TRAP,
        'description' => 'Сплэш-урон по воздуху.',
        'levels' => [
            1  => ['cost' => 4000, 'res_type' => RES_GOLD, 'time' => 0, 'damage' => 100, 'th_req' => 5],
            2  => ['cost' => 20000, 'res_type' => RES_GOLD, 'time' => 3600, 'damage' => 120, 'th_req' => 5],
            3  => ['cost' => 150000, 'res_type' => RES_GOLD, 'time' => 7200, 'damage' => 144, 'th_req' => 7],
            4  => ['cost' => 540000, 'res_type' => RES_GOLD, 'time' => 28800, 'damage' => 173, 'th_req' => 9],
            5  => ['cost' => 1100000, 'res_type' => RES_GOLD, 'time' => 43200, 'damage' => 208, 'th_req' => 11],
            6  => ['cost' => 1900000, 'res_type' => RES_GOLD, 'time' => 86400, 'damage' => 232, 'th_req' => 12],
            7  => ['cost' => 2000000, 'res_type' => RES_GOLD, 'time' => 172800, 'damage' => 252, 'th_req' => 13],
            8  => ['cost' => 2600000, 'res_type' => RES_GOLD, 'time' => 216000, 'damage' => 280, 'th_req' => 13],
            9  => ['cost' => 4000000, 'res_type' => RES_GOLD, 'time' => 259200, 'damage' => 325, 'th_req' => 14],
            10 => ['cost' => 5000000, 'res_type' => RES_GOLD, 'time' => 345600, 'damage' => 350, 'th_req' => 15],
            11 => ['cost' => 7500000, 'res_type' => RES_GOLD, 'time' => 604800, 'damage' => 375, 'th_req' => 16],
            12 => ['cost' => 11000000, 'res_type' => RES_GOLD, 'time' => 734400, 'damage' => 400, 'th_req' => 17],
        ]
    ],

    'seeking_air_mine' => [
        'name' => 'Адская мина',
        'type' => TYPE_TRAP,
        'description' => 'Огромный урон по одной воздушной цели.',
        'levels' => [
            1 => ['cost' => 12000, 'res_type' => RES_GOLD, 'time' => 0, 'damage' => 1500, 'th_req' => 7],
            2 => ['cost' => 900000, 'res_type' => RES_GOLD, 'time' => 43200, 'damage' => 1800, 'th_req' => 9],
            3 => ['cost' => 1600000, 'res_type' => RES_GOLD, 'time' => 86400, 'damage' => 2100, 'th_req' => 10],
            4 => ['cost' => 3100000, 'res_type' => RES_GOLD, 'time' => 259200, 'damage' => 2500, 'th_req' => 13],
            5 => ['cost' => 6000000, 'res_type' => RES_GOLD, 'time' => 432000, 'damage' => 2800, 'th_req' => 15],
            6 => ['cost' => 10500000, 'res_type' => RES_GOLD, 'time' => 799200, 'damage' => 3000, 'th_req' => 16],
            7 => ['cost' => 14000000, 'res_type' => RES_GOLD, 'time' => 864000, 'damage' => 3200, 'th_req' => 17],
        ]
    ],
    
    'skeleton_trap' => [
        'name' => 'Ловушка-скелет',
        'type' => TYPE_TRAP,
        'levels' => [
            1 => ['cost' => 6000, 'res_type' => RES_GOLD, 'time' => 0, 'spawns' => 2, 'th_req' => 8],
            2 => ['cost' => 300000, 'res_type' => RES_GOLD, 'time' => 18000, 'spawns' => 3, 'th_req' => 8],
            3 => ['cost' => 800000, 'res_type' => RES_GOLD, 'time' => 36000, 'spawns' => 4, 'th_req' => 9],
            4 => ['cost' => 1100000, 'res_type' => RES_GOLD, 'time' => 72000, 'spawns' => 5, 'th_req' => 10],
        ]
    ],

    'tornado_trap' => [
        'name' => 'Ловушка Торнадо',
        'type' => TYPE_TRAP,
        'description' => 'Затягивает войска в вихрь.',
        'levels' => [
            1 => ['cost' => 1800000, 'res_type' => RES_GOLD, 'time' => 86400, 'duration' => 6, 'th_req' => 11],
            2 => ['cost' => 2800000, 'res_type' => RES_GOLD, 'time' => 172800, 'duration' => 8, 'th_req' => 11],
            3 => ['cost' => 3500000, 'res_type' => RES_GOLD, 'time' => 259200, 'duration' => 10, 'th_req' => 12],
        ]
    ],

// ============================================================
    // 6. СТЕНЫ (Walls) - ОСТАВЛЕНЫ БЕЗ ИЗМЕНЕНИЙ
    // ============================================================
    'wall' => [
        'name' => 'Стена',
        'type' => TYPE_WALL,
        'description' => 'Защищает деревню. С 9 уровня можно улучшать за Эликсир!',
        'levels' => [
            // Уровни 1-8: Только Золото
            1  => ['cost' => 50, 'res_type' => RES_GOLD, 'hp' => 300, 'th_req' => 2], 
            2  => ['cost' => 1000, 'res_type' => RES_GOLD, 'hp' => 500, 'th_req' => 2],
            3  => ['cost' => 5000, 'res_type' => RES_GOLD, 'hp' => 700, 'th_req' => 3],
            4  => ['cost' => 10000, 'res_type' => RES_GOLD, 'hp' => 900, 'th_req' => 4],
            5  => ['cost' => 20000, 'res_type' => RES_GOLD, 'hp' => 1400, 'th_req' => 5],
            6  => ['cost' => 30000, 'res_type' => RES_GOLD, 'hp' => 2000, 'th_req' => 6],
            7  => ['cost' => 50000, 'res_type' => RES_GOLD, 'hp' => 2500, 'th_req' => 7],
            8  => ['cost' => 75000, 'res_type' => RES_GOLD, 'hp' => 3000, 'th_req' => 8],
            
            // Уровни 9+: Золото ИЛИ Эликсир
            // Мы используем массив для res_type, чтобы показать альтернативу
            9  => ['cost' => 100000, 'res_type' => [RES_GOLD, RES_ELIXIR], 'hp' => 3500, 'th_req' => 9],
            10 => ['cost' => 200000, 'res_type' => [RES_GOLD, RES_ELIXIR], 'hp' => 4000, 'th_req' => 9],
            11 => ['cost' => 500000, 'res_type' => [RES_GOLD, RES_ELIXIR], 'hp' => 5000, 'th_req' => 10],
            12 => ['cost' => 1000000, 'res_type' => [RES_GOLD, RES_ELIXIR], 'hp' => 6000, 'th_req' => 11],
            13 => ['cost' => 2000000, 'res_type' => [RES_GOLD, RES_ELIXIR], 'hp' => 7500, 'th_req' => 12],
            14 => ['cost' => 3000000, 'res_type' => [RES_GOLD, RES_ELIXIR], 'hp' => 9000, 'th_req' => 13],
            15 => ['cost' => 4000000, 'res_type' => [RES_GOLD, RES_ELIXIR], 'hp' => 10500, 'th_req' => 14],
            16 => ['cost' => 6000000, 'res_type' => [RES_GOLD, RES_ELIXIR], 'hp' => 12000, 'th_req' => 15],
            17 => ['cost' => 7000000, 'res_type' => [RES_GOLD, RES_ELIXIR], 'hp' => 13500, 'th_req' => 16],
            18 => ['cost' => 8000000, 'res_type' => [RES_GOLD, RES_ELIXIR], 'hp' => 14500, 'th_req' => 17],
        ]
    ],



    // ============================================================
    // 5. АРМИЯ И КЛАН (Army) - ДАННЫЕ ОСТАВЛЕНЫ БЕЗ ИЗМЕНЕНИЙ
    // ============================================================

    'army_camp' => [
        'name' => 'Военный лагерь',
        'type' => TYPE_ARMY,
        'description' => 'Увеличивает размер армии.',
        'levels' => [
            1  => ['cost' => 250, 'res_type' => RES_ELIXIR, 'time' => 300, 'hp' => 250, 'capacity_army' => 20, 'th_req' => 1],
            2  => ['cost' => 2500, 'res_type' => RES_ELIXIR, 'time' => 900, 'hp' => 270, 'capacity_army' => 30, 'th_req' => 2],
            3  => ['cost' => 10000, 'res_type' => RES_ELIXIR, 'time' => 7200, 'hp' => 290, 'capacity_army' => 35, 'th_req' => 3],
            4  => ['cost' => 100000, 'res_type' => RES_ELIXIR, 'time' => 18000, 'hp' => 310, 'capacity_army' => 40, 'th_req' => 4],
            5  => ['cost' => 250000, 'res_type' => RES_ELIXIR, 'time' => 28800, 'hp' => 330, 'capacity_army' => 45, 'th_req' => 5],
            6  => ['cost' => 750000, 'res_type' => RES_ELIXIR, 'time' => 43200, 'hp' => 350, 'capacity_army' => 50, 'th_req' => 6],
            7  => ['cost' => 1500000, 'res_type' => RES_ELIXIR, 'time' => 172800, 'hp' => 400, 'capacity_army' => 55, 'th_req' => 9],
            8  => ['cost' => 2500000, 'res_type' => RES_ELIXIR, 'time' => 259200, 'hp' => 500, 'capacity_army' => 60, 'th_req' => 10],
            9  => ['cost' => 4200000, 'res_type' => RES_ELIXIR, 'time' => 542160, 'hp' => 600, 'capacity_army' => 65, 'th_req' => 11],
            10 => ['cost' => 5700000, 'res_type' => RES_ELIXIR, 'time' => 756000, 'hp' => 700, 'capacity_army' => 70, 'th_req' => 12],
            11 => ['cost' => 9600000, 'res_type' => RES_ELIXIR, 'time' => 820800, 'hp' => 800, 'capacity_army' => 75, 'th_req' => 13],
            12 => ['cost' => 19000000, 'res_type' => RES_ELIXIR, 'time' => 1080000, 'hp' => 850, 'capacity_army' => 80, 'th_req' => 15],
        ]
    ],
    'clan_castle' => [
        'name' => 'Клановая крепость',
        'type' => TYPE_ARMY,
        'description' => 'Вмещает подкрепления.',
        'levels' => [
            1  => ['cost' => 10000, 'res_type' => RES_GOLD, 'time' => 0, 'hp' => 1000, 'capacity_cc' => 10, 'th_req' => 3],
            2  => ['cost' => 100000, 'res_type' => RES_GOLD, 'time' => 14400, 'hp' => 1400, 'capacity_cc' => 15, 'th_req' => 4],
            3  => ['cost' => 800000, 'res_type' => RES_GOLD, 'time' => 28800, 'hp' => 2000, 'capacity_cc' => 20, 'th_req' => 6],
            4  => ['cost' => 1900000, 'res_type' => RES_GOLD, 'time' => 43200, 'hp' => 2600, 'capacity_cc' => 25, 'th_req' => 8],
            5  => ['cost' => 3000000, 'res_type' => RES_GOLD, 'time' => 86400, 'hp' => 3000, 'capacity_cc' => 30, 'th_req' => 9],
            6  => ['cost' => 5500000, 'res_type' => RES_GOLD, 'time' => 172800, 'hp' => 3400, 'capacity_cc' => 35, 'th_req' => 10],
            7  => ['cost' => 9000000, 'res_type' => RES_GOLD, 'time' => 345600, 'hp' => 3800, 'capacity_cc' => 40, 'th_req' => 11],
            8  => ['cost' => 13000000, 'res_type' => RES_GOLD, 'time' => 518400, 'hp' => 4400, 'capacity_cc' => 45, 'th_req' => 12],
            9  => ['cost' => 16000000, 'res_type' => RES_GOLD, 'time' => 777600, 'hp' => 4800, 'capacity_cc' => 45, 'th_req' => 13], // + Spell Slot
            10 => ['cost' => 19000000, 'res_type' => RES_GOLD, 'time' => 1036800, 'hp' => 5200, 'capacity_cc' => 50, 'th_req' => 14],
            11 => ['cost' => 21000000, 'res_type' => RES_GOLD, 'time' => 1209600, 'hp' => 5600, 'capacity_cc' => 55, 'th_req' => 15],
        ]
    ],
    'laboratory' => [
        'name' => 'Лаборатория',
        'type' => TYPE_ARMY,
        'description' => 'Улучшает войска.',
        'levels' => [
            1  => ['cost' => 5000, 'res_type' => RES_ELIXIR, 'time' => 60, 'hp' => 500, 'th_req' => 3],
            2  => ['cost' => 25000, 'res_type' => RES_ELIXIR, 'time' => 3600, 'hp' => 550, 'th_req' => 4],
            3  => ['cost' => 50000, 'res_type' => RES_ELIXIR, 'time' => 7200, 'hp' => 600, 'th_req' => 5],
            4  => ['cost' => 100000, 'res_type' => RES_ELIXIR, 'time' => 14400, 'hp' => 650, 'th_req' => 6],
            5  => ['cost' => 200000, 'res_type' => RES_ELIXIR, 'time' => 28800, 'hp' => 700, 'th_req' => 7],
            6  => ['cost' => 400000, 'res_type' => RES_ELIXIR, 'time' => 57600, 'hp' => 750, 'th_req' => 8],
            7  => ['cost' => 800000, 'res_type' => RES_ELIXIR, 'time' => 86400, 'hp' => 830, 'th_req' => 9],
            8  => ['cost' => 1300000, 'res_type' => RES_ELIXIR, 'time' => 158400, 'hp' => 950, 'th_req' => 10],
            9  => ['cost' => 2100000, 'res_type' => RES_ELIXIR, 'time' => 244800, 'hp' => 1070, 'th_req' => 11],
            10 => ['cost' => 3800000, 'res_type' => RES_ELIXIR, 'time' => 345600, 'hp' => 1140, 'th_req' => 12],
            11 => ['cost' => 5500000, 'res_type' => RES_ELIXIR, 'time' => 518400, 'hp' => 1210, 'th_req' => 13],
            12 => ['cost' => 8100000, 'res_type' => RES_ELIXIR, 'time' => 604800, 'hp' => 1280, 'th_req' => 14],
            13 => ['cost' => 10800000, 'res_type' => RES_ELIXIR, 'time' => 691200, 'hp' => 1350, 'th_req' => 15],
            14 => ['cost' => 13000000, 'res_type' => RES_ELIXIR, 'time' => 1080000, 'hp' => 1400, 'th_req' => 16],
        ]
    ],
    'barracks' => [
        'name' => 'Казарма',
        'type' => TYPE_ARMY,
        'description' => 'Тренирует войска.',
        'levels' => [
            1  => ['cost' => 200, 'res_type' => RES_ELIXIR, 'time' => 10, 'hp' => 250, 'unlocks' => 'barbarian', 'th_req' => 1],
            2  => ['cost' => 1000, 'res_type' => RES_ELIXIR, 'time' => 60, 'hp' => 300, 'unlocks' => 'archer', 'th_req' => 1],
            3  => ['cost' => 3000, 'res_type' => RES_ELIXIR, 'time' => 120, 'hp' => 350, 'unlocks' => 'giant', 'th_req' => 2],
            4  => ['cost' => 10000, 'res_type' => RES_ELIXIR, 'time' => 300, 'hp' => 400, 'unlocks' => 'goblin', 'th_req' => 2],
            5  => ['cost' => 50000, 'res_type' => RES_ELIXIR, 'time' => 900, 'hp' => 450, 'unlocks' => 'wall_breaker', 'th_req' => 3],
            6  => ['cost' => 150000, 'res_type' => RES_ELIXIR, 'time' => 1800, 'hp' => 500, 'unlocks' => 'balloon', 'th_req' => 4],
            7  => ['cost' => 300000, 'res_type' => RES_ELIXIR, 'time' => 3600, 'hp' => 550, 'unlocks' => 'wizard', 'th_req' => 5],
            8  => ['cost' => 750000, 'res_type' => RES_ELIXIR, 'time' => 7200, 'hp' => 600, 'unlocks' => 'healer', 'th_req' => 6],
            9  => ['cost' => 1500000, 'res_type' => RES_ELIXIR, 'time' => 14400, 'hp' => 650, 'unlocks' => 'dragon', 'th_req' => 7],
            10 => ['cost' => 2000000, 'res_type' => RES_ELIXIR, 'time' => 21600, 'hp' => 700, 'unlocks' => 'pekka', 'th_req' => 8],
            11 => ['cost' => 3000000, 'res_type' => RES_ELIXIR, 'time' => 28800, 'hp' => 750, 'unlocks' => 'baby_dragon', 'th_req' => 9],
            12 => ['cost' => 4000000, 'res_type' => RES_ELIXIR, 'time' => 43200, 'hp' => 820, 'unlocks' => 'miner', 'th_req' => 10],
            13 => ['cost' => 5000000, 'res_type' => RES_ELIXIR, 'time' => 57600, 'hp' => 900, 'unlocks' => 'electro_dragon', 'th_req' => 11],
            14 => ['cost' => 6000000, 'res_type' => RES_ELIXIR, 'time' => 72000, 'hp' => 980, 'unlocks' => 'yeti', 'th_req' => 12],
            15 => ['cost' => 9000000, 'res_type' => RES_ELIXIR, 'time' => 108000, 'hp' => 1050, 'unlocks' => 'dragon_rider', 'th_req' => 13],
            16 => ['cost' => 12000000, 'res_type' => RES_ELIXIR, 'time' => 144000, 'hp' => 1100, 'unlocks' => 'electro_titan', 'th_req' => 14],
        ]
    ],
	
	
	
	
	
	
	
	// ============================================================
    // 7. ВОЙСКА ЭЛИКСИРА (Elixir Troops)
    // ДАННЫЕ ОБНОВЛЕНЫ НА ОСНОВЕ raw.json
    // ============================================================
    'barbarian' => [
        'name' => 'Варвар',
        'type' => TYPE_TROOP,
        'housing_space' => 1,
        'training_time' => 5, // 5s from JSON
        'levels' => [
            1  => ['cost' => 100, 'res_type' => RES_ELIXIR, 'time' => 10, 'dps' => 9, 'th_req' => 1], // Unlocked at Barracks L1
            2  => ['cost' => 10000, 'res_type' => RES_ELIXIR, 'time' => 1800, 'dps' => 12, 'th_req' => 2],
            3  => ['cost' => 50000, 'res_type' => RES_ELIXIR, 'time' => 3600, 'dps' => 15, 'th_req' => 3],
            4  => ['cost' => 130000, 'res_type' => RES_ELIXIR, 'time' => 7200, 'dps' => 18, 'th_req' => 4],
            5  => ['cost' => 300000, 'res_type' => RES_ELIXIR, 'time' => 14400, 'dps' => 23, 'th_req' => 5],
            6  => ['cost' => 800000, 'res_type' => RES_ELIXIR, 'time' => 28800, 'dps' => 26, 'th_req' => 6],
            7  => ['cost' => 1000000, 'res_type' => RES_ELIXIR, 'time' => 43200, 'dps' => 30, 'th_req' => 7],
            8  => ['cost' => 1500000, 'res_type' => RES_ELIXIR, 'time' => 86400, 'dps' => 34, 'th_req' => 8],
            9  => ['cost' => 2500000, 'res_type' => RES_ELIXIR, 'time' => 129600, 'dps' => 38, 'th_req' => 9],
            10 => ['cost' => 4300000, 'res_type' => RES_ELIXIR, 'time' => 172800, 'dps' => 42, 'th_req' => 10],
            11 => ['cost' => 6000000, 'res_type' => RES_ELIXIR, 'time' => 259200, 'dps' => 45, 'th_req' => 11],
            12 => ['cost' => 8000000, 'res_type' => RES_ELIXIR, 'time' => 388800, 'dps' => 48, 'th_req' => 12],
            // Уровни 13+ требуют Dark Elixir или другое TH. Применяем последние данные из JSON.
        ]
    ],
    'archer' => [
        'name' => 'Лучница',
        'type' => TYPE_TROOP,
        'housing_space' => 1,
        'training_time' => 6, // 6s from JSON
        'levels' => [
            1  => ['cost' => 500, 'res_type' => RES_ELIXIR, 'time' => 15, 'dps' => 8, 'th_req' => 2], // Unlocked at Barracks L2
            2  => ['cost' => 20000, 'res_type' => RES_ELIXIR, 'time' => 3600, 'dps' => 10, 'th_req' => 2],
            3  => ['cost' => 80000, 'res_type' => RES_ELIXIR, 'time' => 7200, 'dps' => 13, 'th_req' => 3],
            4  => ['cost' => 200000, 'res_type' => RES_ELIXIR, 'time' => 10800, 'dps' => 16, 'th_req' => 4],
            5  => ['cost' => 500000, 'res_type' => RES_ELIXIR, 'time' => 28800, 'dps' => 20, 'th_req' => 5],
            6  => ['cost' => 1000000, 'res_type' => RES_ELIXIR, 'time' => 43200, 'dps' => 22, 'th_req' => 6],
            7  => ['cost' => 1500000, 'res_type' => RES_ELIXIR, 'time' => 86400, 'dps' => 25, 'th_req' => 7],
            8  => ['cost' => 2300000, 'res_type' => RES_ELIXIR, 'time' => 129600, 'dps' => 28, 'th_req' => 8],
            9  => ['cost' => 3000000, 'res_type' => RES_ELIXIR, 'time' => 172800, 'dps' => 31, 'th_req' => 9],
            10 => ['cost' => 4500000, 'res_type' => RES_ELIXIR, 'time' => 302400, 'dps' => 34, 'th_req' => 10],
            11 => ['cost' => 6500000, 'res_type' => RES_ELIXIR, 'time' => 345600, 'dps' => 37, 'th_req' => 11],
            12 => ['cost' => 9000000, 'res_type' => RES_ELIXIR, 'time' => 432000, 'dps' => 40, 'th_req' => 12],
            13 => ['cost' => 14000000, 'res_type' => RES_ELIXIR, 'time' => 777600, 'dps' => 43, 'th_req' => 13],
        ]
    ],
    'goblin' => [
        'name' => 'Гоблин',
        'type' => TYPE_TROOP,
        'housing_space' => 1,
        'training_time' => 7,
        'levels' => [
            1  => ['cost' => 5000, 'res_type' => RES_ELIXIR, 'time' => 1800, 'dps' => 11, 'th_req' => 2], // Unlocked at Barracks L4
            2  => ['cost' => 45000, 'res_type' => RES_ELIXIR, 'time' => 7200, 'dps' => 14, 'th_req' => 3],
            3  => ['cost' => 100000, 'res_type' => RES_ELIXIR, 'time' => 10800, 'dps' => 19, 'th_req' => 4],
            4  => ['cost' => 500000, 'res_type' => RES_ELIXIR, 'time' => 21600, 'dps' => 24, 'th_req' => 5],
            5  => ['cost' => 700000, 'res_type' => RES_ELIXIR, 'time' => 43200, 'dps' => 32, 'th_req' => 6],
            6  => ['cost' => 1600000, 'res_type' => RES_ELIXIR, 'time' => 86400, 'dps' => 42, 'th_req' => 7],
            7  => ['cost' => 2200000, 'res_type' => RES_ELIXIR, 'time' => 129600, 'dps' => 52, 'th_req' => 9],
            8  => ['cost' => 3700000, 'res_type' => RES_ELIXIR, 'time' => 194400, 'dps' => 62, 'th_req' => 10],
            9  => ['cost' => 8000000, 'res_type' => RES_ELIXIR, 'time' => 432000, 'dps' => 72, 'th_req' => 11],
        ]
    ],
    'giant' => [
        'name' => 'Гигант',
        'type' => TYPE_TROOP,
        'housing_space' => 5,
        'training_time' => 30,
        'levels' => [
            1  => ['cost' => 2500, 'res_type' => RES_ELIXIR, 'time' => 120, 'dps' => 12, 'th_req' => 2], // Unlocked at Barracks L3
            2  => ['cost' => 40000, 'res_type' => RES_ELIXIR, 'time' => 7200, 'dps' => 15, 'th_req' => 3],
            3  => ['cost' => 150000, 'res_type' => RES_ELIXIR, 'time' => 14400, 'dps' => 20, 'th_req' => 4],
            4  => ['cost' => 400000, 'res_type' => RES_ELIXIR, 'time' => 21600, 'dps' => 24, 'th_req' => 5],
            5  => ['cost' => 800000, 'res_type' => RES_ELIXIR, 'time' => 43200, 'dps' => 31, 'th_req' => 6],
            6  => ['cost' => 1500000, 'res_type' => RES_ELIXIR, 'time' => 86400, 'dps' => 43, 'th_req' => 7],
            7  => ['cost' => 2300000, 'res_type' => RES_ELIXIR, 'time' => 129600, 'dps' => 55, 'th_req' => 8],
            8  => ['cost' => 2600000, 'res_type' => RES_ELIXIR, 'time' => 172800, 'dps' => 62, 'th_req' => 9],
            9  => ['cost' => 3400000, 'res_type' => RES_ELIXIR, 'time' => 194400, 'dps' => 70, 'th_req' => 10],
            10 => ['cost' => 5000000, 'res_type' => RES_ELIXIR, 'time' => 259200, 'dps' => 78, 'th_req' => 11],
            11 => ['cost' => 7500000, 'res_type' => RES_ELIXIR, 'time' => 345600, 'dps' => 86, 'th_req' => 12],
            12 => ['cost' => 10000000, 'res_type' => RES_ELIXIR, 'time' => 475200, 'dps' => 94, 'th_req' => 13],
            13 => ['cost' => 15000000, 'res_type' => RES_ELIXIR, 'time' => 820800, 'dps' => 104, 'th_req' => 14],
            14 => ['cost' => 25000000, 'res_type' => RES_ELIXIR, 'time' => 1166400, 'dps' => 114, 'th_req' => 15],
        ]
    ],
    'wall_breaker' => [
        'name' => 'Стенобой',
        'type' => TYPE_TROOP,
        'housing_space' => 2,
        'training_time' => 15,
        'levels' => [
            1  => ['cost' => 20000, 'res_type' => RES_ELIXIR, 'time' => 7200, 'dps' => 10, 'th_req' => 3], // Unlocked at Barracks L5
            2  => ['cost' => 80000, 'res_type' => RES_ELIXIR, 'time' => 10800, 'dps' => 20, 'th_req' => 4],
            3  => ['cost' => 200000, 'res_type' => RES_ELIXIR, 'time' => 14400, 'dps' => 25, 'th_req' => 5],
            4  => ['cost' => 450000, 'res_type' => RES_ELIXIR, 'time' => 43200, 'dps' => 30, 'th_req' => 6],
            5  => ['cost' => 1000000, 'res_type' => RES_ELIXIR, 'time' => 57600, 'dps' => 43, 'th_req' => 7],
            6  => ['cost' => 2400000, 'res_type' => RES_ELIXIR, 'time' => 108000, 'dps' => 55, 'th_req' => 8],
            7  => ['cost' => 2800000, 'res_type' => RES_ELIXIR, 'time' => 129600, 'dps' => 66, 'th_req' => 9],
            8  => ['cost' => 3800000, 'res_type' => RES_ELIXIR, 'time' => 216000, 'dps' => 75, 'th_req' => 10],
            9  => ['cost' => 5200000, 'res_type' => RES_ELIXIR, 'time' => 259200, 'dps' => 86, 'th_req' => 11],
            10 => ['cost' => 6500000, 'res_type' => RES_ELIXIR, 'time' => 432000, 'dps' => 94, 'th_req' => 12],
            11 => ['cost' => 9500000, 'res_type' => RES_ELIXIR, 'time' => 475200, 'dps' => 102, 'th_req' => 13],
            12 => ['cost' => 11000000, 'res_type' => RES_ELIXIR, 'time' => 518400, 'dps' => 110, 'th_req' => 14],
            13 => ['cost' => 15500000, 'res_type' => RES_ELIXIR, 'time' => 864000, 'dps' => 118, 'th_req' => 15],
            14 => ['cost' => 26000000, 'res_type' => RES_ELIXIR, 'time' => 1209600, 'dps' => 126, 'th_req' => 16],
        ]
    ],
    'balloon' => [
        'name' => 'Воздушный шар',
        'type' => TYPE_TROOP,
        'housing_space' => 5,
        'training_time' => 30,
        'levels' => [
            1  => ['cost' => 120000, 'res_type' => RES_ELIXIR, 'time' => 14400, 'dps' => 25, 'th_req' => 4], // Unlocked at Barracks L6
            2  => ['cost' => 100000, 'res_type' => RES_ELIXIR, 'time' => 14400, 'dps' => 32, 'th_req' => 4],
            3  => ['cost' => 400000, 'res_type' => RES_ELIXIR, 'time' => 21600, 'dps' => 48, 'th_req' => 5],
            4  => ['cost' => 720000, 'res_type' => RES_ELIXIR, 'time' => 64800, 'dps' => 72, 'th_req' => 6],
            5  => ['cost' => 1300000, 'res_type' => RES_ELIXIR, 'time' => 86400, 'dps' => 108, 'th_req' => 7],
            6  => ['cost' => 2750000, 'res_type' => RES_ELIXIR, 'time' => 259200, 'dps' => 162, 'th_req' => 8],
            7  => ['cost' => 4400000, 'res_type' => RES_ELIXIR, 'time' => 280800, 'dps' => 198, 'th_req' => 9],
            8  => ['cost' => 5000000, 'res_type' => RES_ELIXIR, 'time' => 302400, 'dps' => 236, 'th_req' => 10],
            9  => ['cost' => 7000000, 'res_type' => RES_ELIXIR, 'time' => 388800, 'dps' => 256, 'th_req' => 11],
            10 => ['cost' => 10000000, 'res_type' => RES_ELIXIR, 'time' => 604800, 'dps' => 276, 'th_req' => 12],
            11 => ['cost' => 14000000, 'res_type' => RES_ELIXIR, 'time' => 734400, 'dps' => 290, 'th_req' => 13],
            12 => ['cost' => 17500000, 'res_type' => RES_ELIXIR, 'time' => 950400, 'dps' => 304, 'th_req' => 14],
        ]
    ],
    'wizard' => [
        'name' => 'Колдун',
        'type' => TYPE_TROOP,
        'housing_space' => 4,
        'training_time' => 30,
        'levels' => [
            1  => ['cost' => 270000, 'res_type' => RES_ELIXIR, 'time' => 21600, 'dps' => 50, 'th_req' => 5], // Unlocked at Barracks L7
            2  => ['cost' => 120000, 'res_type' => RES_ELIXIR, 'time' => 14400, 'dps' => 70, 'th_req' => 5],
            3  => ['cost' => 300000, 'res_type' => RES_ELIXIR, 'time' => 18000, 'dps' => 90, 'th_req' => 6],
            4  => ['cost' => 600000, 'res_type' => RES_ELIXIR, 'time' => 43200, 'dps' => 125, 'th_req' => 7],
            5  => ['cost' => 1200000, 'res_type' => RES_ELIXIR, 'time' => 64800, 'dps' => 170, 'th_req' => 8],
            6  => ['cost' => 2000000, 'res_type' => RES_ELIXIR, 'time' => 129600, 'dps' => 185, 'th_req' => 9],
            7  => ['cost' => 2500000, 'res_type' => RES_ELIXIR, 'time' => 172800, 'dps' => 200, 'th_req' => 10],
            8  => ['cost' => 3100000, 'res_type' => RES_ELIXIR, 'time' => 194400, 'dps' => 215, 'th_req' => 11],
            9  => ['cost' => 4000000, 'res_type' => RES_ELIXIR, 'time' => 216000, 'dps' => 230, 'th_req' => 12],
            10 => ['cost' => 5500000, 'res_type' => RES_ELIXIR, 'time' => 302400, 'dps' => 245, 'th_req' => 13],
            11 => ['cost' => 10000000, 'res_type' => RES_ELIXIR, 'time' => 475200, 'dps' => 260, 'th_req' => 14],
            12 => ['cost' => 11500000, 'res_type' => RES_ELIXIR, 'time' => 604800, 'dps' => 275, 'th_req' => 15],
            13 => ['cost' => 16000000, 'res_type' => RES_ELIXIR, 'time' => 907200, 'dps' => 290, 'th_req' => 16],
            14 => ['cost' => 27000000, 'res_type' => RES_ELIXIR, 'time' => 1209600, 'dps' => 310, 'th_req' => 17],
        ]
    ],
    'healer' => [
        'name' => 'Целительница',
        'type' => TYPE_TROOP,
        'housing_space' => 14,
        'training_time' => 120,
        'levels' => [
            1  => ['cost' => 600000, 'res_type' => RES_ELIXIR, 'time' => 43200, 'dps' => 0, 'th_req' => 6], // Unlocked at Barracks L8
            2  => ['cost' => 450000, 'res_type' => RES_ELIXIR, 'time' => 43200, 'dps' => 0, 'th_req' => 6],
            3  => ['cost' => 900000, 'res_type' => RES_ELIXIR, 'time' => 86400, 'dps' => 0, 'th_req' => 7],
            4  => ['cost' => 2500000, 'res_type' => RES_ELIXIR, 'time' => 172800, 'dps' => 0, 'th_req' => 8],
            5  => ['cost' => 4000000, 'res_type' => RES_ELIXIR, 'time' => 259200, 'dps' => 0, 'th_req' => 9],
            6  => ['cost' => 6000000, 'res_type' => RES_ELIXIR, 'time' => 388800, 'dps' => 0, 'th_req' => 10],
            7  => ['cost' => 9500000, 'res_type' => RES_ELIXIR, 'time' => 561600, 'dps' => 0, 'th_req' => 11],
            8  => ['cost' => 11000000, 'res_type' => RES_ELIXIR, 'time' => 604800, 'dps' => 0, 'th_req' => 12],
            9  => ['cost' => 13000000, 'res_type' => RES_ELIXIR, 'time' => 626400, 'dps' => 0, 'th_req' => 13],
            10 => ['cost' => 17000000, 'res_type' => RES_ELIXIR, 'time' => 950400, 'dps' => 0, 'th_req' => 14],
            11 => ['cost' => 28500000, 'res_type' => RES_ELIXIR, 'time' => 1296000, 'dps' => 0, 'th_req' => 15],
        ]
    ],
    'dragon' => [
        'name' => 'Дракон',
        'type' => TYPE_TROOP,
        'housing_space' => 20,
        'training_time' => 170,
        'levels' => [
            1  => ['cost' => 1000000, 'res_type' => RES_ELIXIR, 'time' => 86400, 'dps' => 140, 'th_req' => 7], // Unlocked at Barracks L9
            2  => ['cost' => 1000000, 'res_type' => RES_ELIXIR, 'time' => 64800, 'dps' => 160, 'th_req' => 7],
            3  => ['cost' => 2000000, 'res_type' => RES_ELIXIR, 'time' => 129600, 'dps' => 180, 'th_req' => 8],
            4  => ['cost' => 3000000, 'res_type' => RES_ELIXIR, 'time' => 259200, 'dps' => 210, 'th_req' => 9],
            5  => ['cost' => 3800000, 'res_type' => RES_ELIXIR, 'time' => 302400, 'dps' => 240, 'th_req' => 9],
            6  => ['cost' => 4900000, 'res_type' => RES_ELIXIR, 'time' => 345600, 'dps' => 270, 'th_req' => 10],
            7  => ['cost' => 5000000, 'res_type' => RES_ELIXIR, 'time' => 388800, 'dps' => 310, 'th_req' => 11],
            8  => ['cost' => 7500000, 'res_type' => RES_ELIXIR, 'time' => 432000, 'dps' => 330, 'th_req' => 12],
            9  => ['cost' => 10500000, 'res_type' => RES_ELIXIR, 'time' => 604800, 'dps' => 350, 'th_req' => 13],
            10 => ['cost' => 12000000, 'res_type' => RES_ELIXIR, 'time' => 648000, 'dps' => 370, 'th_req' => 14],
            11 => ['cost' => 14000000, 'res_type' => RES_ELIXIR, 'time' => 734400, 'dps' => 390, 'th_req' => 15],
            12 => ['cost' => 18500000, 'res_type' => RES_ELIXIR, 'time' => 864000, 'dps' => 410, 'th_req' => 16],
        ]
    ],
    'pekka' => [
        'name' => 'П.Е.К.К.А',
        'type' => TYPE_TROOP,
        'housing_space' => 25,
        'training_time' => 180,
        'levels' => [
            1  => ['cost' => 1400000, 'res_type' => RES_ELIXIR, 'time' => 129600, 'dps' => 260, 'th_req' => 8], // Unlocked at Barracks L10
            2  => ['cost' => 600000, 'res_type' => RES_ELIXIR, 'time' => 43200, 'dps' => 290, 'th_req' => 8],
            3  => ['cost' => 1300000, 'res_type' => RES_ELIXIR, 'time' => 86400, 'dps' => 320, 'th_req' => 9],
            4  => ['cost' => 2000000, 'res_type' => RES_ELIXIR, 'time' => 129600, 'dps' => 360, 'th_req' => 9],
            5  => ['cost' => 2100000, 'res_type' => RES_ELIXIR, 'time' => 144000, 'dps' => 410, 'th_req' => 10],
            6  => ['cost' => 2500000, 'res_type' => RES_ELIXIR, 'time' => 172800, 'dps' => 470, 'th_req' => 11],
            7  => ['cost' => 4500000, 'res_type' => RES_ELIXIR, 'time' => 259200, 'dps' => 540, 'th_req' => 12],
            8  => ['cost' => 5000000, 'res_type' => RES_ELIXIR, 'time' => 302400, 'dps' => 610, 'th_req' => 12],
            9  => ['cost' => 5800000, 'res_type' => RES_ELIXIR, 'time' => 345600, 'dps' => 680, 'th_req' => 13],
            10 => ['cost' => 10500000, 'res_type' => RES_ELIXIR, 'time' => 475200, 'dps' => 750, 'th_req' => 14],
            11 => ['cost' => 12000000, 'res_type' => RES_ELIXIR, 'time' => 604800, 'dps' => 810, 'th_req' => 15],
            12 => ['cost' => 16000000, 'res_type' => RES_ELIXIR, 'time' => 864000, 'dps' => 870, 'th_req' => 16],
            13 => ['cost' => 28000000, 'res_type' => RES_ELIXIR, 'time' => 1252800, 'dps' => 940, 'th_req' => 17],
        ]
    ],
    'baby_dragon' => [
        'name' => 'Дракончик',
        'type' => TYPE_TROOP,
        'housing_space' => 10,
        'training_time' => 85,
        'levels' => [
            1  => ['cost' => 2600000, 'res_type' => RES_ELIXIR, 'time' => 172800, 'dps' => 75, 'th_req' => 9], // Unlocked at Barracks L11
            2  => ['cost' => 1500000, 'res_type' => RES_ELIXIR, 'time' => 108000, 'dps' => 85, 'th_req' => 9],
            3  => ['cost' => 2000000, 'res_type' => RES_ELIXIR, 'time' => 129600, 'dps' => 95, 'th_req' => 10],
            4  => ['cost' => 2800000, 'res_type' => RES_ELIXIR, 'time' => 172800, 'dps' => 105, 'th_req' => 10],
            5  => ['cost' => 3700000, 'res_type' => RES_ELIXIR, 'time' => 237600, 'dps' => 115, 'th_req' => 11],
            6  => ['cost' => 4800000, 'res_type' => RES_ELIXIR, 'time' => 259200, 'dps' => 125, 'th_req' => 12],
            7  => ['cost' => 6200000, 'res_type' => RES_ELIXIR, 'time' => 345600, 'dps' => 135, 'th_req' => 12],
            8  => ['cost' => 9500000, 'res_type' => RES_ELIXIR, 'time' => 518400, 'dps' => 145, 'th_req' => 13],
            9  => ['cost' => 11000000, 'res_type' => RES_ELIXIR, 'time' => 604800, 'dps' => 155, 'th_req' => 14],
            10 => ['cost' => 13500000, 'res_type' => RES_ELIXIR, 'time' => 626400, 'dps' => 165, 'th_req' => 15],
            11 => ['cost' => 16500000, 'res_type' => RES_ELIXIR, 'time' => 864000, 'dps' => 175, 'th_req' => 16],
        ]
    ],
    'miner' => [
        'name' => 'Шахтер',
        'type' => TYPE_TROOP,
        'housing_space' => 6,
        'training_time' => 30,
        'levels' => [
            1  => ['cost' => 3700000, 'res_type' => RES_ELIXIR, 'time' => 345600, 'dps' => 80, 'th_req' => 10], // Unlocked at Barracks L12
            2  => ['cost' => 1500000, 'res_type' => RES_ELIXIR, 'time' => 86400, 'dps' => 88, 'th_req' => 10],
            3  => ['cost' => 2600000, 'res_type' => RES_ELIXIR, 'time' => 172800, 'dps' => 96, 'th_req' => 10],
            4  => ['cost' => 3000000, 'res_type' => RES_ELIXIR, 'time' => 194400, 'dps' => 104, 'th_req' => 11],
            5  => ['cost' => 4000000, 'res_type' => RES_ELIXIR, 'time' => 216000, 'dps' => 112, 'th_req' => 11],
            6  => ['cost' => 4800000, 'res_type' => RES_ELIXIR, 'time' => 259200, 'dps' => 120, 'th_req' => 12],
            7  => ['cost' => 6000000, 'res_type' => RES_ELIXIR, 'time' => 345600, 'dps' => 128, 'th_req' => 12],
            8  => ['cost' => 8600000, 'res_type' => RES_ELIXIR, 'time' => 518400, 'dps' => 136, 'th_req' => 13],
            9  => ['cost' => 10500000, 'res_type' => RES_ELIXIR, 'time' => 561600, 'dps' => 144, 'th_req' => 14],
            10 => ['cost' => 12500000, 'res_type' => RES_ELIXIR, 'time' => 604800, 'dps' => 160, 'th_req' => 15],
            11 => ['cost' => 16500000, 'res_type' => RES_ELIXIR, 'time' => 849600, 'dps' => 175, 'th_req' => 16],
            12 => ['cost' => 28000000, 'res_type' => RES_ELIXIR, 'time' => 1252800, 'dps' => 195, 'th_req' => 17],
        ]
    ],
    'electro_dragon' => [
        'name' => 'Электродракон',
        'type' => TYPE_TROOP,
        'housing_space' => 30,
        'training_time' => 260,
        'levels' => [
            1  => ['cost' => 6000000, 'res_type' => RES_ELIXIR, 'time' => 432000, 'dps' => 240, 'th_req' => 11], // Unlocked at Barracks L13
            2  => ['cost' => 6000000, 'res_type' => RES_ELIXIR, 'time' => 345600, 'dps' => 270, 'th_req' => 11],
            3  => ['cost' => 7000000, 'res_type' => RES_ELIXIR, 'time' => 388800, 'dps' => 300, 'th_req' => 12],
            4  => ['cost' => 9000000, 'res_type' => RES_ELIXIR, 'time' => 604800, 'dps' => 330, 'th_req' => 12],
            5  => ['cost' => 11000000, 'res_type' => RES_ELIXIR, 'time' => 691200, 'dps' => 360, 'th_req' => 13],
            6  => ['cost' => 14000000, 'res_type' => RES_ELIXIR, 'time' => 734400, 'dps' => 390, 'th_req' => 14],
            7  => ['cost' => 16000000, 'res_type' => RES_ELIXIR, 'time' => 777600, 'dps' => 420, 'th_req' => 15],
            8  => ['cost' => 20000000, 'res_type' => RES_ELIXIR, 'time' => 864000, 'dps' => 450, 'th_req' => 16],
            9  => ['cost' => 30000000, 'res_type' => RES_ELIXIR, 'time' => 1382400, 'dps' => 490, 'th_req' => 17],
        ]
    ],
    'yeti' => [
        'name' => 'Йети',
        'type' => TYPE_TROOP,
        'housing_space' => 18,
        'training_time' => 150,
        'levels' => [
            1  => ['cost' => 7000000, 'res_type' => RES_ELIXIR, 'time' => 518400, 'dps' => 230, 'th_req' => 12], // Unlocked at Barracks L14
            2  => ['cost' => 5000000, 'res_type' => RES_ELIXIR, 'time' => 259200, 'dps' => 250, 'th_req' => 12],
            3  => ['cost' => 6500000, 'res_type' => RES_ELIXIR, 'time' => 388800, 'dps' => 270, 'th_req' => 13],
            4  => ['cost' => 10000000, 'res_type' => RES_ELIXIR, 'time' => 604800, 'dps' => 290, 'th_req' => 14],
            5  => ['cost' => 12000000, 'res_type' => RES_ELIXIR, 'time' => 648000, 'dps' => 310, 'th_req' => 15],
            6  => ['cost' => 14500000, 'res_type' => RES_ELIXIR, 'time' => 712800, 'dps' => 330, 'th_req' => 16],
            7  => ['cost' => 17000000, 'res_type' => RES_ELIXIR, 'time' => 864000, 'dps' => 350, 'th_req' => 17],
        ]
    ],
    'dragon_rider' => [
        'name' => 'Драконий всадник',
        'type' => TYPE_TROOP,
        'housing_space' => 25,
        'training_time' => 210,
        'levels' => [
            1  => ['cost' => 9000000, 'res_type' => RES_ELIXIR, 'time' => 604800, 'dps' => 340, 'th_req' => 13], // Unlocked at Barracks L15
            2  => ['cost' => 7500000, 'res_type' => RES_ELIXIR, 'time' => 518400, 'dps' => 370, 'th_req' => 14],
            3  => ['cost' => 12000000, 'res_type' => RES_ELIXIR, 'time' => 691200, 'dps' => 400, 'th_req' => 15],
            4  => ['cost' => 14500000, 'res_type' => RES_ELIXIR, 'time' => 777600, 'dps' => 430, 'th_req' => 15],
            5  => ['cost' => 19000000, 'res_type' => RES_ELIXIR, 'time' => 885600, 'dps' => 470, 'th_req' => 16],
            6  => ['cost' => 29500000, 'res_type' => RES_ELIXIR, 'time' => 1339200, 'dps' => 520, 'th_req' => 17],
        ]
    ],
    'electro_titan' => [
        'name' => 'Электротитанида',
        'type' => TYPE_TROOP,
        'housing_space' => 32,
        'training_time' => 270,
        'levels' => [
            1  => ['cost' => 11000000, 'res_type' => RES_ELIXIR, 'time' => 648000, 'dps' => 180, 'th_req' => 14], // Unlocked at Barracks L16
            2  => ['cost' => 14000000, 'res_type' => RES_ELIXIR, 'time' => 777600, 'dps' => 200, 'th_req' => 15],
            3  => ['cost' => 16000000, 'res_type' => RES_ELIXIR, 'time' => 820800, 'dps' => 220, 'th_req' => 16],
            4  => ['cost' => 18500000, 'res_type' => RES_ELIXIR, 'time' => 950400, 'dps' => 240, 'th_req' => 17],
        ]
    ],
    'root_rider' => [
        'name' => 'Корневая наездница',
        'type' => TYPE_TROOP,
        'housing_space' => 20,
        'training_time' => 170,
        'levels' => [
            1  => ['cost' => 12600000, 'res_type' => RES_ELIXIR, 'time' => 691200, 'dps' => 95, 'th_req' => 15], // Unlocked at Barracks L17
            2  => ['cost' => 15000000, 'res_type' => RES_ELIXIR, 'time' => 691200, 'dps' => 105, 'th_req' => 16],
            3  => ['cost' => 17600000, 'res_type' => RES_ELIXIR, 'time' => 864000, 'dps' => 115, 'th_req' => 17],
        ]
    ],
    'thrower' => [
        'name' => 'Метатель',
        'type' => TYPE_TROOP,
        'housing_space' => 16,
        'training_time' => 140,
        'levels' => [
            1  => ['cost' => 15000000, 'res_type' => RES_ELIXIR, 'time' => 777600, 'dps' => 190, 'th_req' => 16], // Unlocked at Barracks L18
            2  => ['cost' => 16000000, 'res_type' => RES_ELIXIR, 'time' => 820800, 'dps' => 200, 'th_req' => 16],
            3  => ['cost' => 18000000, 'res_type' => RES_ELIXIR, 'time' => 907200, 'dps' => 220, 'th_req' => 17],
            4  => ['cost' => 27000000, 'res_type' => RES_ELIXIR, 'time' => 1296000, 'dps' => 240, 'th_req' => 18],
        ]
    ],
	'meteor_golem' => [
        'name' => 'Метеорный голем',
        'type' => TYPE_TROOP,
        'housing_space' => 40,
        'training_time' => 1, // 1s from JSON
        'levels' => [
            1  => ['cost' => 26000000, 'res_type' => RES_ELIXIR, 'time' => 1209600, 'dps' => 550, 'th_req' => 17], // Unlocked at Barracks L19
            2  => ['cost' => 28000000, 'res_type' => RES_ELIXIR, 'time' => 1209600, 'dps' => 600, 'th_req' => 18],
            3  => ['cost' => 30000000, 'res_type' => RES_ELIXIR, 'time' => 1382400, 'dps' => 650, 'th_req' => 18],
        ]
    ],

    // ============================================================
    // 8. ТЕМНЫЕ ВОЙСКА (Dark Elixir Troops)
    // ДАННЫЕ ОБНОВЛЕНЫ НА ОСНОВЕ raw.json
    // ============================================================
    'minion' => [
        'name' => 'Миньон',
        'type' => TYPE_DARK_TROOP,
        'housing_space' => 2,
        'training_time' => 16,
        'levels' => [
            1  => ['cost' => 200000, 'res_type' => RES_ELIXIR, 'time' => 28800, 'dps' => 38, 'th_req' => 7], // Unlocked at Dark Barracks L1
            2  => ['cost' => 1000, 'res_type' => RES_DARK, 'time' => 21600, 'dps' => 41, 'th_req' => 7],
            3  => ['cost' => 2500, 'res_type' => RES_DARK, 'time' => 28800, 'dps' => 44, 'th_req' => 7],
            4  => ['cost' => 5000, 'res_type' => RES_DARK, 'time' => 43200, 'dps' => 47, 'th_req' => 8],
            5  => ['cost' => 10000, 'res_type' => RES_DARK, 'time' => 86400, 'dps' => 50, 'th_req' => 9],
            6  => ['cost' => 15000, 'res_type' => RES_DARK, 'time' => 129600, 'dps' => 54, 'th_req' => 10],
            7  => ['cost' => 31500, 'res_type' => RES_DARK, 'time' => 151200, 'dps' => 58, 'th_req' => 11],
            8  => ['cost' => 47500, 'res_type' => RES_DARK, 'time' => 172800, 'dps' => 62, 'th_req' => 12],
            9  => ['cost' => 75000, 'res_type' => RES_DARK, 'time' => 259200, 'dps' => 66, 'th_req' => 13],
            10 => ['cost' => 100000, 'res_type' => RES_DARK, 'time' => 345600, 'dps' => 70, 'th_req' => 14],
            11 => ['cost' => 115000, 'res_type' => RES_DARK, 'time' => 388800, 'dps' => 74, 'th_req' => 15],
            12 => ['cost' => 160000, 'res_type' => RES_DARK, 'time' => 518400, 'dps' => 78, 'th_req' => 16],
            13 => ['cost' => 220000, 'res_type' => RES_DARK, 'time' => 777600, 'dps' => 84, 'th_req' => 17],
            14 => ['cost' => 335000, 'res_type' => RES_DARK, 'time' => 1209600, 'dps' => 92, 'th_req' => 18],
        ]
    ],
    'hog_rider' => [
        'name' => 'Всадник на кабане',
        'type' => TYPE_DARK_TROOP,
        'housing_space' => 5,
        'training_time' => 42,
        'levels' => [
            1  => ['cost' => 600000, 'res_type' => RES_ELIXIR, 'time' => 86400, 'dps' => 60, 'th_req' => 7], // Unlocked at Dark Barracks L2
            2  => ['cost' => 2000, 'res_type' => RES_DARK, 'time' => 36000, 'dps' => 70, 'th_req' => 7],
            3  => ['cost' => 3500, 'res_type' => RES_DARK, 'time' => 64800, 'dps' => 80, 'th_req' => 8],
            4  => ['cost' => 5000, 'res_type' => RES_DARK, 'time' => 86400, 'dps' => 92, 'th_req' => 9],
            5  => ['cost' => 10000, 'res_type' => RES_DARK, 'time' => 172800, 'dps' => 105, 'th_req' => 10],
            6  => ['cost' => 18500, 'res_type' => RES_DARK, 'time' => 194400, 'dps' => 118, 'th_req' => 11],
            7  => ['cost' => 35000, 'res_type' => RES_DARK, 'time' => 216000, 'dps' => 140, 'th_req' => 12],
            8  => ['cost' => 47500, 'res_type' => RES_DARK, 'time' => 259200, 'dps' => 155, 'th_req' => 13],
            9  => ['cost' => 50000, 'res_type' => RES_DARK, 'time' => 302400, 'dps' => 165, 'th_req' => 14],
            10 => ['cost' => 85000, 'res_type' => RES_DARK, 'time' => 345600, 'dps' => 176, 'th_req' => 14],
            11 => ['cost' => 107500, 'res_type' => RES_DARK, 'time' => 432000, 'dps' => 187, 'th_req' => 15],
            12 => ['cost' => 125000, 'res_type' => RES_DARK, 'time' => 475200, 'dps' => 200, 'th_req' => 16],
            13 => ['cost' => 175000, 'res_type' => RES_DARK, 'time' => 561600, 'dps' => 213, 'th_req' => 17],
            14 => ['cost' => 240000, 'res_type' => RES_DARK, 'time' => 864000, 'dps' => 225, 'th_req' => 18],
        ]
    ],
    'valkyrie' => [
        'name' => 'Валькирия',
        'type' => TYPE_DARK_TROOP,
        'housing_space' => 8,
        'training_time' => 70,
        'levels' => [
            1  => ['cost' => 1000000, 'res_type' => RES_ELIXIR, 'time' => 129600, 'dps' => 94, 'th_req' => 8], // Unlocked at Dark Barracks L3
            2  => ['cost' => 3000, 'res_type' => RES_DARK, 'time' => 28800, 'dps' => 106, 'th_req' => 8],
            3  => ['cost' => 5000, 'res_type' => RES_DARK, 'time' => 86400, 'dps' => 119, 'th_req' => 9],
            4  => ['cost' => 10000, 'res_type' => RES_DARK, 'time' => 129600, 'dps' => 133, 'th_req' => 9],
            5  => ['cost' => 16000, 'res_type' => RES_DARK, 'time' => 151200, 'dps' => 148, 'th_req' => 10],
            6  => ['cost' => 31500, 'res_type' => RES_DARK, 'time' => 172800, 'dps' => 167, 'th_req' => 11],
            7  => ['cost' => 55000, 'res_type' => RES_DARK, 'time' => 194400, 'dps' => 185, 'th_req' => 12],
            8  => ['cost' => 77500, 'res_type' => RES_DARK, 'time' => 259200, 'dps' => 196, 'th_req' => 13],
            9  => ['cost' => 105000, 'res_type' => RES_DARK, 'time' => 388800, 'dps' => 208, 'th_req' => 14],
            10 => ['cost' => 120000, 'res_type' => RES_DARK, 'time' => 432000, 'dps' => 223, 'th_req' => 15],
            11 => ['cost' => 170000, 'res_type' => RES_DARK, 'time' => 518400, 'dps' => 238, 'th_req' => 16],
        ]
    ],
    'golem' => [
        'name' => 'Голем',
        'type' => TYPE_DARK_TROOP,
        'housing_space' => 30,
        'training_time' => 260,
        'levels' => [
            1  => ['cost' => 1600000, 'res_type' => RES_ELIXIR, 'time' => 172800, 'dps' => 35, 'th_req' => 8], // Unlocked at Dark Barracks L4
            2  => ['cost' => 4000, 'res_type' => RES_DARK, 'time' => 57600, 'dps' => 40, 'th_req' => 8],
            3  => ['cost' => 6000, 'res_type' => RES_DARK, 'time' => 129600, 'dps' => 45, 'th_req' => 9],
            4  => ['cost' => 10000, 'res_type' => RES_DARK, 'time' => 172800, 'dps' => 50, 'th_req' => 9],
            5  => ['cost' => 18500, 'res_type' => RES_DARK, 'time' => 194400, 'dps' => 55, 'th_req' => 10],
            6  => ['cost' => 26500, 'res_type' => RES_DARK, 'time' => 216000, 'dps' => 60, 'th_req' => 11],
            7  => ['cost' => 38500, 'res_type' => RES_DARK, 'time' => 237600, 'dps' => 65, 'th_req' => 12],
            8  => ['cost' => 50000, 'res_type' => RES_DARK, 'time' => 259200, 'dps' => 70, 'th_req' => 13],
            9  => ['cost' => 62500, 'res_type' => RES_DARK, 'time' => 302400, 'dps' => 75, 'th_req' => 14],
            10 => ['cost' => 80000, 'res_type' => RES_DARK, 'time' => 345600, 'dps' => 80, 'th_req' => 15],
            11 => ['cost' => 105000, 'res_type' => RES_DARK, 'time' => 432000, 'dps' => 85, 'th_req' => 16],
            12 => ['cost' => 122500, 'res_type' => RES_DARK, 'time' => 475200, 'dps' => 90, 'th_req' => 17],
            13 => ['cost' => 175000, 'res_type' => RES_DARK, 'time' => 554400, 'dps' => 95, 'th_req' => 17],
            14 => ['cost' => 230000, 'res_type' => RES_DARK, 'time' => 864000, 'dps' => 100, 'th_req' => 18],
        ]
    ],
    'witch' => [
        'name' => 'Ведьма',
        'type' => TYPE_DARK_TROOP,
        'housing_space' => 12,
        'training_time' => 100,
        'levels' => [
            1  => ['cost' => 2200000, 'res_type' => RES_ELIXIR, 'time' => 216000, 'dps' => 100, 'th_req' => 9], // Unlocked at Dark Barracks L5
            2  => ['cost' => 20000, 'res_type' => RES_DARK, 'time' => 172800, 'dps' => 110, 'th_req' => 9],
            3  => ['cost' => 29000, 'res_type' => RES_DARK, 'time' => 259200, 'dps' => 140, 'th_req' => 10],
            4  => ['cost' => 45000, 'res_type' => RES_DARK, 'time' => 302400, 'dps' => 165, 'th_req' => 11],
            5  => ['cost' => 62500, 'res_type' => RES_DARK, 'time' => 345600, 'dps' => 185, 'th_req' => 12],
            6  => ['cost' => 150000, 'res_type' => RES_DARK, 'time' => 475200, 'dps' => 200, 'th_req' => 13],
            7  => ['cost' => 180000, 'res_type' => RES_DARK, 'time' => 626400, 'dps' => 220, 'th_req' => 14],
        ]
    ],
    'lava_hound' => [
        'name' => 'Адская гончая',
        'type' => TYPE_DARK_TROOP,
        'housing_space' => 30,
        'training_time' => 260,
        'levels' => [
            1  => ['cost' => 2900000, 'res_type' => RES_ELIXIR, 'time' => 259200, 'dps' => 10, 'th_req' => 9], // Unlocked at Dark Barracks L6
            2  => ['cost' => 14000, 'res_type' => RES_DARK, 'time' => 172800, 'dps' => 12, 'th_req' => 9],
            3  => ['cost' => 21500, 'res_type' => RES_DARK, 'time' => 216000, 'dps' => 14, 'th_req' => 10],
            4  => ['cost' => 42500, 'res_type' => RES_DARK, 'time' => 259200, 'dps' => 16, 'th_req' => 11],
            5  => ['cost' => 60000, 'res_type' => RES_DARK, 'time' => 345600, 'dps' => 18, 'th_req' => 12],
            6  => ['cost' => 80000, 'res_type' => RES_DARK, 'time' => 604800, 'dps' => 20, 'th_req' => 13],
            7  => ['cost' => 200000, 'res_type' => RES_DARK, 'time' => 691200, 'dps' => 22, 'th_req' => 15],
        ]
    ],
    'bowler' => [
        'name' => 'Вышибала',
        'type' => TYPE_DARK_TROOP,
        'housing_space' => 6,
        'training_time' => 50,
        'levels' => [
            1  => ['cost' => 4000000, 'res_type' => RES_ELIXIR, 'time' => 432000, 'dps' => 60, 'th_req' => 10], // Unlocked at Dark Barracks L7
            2  => ['cost' => 32500, 'res_type' => RES_DARK, 'time' => 172800, 'dps' => 72, 'th_req' => 10],
            3  => ['cost' => 44000, 'res_type' => RES_DARK, 'time' => 216000, 'dps' => 84, 'th_req' => 11],
            4  => ['cost' => 62500, 'res_type' => RES_DARK, 'time' => 259200, 'dps' => 96, 'th_req' => 12],
            5  => ['cost' => 85000, 'res_type' => RES_DARK, 'time' => 345600, 'dps' => 102, 'th_req' => 13],
            6  => ['cost' => 110000, 'res_type' => RES_DARK, 'time' => 518400, 'dps' => 108, 'th_req' => 13],
            7  => ['cost' => 145000, 'res_type' => RES_DARK, 'time' => 604800, 'dps' => 114, 'th_req' => 14],
            8  => ['cost' => 175000, 'res_type' => RES_DARK, 'time' => 648000, 'dps' => 126, 'th_req' => 15],
            9  => ['cost' => 260000, 'res_type' => RES_DARK, 'time' => 864000, 'dps' => 140, 'th_req' => 16],
            10 => ['cost' => 360000, 'res_type' => RES_DARK, 'time' => 1296000, 'dps' => 156, 'th_req' => 17],
        ]
    ],
    'ice_golem' => [
        'name' => 'Ледяной голем',
        'type' => TYPE_DARK_TROOP,
        'housing_space' => 15,
        'training_time' => 130,
        'levels' => [
            1  => ['cost' => 7000000, 'res_type' => RES_ELIXIR, 'time' => 518400, 'dps' => 24, 'th_req' => 11], // Unlocked at Dark Barracks L8
            2  => ['cost' => 27500, 'res_type' => RES_DARK, 'time' => 172800, 'dps' => 28, 'th_req' => 11],
            3  => ['cost' => 42500, 'res_type' => RES_DARK, 'time' => 216000, 'dps' => 32, 'th_req' => 12],
            4  => ['cost' => 50000, 'res_type' => RES_DARK, 'time' => 280800, 'dps' => 36, 'th_req' => 13],
            5  => ['cost' => 62500, 'res_type' => RES_DARK, 'time' => 345600, 'dps' => 40, 'th_req' => 14],
            6  => ['cost' => 110000, 'res_type' => RES_DARK, 'time' => 561600, 'dps' => 44, 'th_req' => 15],
            7  => ['cost' => 140000, 'res_type' => RES_DARK, 'time' => 648000, 'dps' => 48, 'th_req' => 16],
            8  => ['cost' => 180000, 'res_type' => RES_DARK, 'time' => 691200, 'dps' => 52, 'th_req' => 17],
            9  => ['cost' => 280000, 'res_type' => RES_DARK, 'time' => 914400, 'dps' => 56, 'th_req' => 18],
        ]
    ],
    'headhunter' => [
        'name' => 'Охотница за головами',
        'type' => TYPE_DARK_TROOP,
        'housing_space' => 6,
        'training_time' => 50,
        'levels' => [
            1 => ['cost' => 7200000, 'res_type' => RES_ELIXIR, 'time' => 604800, 'dps' => 105, 'th_req' => 12], // Unlocked at Dark Barracks L9
            2 => ['cost' => 57500, 'res_type' => RES_DARK, 'time' => 432000, 'dps' => 115, 'th_req' => 13],
            3 => ['cost' => 90000, 'res_type' => RES_DARK, 'time' => 604800, 'dps' => 125, 'th_req' => 14],
        ]
    ],
    'apprentice_warden' => [
        'name' => 'Ученик Хранителя',
        'type' => TYPE_DARK_TROOP,
        'housing_space' => 20,
        'training_time' => 170,
        'levels' => [
            1 => ['cost' => 10000000, 'res_type' => RES_ELIXIR, 'time' => 648000, 'dps' => 170, 'th_req' => 13], // Unlocked at Dark Barracks L10
            2 => ['cost' => 90000, 'res_type' => RES_DARK, 'time' => 518400, 'dps' => 185, 'th_req' => 14],
            3 => ['cost' => 135000, 'res_type' => RES_DARK, 'time' => 648000, 'dps' => 200, 'th_req' => 15],
            4 => ['cost' => 160000, 'res_type' => RES_DARK, 'time' => 691200, 'dps' => 215, 'th_req' => 16],
        ]
    ],
    'druid' => [
        'name' => 'Друид',
        'type' => TYPE_DARK_TROOP,
        'housing_space' => 16,
        'training_time' => 140,
        'levels' => [
            1 => ['cost' => 12000000, 'res_type' => RES_ELIXIR, 'time' => 691200, 'dps' => 0, 'th_req' => 14], // Unlocked at Dark Barracks L11
            2 => ['cost' => 125000, 'res_type' => RES_DARK, 'time' => 777600, 'dps' => 0, 'th_req' => 15],
            3 => ['cost' => 175000, 'res_type' => RES_DARK, 'time' => 820800, 'dps' => 0, 'th_req' => 16],
            4 => ['cost' => 187500, 'res_type' => RES_DARK, 'time' => 950400, 'dps' => 0, 'th_req' => 17],
            5 => ['cost' => 300000, 'res_type' => RES_DARK, 'time' => 1036800, 'dps' => 0, 'th_req' => 18],
        ]
    ],
	'furnace' => [
        'name' => 'Печь',
        'type' => TYPE_DARK_TROOP,
        'housing_space' => 18,
        'training_time' => 150,
        'levels' => [
            1 => ['cost' => 20000000, 'res_type' => RES_ELIXIR, 'time' => 1036800, 'dps' => 1, 'th_req' => 15], // Unlocked at Dark Barracks L12
            2 => ['cost' => 200000, 'res_type' => RES_DARK, 'time' => 1036800, 'dps' => 2, 'th_req' => 16],
            3 => ['cost' => 260000, 'res_type' => RES_DARK, 'time' => 1209600, 'dps' => 3, 'th_req' => 17],
            4 => ['cost' => 320000, 'res_type' => RES_DARK, 'time' => 1382400, 'dps' => 4, 'th_req' => 18],
        ]
    ],

    // ============================================================
    // 9. ЗАКЛИНАНИЯ (Spells)
    // ДАННЫЕ ОБНОВЛЕНЫ НА ОСНОВЕ raw.json
    // ============================================================
    'lightning_spell' => [
        'name' => 'Молния',
        'type' => TYPE_SPELL,
        'housing_space' => 1,
        'levels' => [
            1  => ['cost' => 150000, 'res_type' => RES_ELIXIR, 'time' => 21600, 'dps' => 0, 'th_req' => 5], // Unlocked at Spell Factory L1
            2  => ['cost' => 50000, 'res_type' => RES_ELIXIR, 'time' => 7200, 'dps' => 0, 'th_req' => 5],
            3  => ['cost' => 100000, 'res_type' => RES_ELIXIR, 'time' => 14400, 'dps' => 0, 'th_req' => 6],
            4  => ['cost' => 200000, 'res_type' => RES_ELIXIR, 'time' => 21600, 'dps' => 0, 'th_req' => 7],
            5  => ['cost' => 600000, 'res_type' => RES_ELIXIR, 'time' => 86400, 'dps' => 0, 'th_req' => 8],
            6  => ['cost' => 1500000, 'res_type' => RES_ELIXIR, 'time' => 129600, 'dps' => 0, 'th_req' => 9],
            7  => ['cost' => 2500000, 'res_type' => RES_ELIXIR, 'time' => 259200, 'dps' => 0, 'th_req' => 10],
            8  => ['cost' => 4200000, 'res_type' => RES_ELIXIR, 'time' => 302400, 'dps' => 0, 'th_req' => 11],
            9  => ['cost' => 6300000, 'res_type' => RES_ELIXIR, 'time' => 432000, 'dps' => 0, 'th_req' => 12],
            10 => ['cost' => 10000000, 'res_type' => RES_ELIXIR, 'time' => 518400, 'dps' => 0, 'th_req' => 13],
            11 => ['cost' => 13500000, 'res_type' => RES_ELIXIR, 'time' => 604800, 'dps' => 0, 'th_req' => 14],
            12 => ['cost' => 18500000, 'res_type' => RES_ELIXIR, 'time' => 864000, 'dps' => 0, 'th_req' => 15],
            13 => ['cost' => 27000000, 'res_type' => RES_ELIXIR, 'time' => 1209600, 'dps' => 0, 'th_req' => 16],
        ]
    ],
    'healing_spell' => [
        'name' => 'Исцеляющее заклинание',
        'type' => TYPE_SPELL,
        'housing_space' => 2,
        'levels' => [
            1  => ['cost' => 300000, 'res_type' => RES_ELIXIR, 'time' => 43200, 'dps' => 0, 'th_req' => 6], // Unlocked at Spell Factory L2
            2  => ['cost' => 75000, 'res_type' => RES_ELIXIR, 'time' => 10800, 'dps' => 0, 'th_req' => 6],
            3  => ['cost' => 150000, 'res_type' => RES_ELIXIR, 'time' => 21600, 'dps' => 0, 'th_req' => 7],
            4  => ['cost' => 300000, 'res_type' => RES_ELIXIR, 'time' => 43200, 'dps' => 0, 'th_req' => 7],
            5  => ['cost' => 900000, 'res_type' => RES_ELIXIR, 'time' => 86400, 'dps' => 0, 'th_req' => 8],
            6  => ['cost' => 1800000, 'res_type' => RES_ELIXIR, 'time' => 129600, 'dps' => 0, 'th_req' => 9],
            7  => ['cost' => 3000000, 'res_type' => RES_ELIXIR, 'time' => 259200, 'dps' => 0, 'th_req' => 10],
            8  => ['cost' => 6000000, 'res_type' => RES_ELIXIR, 'time' => 432000, 'dps' => 0, 'th_req' => 11],
            9  => ['cost' => 11000000, 'res_type' => RES_ELIXIR, 'time' => 561600, 'dps' => 0, 'th_req' => 12],
            10 => ['cost' => 14000000, 'res_type' => RES_ELIXIR, 'time' => 604800, 'dps' => 0, 'th_req' => 13],
            11 => ['cost' => 19000000, 'res_type' => RES_ELIXIR, 'time' => 907200, 'dps' => 0, 'th_req' => 14],
            12 => ['cost' => 29000000, 'res_type' => RES_ELIXIR, 'time' => 1296000, 'dps' => 0, 'th_req' => 16],
        ]
    ],
    'rage_spell' => [
        'name' => 'Ярость',
        'type' => TYPE_SPELL,
        'housing_space' => 2,
        'levels' => [
            1  => ['cost' => 600000, 'res_type' => RES_ELIXIR, 'time' => 86400, 'dps' => 0, 'th_req' => 7], // Unlocked at Spell Factory L3
            2  => ['cost' => 400000, 'res_type' => RES_ELIXIR, 'time' => 21600, 'dps' => 0, 'th_req' => 7],
            3  => ['cost' => 800000, 'res_type' => RES_ELIXIR, 'time' => 43200, 'dps' => 0, 'th_req' => 8],
            4  => ['cost' => 1000000, 'res_type' => RES_ELIXIR, 'time' => 86400, 'dps' => 0, 'th_req' => 9],
            5  => ['cost' => 2000000, 'res_type' => RES_ELIXIR, 'time' => 172800, 'dps' => 0, 'th_req' => 10],
            6  => ['cost' => 5000000, 'res_type' => RES_ELIXIR, 'time' => 345600, 'dps' => 0, 'th_req' => 11],
        ]
    ],
    'jump_spell' => [
        'name' => 'Прыжок',
        'type' => TYPE_SPELL,
        'housing_space' => 2,
        'levels' => [
            1  => ['cost' => 1200000, 'res_type' => RES_ELIXIR, 'time' => 172800, 'dps' => 0, 'th_req' => 9], // Unlocked at Spell Factory L4
            2  => ['cost' => 1000000, 'res_type' => RES_ELIXIR, 'time' => 86400, 'dps' => 0, 'th_req' => 9],
            3  => ['cost' => 2000000, 'res_type' => RES_ELIXIR, 'time' => 172800, 'dps' => 0, 'th_req' => 10],
            4  => ['cost' => 5000000, 'res_type' => RES_ELIXIR, 'time' => 345600, 'dps' => 0, 'th_req' => 12],
            5  => ['cost' => 8000000, 'res_type' => RES_ELIXIR, 'time' => 561600, 'dps' => 0, 'th_req' => 13],
        ]
    ],
    'freeze_spell' => [
        'name' => 'Заморозка',
        'type' => TYPE_SPELL,
        'housing_space' => 1,
        'levels' => [
            1  => ['cost' => 1200000, 'res_type' => RES_ELIXIR, 'time' => 172800, 'dps' => 0, 'th_req' => 9], // Unlocked at Spell Factory L4
            2  => ['cost' => 1200000, 'res_type' => RES_ELIXIR, 'time' => 86400, 'dps' => 0, 'th_req' => 9],
            3  => ['cost' => 1700000, 'res_type' => RES_ELIXIR, 'time' => 129600, 'dps' => 0, 'th_req' => 10],
            4  => ['cost' => 3000000, 'res_type' => RES_ELIXIR, 'time' => 172800, 'dps' => 0, 'th_req' => 11],
            5  => ['cost' => 4200000, 'res_type' => RES_ELIXIR, 'time' => 216000, 'dps' => 0, 'th_req' => 12],
            6  => ['cost' => 6000000, 'res_type' => RES_ELIXIR, 'time' => 302400, 'dps' => 0, 'th_req' => 13],
            7  => ['cost' => 7000000, 'res_type' => RES_ELIXIR, 'time' => 432000, 'dps' => 0, 'th_req' => 14],
        ]
    ],
    'clone_spell' => [
        'name' => 'Клонирующее заклинание',
        'type' => TYPE_SPELL,
        'housing_space' => 3,
        'levels' => [
            1  => ['cost' => 2000000, 'res_type' => RES_ELIXIR, 'time' => 259200, 'dps' => 0, 'th_req' => 10], // Unlocked at Spell Factory L5
            2  => ['cost' => 1500000, 'res_type' => RES_ELIXIR, 'time' => 86400, 'dps' => 0, 'th_req' => 10],
            3  => ['cost' => 2500000, 'res_type' => RES_ELIXIR, 'time' => 172800, 'dps' => 0, 'th_req' => 11],
            4  => ['cost' => 3000000, 'res_type' => RES_ELIXIR, 'time' => 194400, 'dps' => 0, 'th_req' => 11],
            5  => ['cost' => 4000000, 'res_type' => RES_ELIXIR, 'time' => 216000, 'dps' => 0, 'th_req' => 12],
            6  => ['cost' => 5000000, 'res_type' => RES_ELIXIR, 'time' => 345600, 'dps' => 0, 'th_req' => 13],
            7  => ['cost' => 8000000, 'res_type' => RES_ELIXIR, 'time' => 432000, 'dps' => 0, 'th_req' => 14],
            8  => ['cost' => 9000000, 'res_type' => RES_ELIXIR, 'time' => 604800, 'dps' => 0, 'th_req' => 15],
        ]
    ],
    'invisibility_spell' => [
        'name' => 'Невидимость',
        'type' => TYPE_SPELL,
        'housing_space' => 1,
        'levels' => [
            1  => ['cost' => 3500000, 'res_type' => RES_ELIXIR, 'time' => 432000, 'dps' => 0, 'th_req' => 11], // Unlocked at Spell Factory L6
            2  => ['cost' => 5000000, 'res_type' => RES_ELIXIR, 'time' => 259200, 'dps' => 0, 'th_req' => 12],
            3  => ['cost' => 6000000, 'res_type' => RES_ELIXIR, 'time' => 345600, 'dps' => 0, 'th_req' => 13],
            4  => ['cost' => 7000000, 'res_type' => RES_ELIXIR, 'time' => 432000, 'dps' => 0, 'th_req' => 14],
        ]
    ],
    'recall_spell' => [
        'name' => 'Вызов',
        'type' => TYPE_SPELL,
        'housing_space' => 2,
        'levels' => [
            1  => ['cost' => 9000000, 'res_type' => RES_ELIXIR, 'time' => 604800, 'dps' => 0, 'th_req' => 13], // Unlocked at Spell Factory L7
            2  => ['cost' => 7500000, 'res_type' => RES_ELIXIR, 'time' => 604800, 'dps' => 0, 'th_req' => 14],
            3  => ['cost' => 8000000, 'res_type' => RES_ELIXIR, 'time' => 734400, 'dps' => 0, 'th_req' => 15],
            4  => ['cost' => 9000000, 'res_type' => RES_ELIXIR, 'time' => 820800, 'dps' => 0, 'th_req' => 15],
            5  => ['cost' => 13000000, 'res_type' => RES_ELIXIR, 'time' => 993600, 'dps' => 0, 'th_req' => 16],
            6  => ['cost' => 19000000, 'res_type' => RES_ELIXIR, 'time' => 1080000, 'dps' => 0, 'th_req' => 17],
        ]
    ],
    'revive_spell' => [
        'name' => 'Оживление',
        'type' => TYPE_SPELL,
        'housing_space' => 2,
        'levels' => [
            1  => ['cost' => 14000000, 'res_type' => RES_ELIXIR, 'time' => 691200, 'dps' => 0, 'th_req' => 15], // Unlocked at Spell Factory L8
            2  => ['cost' => 18000000, 'res_type' => RES_ELIXIR, 'time' => 691200, 'dps' => 0, 'th_req' => 16],
            3  => ['cost' => 19000000, 'res_type' => RES_ELIXIR, 'time' => 907200, 'dps' => 0, 'th_req' => 17],
            4  => ['cost' => 20000000, 'res_type' => RES_ELIXIR, 'time' => 993600, 'dps' => 0, 'th_req' => 18],
        ]
    ],
    'poison_spell' => [
        'name' => 'Ядовитое заклинание',
        'type' => TYPE_DARK_SPELL,
        'housing_space' => 1,
        'levels' => [
            1  => ['cost' => 130000, 'res_type' => RES_ELIXIR, 'time' => 21600, 'dps' => 0, 'th_req' => 8], // Unlocked at Dark Spell Factory L1
            2  => ['cost' => 5000, 'res_type' => RES_DARK, 'time' => 21600, 'dps' => 0, 'th_req' => 8],
            3  => ['cost' => 10000, 'res_type' => RES_DARK, 'time' => 64800, 'dps' => 0, 'th_req' => 9],
            4  => ['cost' => 21500, 'res_type' => RES_DARK, 'time' => 172800, 'dps' => 0, 'th_req' => 10],
            5  => ['cost' => 35000, 'res_type' => RES_DARK, 'time' => 259200, 'dps' => 0, 'th_req' => 11],
            6  => ['cost' => 55000, 'res_type' => RES_DARK, 'time' => 345600, 'dps' => 0, 'th_req' => 12],
            7  => ['cost' => 77500, 'res_type' => RES_DARK, 'time' => 432000, 'dps' => 0, 'th_req' => 13],
            8  => ['cost' => 100000, 'res_type' => RES_DARK, 'time' => 561600, 'dps' => 0, 'th_req' => 14],
            9  => ['cost' => 135000, 'res_type' => RES_DARK, 'time' => 604800, 'dps' => 0, 'th_req' => 15],
            10 => ['cost' => 175000, 'res_type' => RES_DARK, 'time' => 691200, 'dps' => 0, 'th_req' => 16],
            11 => ['cost' => 230000, 'res_type' => RES_DARK, 'time' => 835200, 'dps' => 0, 'th_req' => 17],
            12 => ['cost' => 350000, 'res_type' => RES_DARK, 'time' => 1252800, 'dps' => 0, 'th_req' => 18],
        ]
    ],
    'earthquake_spell' => [
        'name' => 'Землетрясущее заклинание',
        'type' => TYPE_DARK_SPELL,
        'housing_space' => 1,
        'levels' => [
            1  => ['cost' => 260000, 'res_type' => RES_ELIXIR, 'time' => 43200, 'dps' => 0, 'th_req' => 8], // Unlocked at Dark Spell Factory L2
            2  => ['cost' => 6000, 'res_type' => RES_DARK, 'time' => 43200, 'dps' => 0, 'th_req' => 8],
            3  => ['cost' => 12000, 'res_type' => RES_DARK, 'time' => 86400, 'dps' => 0, 'th_req' => 9],
            4  => ['cost' => 25500, 'res_type' => RES_DARK, 'time' => 259200, 'dps' => 0, 'th_req' => 10],
            5  => ['cost' => 42000, 'res_type' => RES_DARK, 'time' => 302400, 'dps' => 0, 'th_req' => 11],
        ]
    ],
    'haste_spell' => [
        'name' => 'Спешное заклинание',
        'type' => TYPE_DARK_SPELL,
        'housing_space' => 1,
        'levels' => [
            1  => ['cost' => 600000, 'res_type' => RES_ELIXIR, 'time' => 172800, 'dps' => 0, 'th_req' => 9], // Unlocked at Dark Spell Factory L3
            2  => ['cost' => 8000, 'res_type' => RES_DARK, 'time' => 86400, 'dps' => 0, 'th_req' => 9],
            3  => ['cost' => 17000, 'res_type' => RES_DARK, 'time' => 172800, 'dps' => 0, 'th_req' => 10],
            4  => ['cost' => 30000, 'res_type' => RES_DARK, 'time' => 259200, 'dps' => 0, 'th_req' => 11],
            5  => ['cost' => 38500, 'res_type' => RES_DARK, 'time' => 345600, 'dps' => 0, 'th_req' => 12],
            6  => ['cost' => 200000, 'res_type' => RES_DARK, 'time' => 777600, 'dps' => 0, 'th_req' => 16],
            7  => ['cost' => 320000, 'res_type' => RES_DARK, 'time' => 1080000, 'dps' => 0, 'th_req' => 17],
        ]
    ],
    'skeleton_spell' => [
        'name' => 'Скелетное заклинание',
        'type' => TYPE_DARK_SPELL,
        'housing_space' => 1,
        'levels' => [
            1  => ['cost' => 1200000, 'res_type' => RES_ELIXIR, 'time' => 259200, 'dps' => 0, 'th_req' => 9], // Unlocked at Dark Spell Factory L4
            2  => ['cost' => 11000, 'res_type' => RES_DARK, 'time' => 86400, 'dps' => 0, 'th_req' => 9],
            3  => ['cost' => 17000, 'res_type' => RES_DARK, 'time' => 129600, 'dps' => 0, 'th_req' => 10],
            4  => ['cost' => 25000, 'res_type' => RES_DARK, 'time' => 172800, 'dps' => 0, 'th_req' => 11],
            5  => ['cost' => 40000, 'res_type' => RES_DARK, 'time' => 216000, 'dps' => 0, 'th_req' => 12],
            6  => ['cost' => 50000, 'res_type' => RES_DARK, 'time' => 259200, 'dps' => 0, 'th_req' => 13],
            7  => ['cost' => 75000, 'res_type' => RES_DARK, 'time' => 367200, 'dps' => 0, 'th_req' => 14],
            8  => ['cost' => 135000, 'res_type' => RES_DARK, 'time' => 561600, 'dps' => 0, 'th_req' => 15],
        ]
    ],
    'bat_spell' => [
        'name' => 'Заклинание летучих мышей',
        'type' => TYPE_DARK_SPELL,
        'housing_space' => 1,
        'levels' => [
            1  => ['cost' => 2500000, 'res_type' => RES_ELIXIR, 'time' => 432000, 'dps' => 0, 'th_req' => 10], // Unlocked at Dark Spell Factory L5
            2  => ['cost' => 13000, 'res_type' => RES_DARK, 'time' => 86400, 'dps' => 0, 'th_req' => 10],
            3  => ['cost' => 25500, 'res_type' => RES_DARK, 'time' => 172800, 'dps' => 0, 'th_req' => 11],
            4  => ['cost' => 35000, 'res_type' => RES_DARK, 'time' => 194400, 'dps' => 0, 'th_req' => 12],
            5  => ['cost' => 47500, 'res_type' => RES_DARK, 'time' => 345600, 'dps' => 0, 'th_req' => 13],
            6  => ['cost' => 140000, 'res_type' => RES_DARK, 'time' => 604800, 'dps' => 0, 'th_req' => 14],
            7  => ['cost' => 220000, 'res_type' => RES_DARK, 'time' => 734400, 'dps' => 0, 'th_req' => 16],
            8  => ['cost' => 300000, 'res_type' => RES_DARK, 'time' => 1123200, 'dps' => 0, 'th_req' => 17],
        ]
    ],
    'overgrowth_spell' => [
        'name' => 'Заросли',
        'type' => TYPE_DARK_SPELL,
        'housing_space' => 2,
        'levels' => [
            1 => ['cost' => 4000000, 'res_type' => RES_ELIXIR, 'time' => 518400, 'dps' => 0, 'th_req' => 12], // Unlocked at Dark Spell Factory L6
            2 => ['cost' => 62500, 'res_type' => RES_DARK, 'time' => 475200, 'dps' => 0, 'th_req' => 13],
            3 => ['cost' => 125000, 'res_type' => RES_DARK, 'time' => 734400, 'dps' => 0, 'th_req' => 14],
            4 => ['cost' => 175000, 'res_type' => RES_DARK, 'time' => 864000, 'dps' => 0, 'th_req' => 15],
        ]
    ],
	'ice_block_spell' => [
        'name' => 'Ледяной блок',
        'type' => TYPE_DARK_SPELL,
        'housing_space' => 1,
        'levels' => [
            1 => ['cost' => 11000000, 'res_type' => RES_ELIXIR, 'time' => 604800, 'dps' => 0, 'th_req' => 14], // Unlocked at Dark Spell Factory L7
            2 => ['cost' => 140000, 'res_type' => RES_DARK, 'time' => 864000, 'dps' => 0, 'th_req' => 15],
            3 => ['cost' => 200000, 'res_type' => RES_DARK, 'time' => 950400, 'dps' => 0, 'th_req' => 16],
            4 => ['cost' => 280000, 'res_type' => RES_DARK, 'time' => 1209600, 'dps' => 0, 'th_req' => 17],
            5 => ['cost' => 320000, 'res_type' => RES_DARK, 'time' => 1382400, 'dps' => 0, 'th_req' => 18],
        ]
    ],

    // ============================================================
    // 10. ГЕРОИ (Heroes) - ДАННЫЕ ОСТАВЛЕНЫ, Т.К. НЕТ ЯВНОГО JSON ДЛЯ УРОВНЕЙ ГЕРОЕВ
    // ============================================================
    'barbarian_king' => [
        'name' => 'Король Варваров',
        'type' => TYPE_HERO,
        'levels' => formatHeroLevels('Barbarian King') 
    ],
    'archer_queen' => [
        'name' => 'Королева Лучниц',
        'type' => TYPE_HERO,
        'levels' => formatHeroLevels('Archer Queen')
    ],
    'grand_warden' => [
        'name' => 'Хранитель',
        'type' => TYPE_HERO,
        'levels' => formatHeroLevels('Grand Warden')
    ],
    'royal_champion' => [
        'name' => 'Королевский Чемпион',
        'type' => TYPE_HERO,
        'levels' => formatHeroLevels('Royal Champion')
    ],
    'minion_prince' => [
        'name' => 'Принц Миньонов',
        'type' => TYPE_HERO,
        'levels' => formatHeroLevels('Minion Prince')
    ],

    // ============================================================
    // 11. ОСАДНЫЕ МАШИНЫ (Siege Machines) - ДАННЫЕ ОСТАВЛЕНЫ БЕЗ ИЗМЕНЕНИЙ
    // ============================================================
    'wall_wrecker' => [
        'name' => 'Разрушитель стен',
        'type' => TYPE_SIEGE,
        'levels' => formatUnitLevels(2400000, 172800, RES_ELIXIR, [2500000,3500000,6500000,10000000,26000000], [172800,259200,604800,777600,1166400], [250,300,350,400,450,500])
    ],
    'battle_blimp' => [
        'name' => 'Боевой дирижабль',
        'type' => TYPE_SIEGE,
        'levels' => formatUnitLevels(3700000, 259200, RES_ELIXIR, [2500000,3500000,6500000,10000000], [172800,259200,604800,777600], [100,140,180,220,260])
    ],
    'stone_slammer' => [
        'name' => 'Камнебросатель',
        'type' => TYPE_SIEGE,
        'levels' => formatUnitLevels(5000000, 302400, RES_ELIXIR, [2500000,3500000,6500000,10000000], [172800,259200,604800,777600], [400,500,600,700,750])
    ],
    'siege_barracks' => [
        'name' => 'Осадные казармы',
        'type' => TYPE_SIEGE,
        'levels' => formatUnitLevels(8700000, 345600, RES_ELIXIR, [3500000,5000000,8000000,18000000], [259200,345600,604800,1036800], [])
    ],
    'log_launcher' => [
        'name' => 'Бревномет',
        'type' => TYPE_SIEGE,
        'levels' => formatUnitLevels(9000000, 432000, RES_ELIXIR, [3200000,4500000,7500000,18000000], [259200,345600,604800,1036800], [140,160,180,200,220])
    ],
    'flame_flinger' => [
        'name' => 'Огнеметатель',
        'type' => TYPE_SIEGE,
        'levels' => formatUnitLevels(10000000, 475200, RES_ELIXIR, [5500000,8000000,10000000,18000000], [259200,345600,604800,1036800], [45,50,55,60,65])
    ],
    'battle_drill' => [
        'name' => 'Боевой бур',
        'type' => TYPE_SIEGE,
        'levels' => formatUnitLevels(11000000, 518400, RES_ELIXIR, [6000000,8500000,10000000,17000000], [345600,432000,691200,777600], [430,470,510,550,590])
    ],
    'troop_launcher' => [
        'name' => 'Пусковая установка',
        'type' => TYPE_SIEGE,
        'levels' => formatUnitLevels(13000000, 604800, RES_ELIXIR, [8500000,10000000,17000000], [518400,777600,777600], [])
    ],

    // ============================================================
    // 12. ПИТОМЦЫ (Pets) - ДАННЫЕ ОСТАВЛЕНЫ, Т.К. НЕТ ЯВНОГО JSON ДЛЯ УРОВНЕЙ ПИТОМЦЕВ
    // ============================================================
    'lassi' => [
        'name' => 'Л.А.С.С.И',
        'type' => TYPE_PET,
        'levels' => formatUnitLevels(3000000, 86400, RES_ELIXIR, [20000,30000,40000,50000,60000,70000,80000,90000,100000,110000,120000,130000,140000,150000], [86400,129600,172800,216000,259200,302400,345600,388800,432000,475200,518400,561600,604800,648000], [150,160,170,180,190,200,210,220,230,240,250,260,270,280,290])
    ],
    'electro_owl' => [
        'name' => 'Электросова',
        'type' => TYPE_PET,
        'levels' => formatUnitLevels(4000000, 172800, RES_ELIXIR, [30000,45000,60000,75000,90000,105000,120000,135000,150000,165000,180000,195000,210000,225000], [129600,172800,259200,345600,388800,432000,475200,518400,561600,604800,691200,691200,691200,691200], [100,105,110,115,120,125,130,135,140,145,150,155,160,165,170])
    ],
    'mighty_yak' => [
        'name' => 'Могучий Як',
        'type' => TYPE_PET,
        'levels' => formatUnitLevels(5000000, 259200, RES_ELIXIR, [40000,50000,60000,70000,80000,90000,100000,110000,120000,130000,140000,150000,160000,170000], [86400,129600,172800,216000,259200,302400,345600,388800,432000,475200,518400,561600,604800,648000], [60,64,68,72,76,80,84,88,92,96,100,104,108,112,116])
    ],
    'unicorn' => [
        'name' => 'Единорог',
        'type' => TYPE_PET,
        'levels' => formatUnitLevels(6000000, 302400, RES_ELIXIR, [50000,65000,80000,95000,110000,125000,140000,155000,170000,200000,230000,260000,290000,320000], [129600,172800,259200,345600,388800,432000,475200,518400,561600,604800,691200,691200,691200,691200], [])
    ],
    'frosty' => [
        'name' => 'Фрости',
        'type' => TYPE_PET,
        'levels' => formatUnitLevels(7000000, 345600, RES_ELIXIR, [70000,85000,100000,115000,130000,145000,160000,170000,180000,200000,230000,260000,290000,320000], [129600,172800,259200,345600,388800,432000,475200,518400,561600,604800,691200,691200,691200,691200], [94,98,102,106,110,114,118,122,126,130,134,138,142,146,150])
    ],
    'diggy' => [
        'name' => 'Дигги',
        'type' => TYPE_PET,
        'levels' => formatUnitLevels(8000000, 388800, RES_ELIXIR, [90000,105000,120000,130000,140000,150000,160000,170000,180000], [129600,172800,259200,345600,388800,432000,475200,518400,561600], [105,110,115,120,125,130,135,140,145,150])
    ],
    'poison_lizard' => [
        'name' => 'Ядовитый ящер',
        'type' => TYPE_PET,
        'levels' => formatUnitLevels(9000000, 432000, RES_ELIXIR, [60000,75000,90000,100000,110000,120000,130000,140000,150000,180000,200000,220000,240000,260000], [86400,129600,172800,216000,259200,302400,345600,388800,432000,518400,604800,691200,691200,691200], [181,192,203,214,225,236,247,258,269,280,291,302,313,324,335])
    ],
    'phoenix' => [
        'name' => 'Феникс',
        'type' => TYPE_PET,
        'levels' => formatUnitLevels(10000000, 475200, RES_ELIXIR, [80000,95000,110000,125000,140000,155000,170000,180000,190000], [129600,172800,259200,345600,388800,432000,475200,518400,561600], [178,186,194,202,210,218,226,234,242,250])
    ],
    'spirit_fox' => [
        'name' => 'Дух лисы',
        'type' => TYPE_PET,
        'levels' => formatUnitLevels(11000000, 518400, RES_ELIXIR, [150000,160000,170000,180000,190000,200000,210000,220000,230000], [259200,345600,432000,475200,518400,561600,604800,648000,691200], [108,116,124,132,140,148,156,164,172,180])
    ],
    'angry_jelly' => [
        'name' => 'Злая медуза',
        'type' => TYPE_PET,
        'levels' => formatUnitLevels(12000000, 604800, RES_ELIXIR, [150000,160000,170000,180000,190000,200000,210000,220000,230000], [259200,345600,432000,518400,604800,691200,691200,691200,691200], [112,121,130,139,148,157,166,175,184,193])
    ],
    'sneezy' => [
        'name' => 'Чихозавр',
        'type' => TYPE_PET,
        'levels' => formatUnitLevels(16500000, 777600, RES_ELIXIR, [200000,220000,240000,260000,280000,300000,320000,340000,360000], [691200,691200,691200,691200,691200,691200,691200,691200,691200], [270,290,310,330,350,370,390,410,430,450])
    ],

    // ============================================================
    // 13. СУПЕР ВОЙСКА (Super Troops)
    // ДАННЫЕ СВЕРЕНЫ И СООТВЕТСТВУЮТ super-troops.json
    // ============================================================
    'super_troops' => [
        'super_barbarian' => ['name' => 'Суперварвар', 'cost_de' => 25000, 'duration' => 259200, 'min_level' => 8],
        'sneaky_goblin' => ['name' => 'Коварный гоблин', 'cost_de' => 25000, 'duration' => 259200, 'min_level' => 7],
        'super_giant' => ['name' => 'Супергигант', 'cost_de' => 25000, 'duration' => 259200, 'min_level' => 9],
        'super_wall_breaker' => ['name' => 'Суперстенобой', 'cost_de' => 25000, 'duration' => 259200, 'min_level' => 7],
        'super_archer' => ['name' => 'Суперлучница', 'cost_de' => 25000, 'duration' => 259200, 'min_level' => 8],
        'super_witch' => ['name' => 'Суперведьма', 'cost_de' => 25000, 'duration' => 259200, 'min_level' => 5],
        'inferno_dragon' => ['name' => 'Адский дракон', 'cost_de' => 25000, 'duration' => 259200, 'min_level' => 6],
        'super_valkyrie' => ['name' => 'Супервалькирия', 'cost_de' => 25000, 'duration' => 259200, 'min_level' => 7],
        'super_minion' => ['name' => 'Суперминьон', 'cost_de' => 25000, 'duration' => 259200, 'min_level' => 8],
        'super_wizard' => ['name' => 'Суперколдун', 'cost_de' => 25000, 'duration' => 259200, 'min_level' => 9],
        'ice_hound' => ['name' => 'Ледяная гончая', 'cost_de' => 25000, 'duration' => 259200, 'min_level' => 5],
        'rocket_balloon' => ['name' => 'Ракетный шар', 'cost_de' => 25000, 'duration' => 259200, 'min_level' => 8],
        'super_bowler' => ['name' => 'Супервышибала', 'cost_de' => 25000, 'duration' => 259200, 'min_level' => 4],
        'super_dragon' => ['name' => 'Супердракон', 'cost_de' => 25000, 'duration' => 259200, 'min_level' => 7],
        'super_miner' => ['name' => 'Супершахтер', 'cost_de' => 25000, 'duration' => 259200, 'min_level' => 7],
        'super_hog_rider' => ['name' => 'Супервсадник на кабане', 'cost_de' => 25000, 'duration' => 259200, 'min_level' => 10],
        'super_yeti' => ['name' => 'Суперйети', 'cost_de' => 25000, 'duration' => 259200, 'min_level' => 3],
    ],

    // ============================================================
    // 14. СНАРЯЖЕНИЕ ГЕРОЕВ (Equipment)
    // ============================================================
    'barbarian_puppet' => ['name' => 'Марионетка варвара', 'hero' => 'Barbarian King', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(0)],
    'rage_vial' => ['name' => 'Флакон ярости', 'hero' => 'Barbarian King', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(1)],
    'archer_puppet' => ['name' => 'Марионетка лучницы', 'hero' => 'Archer Queen', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(2)],
    'invisibility_vial' => ['name' => 'Флакон невидимости', 'hero' => 'Archer Queen', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(3)],
    'eternal_tome' => ['name' => 'Вечный том', 'hero' => 'Grand Warden', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(4)],
    'life_gem' => ['name' => 'Жизненный камень', 'hero' => 'Grand Warden', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(5)],
    'seeking_shield' => ['name' => 'Ищущий щит', 'hero' => 'Royal Champion', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(6)],
    'royal_gem' => ['name' => 'Королевский камень', 'hero' => 'Royal Champion', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(7)],
    'earthquake_boots' => ['name' => 'Землетрясущие сапоги', 'hero' => 'Barbarian King', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(8)],
    'hog_rider_puppet' => ['name' => 'Марионетка всадника', 'hero' => 'Royal Champion', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(9)],
    'giant_gauntlet' => ['name' => 'Гигантская рукавица', 'hero' => 'Barbarian King', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(10)],
    'vampstache' => ['name' => 'Вампусы', 'hero' => 'Barbarian King', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(11)],
    'haste_vial' => ['name' => 'Флакон спешки', 'hero' => 'Royal Champion', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(12)],
    'rocket_spear' => ['name' => 'Ракетное копье', 'hero' => 'Royal Champion', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(13)],
    'spiky_ball' => ['name' => 'Шипастый мяч', 'hero' => 'Barbarian King', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(14)],
    'frozen_arrow' => ['name' => 'Ледяная стрела', 'hero' => 'Archer Queen', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(15)],
    'giant_arrow' => ['name' => 'Гигантская стрела', 'hero' => 'Archer Queen', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(17)],
    'heroic_torch' => ['name' => 'Героический факел', 'hero' => 'Grand Warden', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(19)],
    'healer_puppet' => ['name' => 'Марионетка целительницы', 'hero' => 'Archer Queen', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(20)],
    'fireball' => ['name' => 'Огненный шар', 'hero' => 'Grand Warden', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(22)],
    'rage_gem' => ['name' => 'Камень ярости', 'hero' => 'Grand Warden', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(24)],
    'snake_bracelet' => ['name' => 'Змеиный браслет', 'hero' => 'Barbarian King', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(32)],
    'healing_tome' => ['name' => 'Лечащий том', 'hero' => 'Grand Warden', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(34)],
    'dark_crown' => ['name' => 'Темная корона', 'hero' => 'Minion Prince', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(35)],
    'magic_mirror' => ['name' => 'Магическое зеркало', 'hero' => 'Archer Queen', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(39)],
    'electro_boots' => ['name' => 'Электросапоги', 'hero' => 'Royal Champion', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(40)],
    'lavaloon_puppet' => ['name' => 'Марионетка Лавалона', 'hero' => 'Grand Warden', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(41)],
    'henchmen_puppet' => ['name' => 'Марионетка приспешника', 'hero' => 'Minion Prince', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(42)],
    'dark_orb' => ['name' => 'Темная сфера', 'hero' => 'Minion Prince', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(43)],
    'metal_pants' => ['name' => 'Металлические штаны', 'hero' => 'Minion Prince', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(44)],
    'noble_iron' => ['name' => 'Благородное железо', 'hero' => 'Minion Prince', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(47)],
    'action_figure' => ['name' => 'Экшн-фигурка', 'hero' => 'Archer Queen', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(48)],
    'meteor_staff' => ['name' => 'Посох метеора', 'hero' => 'Minion Prince', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(49)],
    'frost_flake' => ['name' => 'Морозная снежинка', 'hero' => 'Royal Champion', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(50)],
    'stick_horse' => ['name' => 'Палочная лошадь', 'hero' => 'Barbarian King', 'type' => TYPE_EQUIPMENT, 'levels' => formatEquipmentLevels(51)],
];


// ----------------------------------------------------------------------------
// ВСПОМОГАТЕЛЬНЫЕ ФУНКЦИИ (ДЛЯ ГЕНЕРАЦИИ ДАННЫХ ИЗ СЫРЫХ МАССИВОВ)
// ----------------------------------------------------------------------------

/**
 * Генерирует структуру уровней для юнитов (Войска и Заклинания)
 */
function formatUnitLevels($startCost, $startTime, $resType, $upgradeCosts, $upgradeTimes, $dpsArray) {
    $levels = [];
    
    // Уровень 1
    $levels[1] = [
        'cost' => $startCost,
        'time' => $startTime,
        'res_type' => $resType,
        'dps' => $dpsArray[0] ?? 0
    ];

    // Последующие уровни
    foreach ($upgradeCosts as $index => $cost) {
        $level = $index + 2;
        $levels[$level] = [
            'cost' => $cost,
            'time' => $upgradeTimes[$index] ?? 0,
            'res_type' => $resType,
            // Берем DPS для следующего уровня, если есть, иначе повторяем текущий
            'dps' => $dpsArray[$index + 1] ?? ($dpsArray[$index] ?? 0)
        ];
    }
    return $levels;
}

/**
 * Заглушка для уровней Героев. 
 * Для реальной работы требует подробных таблиц DPS/HP/Cost.
 */
function formatHeroLevels($heroName) { return []; }

/**
 * Заглушка для уровней Снаряжения. 
 * Для реальной работы требует логики расчета руды (Ore) и эффектов.
 */
function formatEquipmentLevels($eqId) { return []; }

/**
 * Получает данные по конкретному уровню объекта (используется end() для последнего, если уровень не найден)
 */
function getLevelData($id, $level) {
    global $game_data;
    return $game_data[$id]['levels'][$level] ?? end($game_data[$id]['levels']);
}

/**
 * Получает общую информацию об объекте (например, имя, тип)
 */
function getObjectInfo($id) {
    global $game_data;
    return $game_data[$id] ?? null;
}

/**
 * Получает общую информацию о здании (псевдоним getObjectInfo)
 */
function getBuildingInfo($building_id) {
    global $game_data;
    return $game_data[$building_id] ?? null;
}
?>
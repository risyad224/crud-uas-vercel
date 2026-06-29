<?php
$tmpDir = '/tmp/laravel';

$directories = [
    $tmpDir . '/storage/framework/views',
    $tmpDir . '/storage/framework/cache/data',
    $tmpDir . '/storage/logs',
    $tmpDir . '/bootstrap/cache',
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

$_ENV['LARAVEL_STORAGE_PATH'] = $tmpDir . '/storage';
putenv('LARAVEL_STORAGE_PATH=' . $_ENV['LARAVEL_STORAGE_PATH']);

$_ENV['VIEW_COMPILED_PATH'] = $tmpDir . '/storage/framework/views';
putenv('VIEW_COMPILED_PATH=' . $_ENV['VIEW_COMPILED_PATH']);

$_ENV['APP_SERVICES_CACHE'] = $tmpDir . '/bootstrap/cache/services.php';
putenv('APP_SERVICES_CACHE=' . $_ENV['APP_SERVICES_CACHE']);

$_ENV['APP_PACKAGES_CACHE'] = $tmpDir . '/bootstrap/cache/packages.php';
putenv('APP_PACKAGES_CACHE=' . $_ENV['APP_PACKAGES_CACHE']);

$_ENV['APP_CONFIG_CACHE'] = $tmpDir . '/bootstrap/cache/config.php';
putenv('APP_CONFIG_CACHE=' . $_ENV['APP_CONFIG_CACHE']);

$_ENV['APP_ROUTES_CACHE'] = $tmpDir . '/bootstrap/cache/routes.php';
putenv('APP_ROUTES_CACHE=' . $_ENV['APP_ROUTES_CACHE']);

$_ENV['APP_EVENTS_CACHE'] = $tmpDir . '/bootstrap/cache/events.php';
putenv('APP_EVENTS_CACHE=' . $_ENV['APP_EVENTS_CACHE']);

require __DIR__ . '/../public/index.php';

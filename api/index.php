<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

try {
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    echo "<h1>Vercel PHP Fatal Error</h1>";
    echo "<pre>" . (string) $e . "</pre>";
}

<?php
$pdo = new PDO("mysql:host=127.0.0.1", "root", "");
$pdo->exec("CREATE DATABASE IF NOT EXISTS db_uas_241011750007;");
echo "Database created successfully.";

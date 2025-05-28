<?php

//DB接続設定
$host = 'localhost';
$dbname = 'minisystem';
$user = 'root';
$pass = 'proclimb';
$charset = 'utf8mb4';

//DSN
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

//エラー時の例外設定
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("DB接続に失敗しました: " . $e->getMessage());
}

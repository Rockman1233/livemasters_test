<?php

$dsn = 'mysql:host=localhost;dbname=exam_project';
$user = 'root';
$password = '';

try {
    Object::$db = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
    var_dump($e->getMessage());
}
<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "homework_five";

try {
    $pdo = new PDO("mysql:host=".$host.";dbname=".$dbName, $user, $pass);
    $pdo -> exec("set names utf8");
} catch (PDOException $e) {
    echo "Bağlantı Hatası!";
    exit;
}
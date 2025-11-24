<?php
$host = "localhost";
$user = "nauta";
$db = "HStransporte";
$passwd = "123";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $passwd);
} 
catch (PDOException $ex) {
    echo "Erro ao conectar: " . $ex->getMessage();
}
?>

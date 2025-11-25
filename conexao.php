<?php


 $host = "localhost";
 $user = "root";
 $db = "HStransporte";
 $passwd = "root";



try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $passwd);
} 
catch (PDOException $ex) {
    echo "Erro ao conectar: " . $ex->getMessage();
}

?>

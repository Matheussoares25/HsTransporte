<?php

class Conexao{
 private $host = "localhost";
 private $user = "nauta";
 private $db = "HStransporte";
 private $passwd = "123";
 private $pdo;

 public function conectar(){
    try{
        $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->db};charset=utf8",
        $this->user,
        $this->passwd
    );
    return $this->pdo;
    }catch (PDOException $e){
        die("Erro ao conectar". $e->getMessage());
    }
 }



}



?>

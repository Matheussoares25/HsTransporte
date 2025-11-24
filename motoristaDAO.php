<?php
require_once "conexao.php";
require_once "motorista.php";


class motoristaDAO{
    public function listar(){
        global $pdo;

        $sql = $pdo->prepare("SELECT id,nome_motor,tel_motor,cnh_motor FROM Motorista");
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
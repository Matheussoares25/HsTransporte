<?php

require_once "motorista.php";
require_once "conexao.php";

// class Conexao {
//     private $host = "localhost";
//     private $user = "nauta";
//     private $passwd = "123";
//     private $db = "HStransporte";
//     public $pdo;

//     public function conectar() {

//         try {
//             $this->pdo = new PDO(
//                 "mysql:host={$this->host};dbname={$this->db};charset=utf8",
//                 $this->user,
//                 $this->passwd
//             );

//         } catch (PDOException $ex) {
//             die("Erro ao conectar: " . $ex->getMessage());
//         }
//     }
// }

class motoristaDAO
{

    private $pdo;

    public function __construct()
    {
        try {
            $con = new Conexao();
            $this->pdo = $con->conectar();
        } catch (PDOException $e) {
            die("ERRO AO CONECTAR" . $e->getMessage());
        }
    }

    public function listar()
    {


        $sql = $this->pdo->prepare("SELECT  id,nome_motor, tel_motor, cnh_motor FROM Motorista");
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cadastrar(motorista $motorista)
    {
        try {

            $senha_hash = password_hash($motorista->senha, PASSWORD_DEFAULT);

            $sql = $this->pdo->prepare("
            INSERT INTO Motorista 
            (cpf_motor, nome_motor, tel_motor, idade_motor, endereco_motor, cnh_motor, senha, cargo)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");

            $ok = $sql->execute([
                $motorista->cpf,
                $motorista->nome,
                $motorista->tel,
                $motorista->idade,
                $motorista->endereco,
                $motorista->cnh,
                $senha_hash,
                3
            ]);

            if (!$ok) {
                var_dump($sql->errorInfo());
                die();
            }

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }
    public function verificar(motorista $motorista)
{
    try {

        $sql = $this->pdo->prepare(
            "SELECT id, senha, cargo FROM Motorista WHERE cpf_motor = :cpf"
        );
        $sql->bindValue(":cpf", $motorista->cpf);
        $sql->execute();

     
        if ($sql->rowCount() == 0) {
            return "NAO_EXISTE";
        }

        $dados = $sql->fetch(PDO::FETCH_ASSOC);

        
        if (!password_verify($motorista->senha, $dados['senha'])) {
            return false;
        }

       
        return true;

    } catch (PDOException $e) {
        return "ERRO";
    }
}




}


?>
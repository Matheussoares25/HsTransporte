<?php
require_once "conexao.php";
require_once "motorista.php";

class Conexao {
    private $host = "localhost";
    private $user = "root";
    private $passwd = "root";
    private $db = "HStransporte";
    public $pdo; 

   
    public function conectar() {
        try {
           
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8", $this->user, $this->passwd);
              
        } catch (PDOException $ex) {
            echo "Erro ao conectar: " . $ex->getMessage();
        }
    }
}


class motoristaDAO {
    public function listar() {
        
        $con = new Conexao();
        $con->conectar();  
    
        $pdo = $con->pdo;

        $sql = $pdo->prepare("SELECT id, nome_motor, tel_motor, cnh_motor FROM Motorista");
        $sql->execute();


        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


public function cadastrar(motorista $motorista){
    $con = new Conexao();
    $con->conectar();
    $pdo = $con->pdo;

    
    $senha_hash = password_hash($motorista->senha, PASSWORD_DEFAULT);

  
    $sql = $pdo->prepare("INSERT INTO motorista (cpf_motor, nome_motor, tel_motor, idade_motor, endereco_motor, cnh_motor, senha) VALUES (?, ?, ?, ?, ?, ?, ?)");

   
     $res = $sql->execute([
        $motorista->cpf,        
        $motorista->nome,       
        $motorista->tel,        
        $motorista->idade,     
        $motorista->endereco,   
        $motorista->cnh,        
        $senha_hash             
    ]);

    
    if ($res) {
        echo "Motorista cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar motorista.";
    }
}
}
?>
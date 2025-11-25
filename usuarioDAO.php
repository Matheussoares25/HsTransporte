<?php
require_once "conexao.php";
require_once "usuario.php";




function geratoken(int $tamanho = 15): string
{

    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
    $caracteres_embaralhados = str_shuffle($caracteres);

    return substr($caracteres_embaralhados, 0, $tamanho);
}




class usuarioDAO
{

    private $pdo;

    public function __construct()
    {
        try {
            $con = new Conexao();
            $this->pdo = $con->conectar();
        } catch (PDOException $e) {
            die("Erro ao conectar ao banco: " . $e->getMessage());
        }
    }

    public function cadastrar(usuario $usuario)
    {

        try {
            $sql = $this->pdo->prepare("SELECT id FROM Usuario WHERE cpf = ?");
            $sql->execute([$usuario->cpf]);

            if ($sql->rowCount() > 0) {
                return "CPF_EXISTE";

            }

            $data = date('Y-m-d H:i:s');

            $senha_hash = password_hash($usuario->senha, PASSWORD_DEFAULT);

            $sql = $this->pdo->prepare("
        INSERT INTO Usuario (login, email, senha, cargo, data_criacao,cpf)
        VALUES (?, ?, ?, ?, ?,?)
    ");


            $resultado = $sql->execute(
                [
                    $usuario->nome,
                    $usuario->email,
                    $senha_hash,
                    $usuario->cargo,
                    $data,
                    $usuario->cpf
                ]
            );

            return "OK";


        } catch (PDOException $e) {
            return false;
        }


    }


    public function verificar(usuario $usuario)
    {
        try {

            $sql = $this->pdo->prepare("
            (SELECT id,senha,cargo from Usuario WHERE cpf = :cpf)
            
        ");

            $sql->bindValue(":cpf", $usuario->cpf);
            $sql->execute();

            $resultado = $sql->fetch(PDO::FETCH_ASSOC);

            if (!$resultado) {
                return false;
            }


            if (!password_verify($usuario->senha, $resultado['senha'])) {
                return false;
            }


            if ($resultado['cargo'] == 3) {

                header("Location: Lmotorista.php");
                exit;
            }



            return true;

        } catch (PDOException $e) {
            return false;
        }
    }

    public function listCargos()
    {
        try {
            $sql = $this->pdo->prepare("SELECT id, nome_cargo FROM cargos");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}

?>
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
            $sql = $this->pdo->prepare("SELECT id FROM Usuario WHERE email = ?");
            $sql->execute([$usuario->email]);

            if ($sql->rowCount() > 0) {
                return "EMAIL_EXISTE";

            }

            $data = date('Y-m-d H:i:s');

            $senha_hash = password_hash($usuario->senha, PASSWORD_DEFAULT);

            $sql = $this->pdo->prepare("
        INSERT INTO Usuario (login, email, senha, cargo, data_criacao)
        VALUES (?, ?, ?, ?, ?)
    ");


            $resultado = $sql->execute(
                [
                    $usuario->nome,
                    $usuario->email,
                    $senha_hash,
                    $usuario->cargo,
                    $data
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
            $sql = $this->pdo->prepare("SELECT id, senha FROM Usuario WHERE email = :email");
            $sql->bindValue(":email", $usuario->email);
            $sql->execute();

            $resultado = $sql->fetch(PDO::FETCH_ASSOC);


            if (!$resultado) {
                return false;
            }

            $senhaHashBanco = $resultado['senha'];
            $senhaDigitada = $usuario->senha;


            if (password_verify($senhaDigitada, $senhaHashBanco)) {

                $token = geratoken(32);

                $sql = $this->pdo->prepare("UPDATE Usuario SET token_val = ? WHERE id = ?");
                $sql->execute([$token, $resultado['id']]);

                return true;
            }

            
            return false;
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
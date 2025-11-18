<?php
require_once "conexao.php";
require_once "usuario.php";

function geratoken(int $tamanho = 15): string {
   
         $caracteres ='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
        $caracteres_embaralhados = str_shuffle($caracteres);

        return substr($caracteres_embaralhados, 0, $tamanho);
}




class usuarioDAO{

   public function cadastrar($usuario){
    global $pdo;
    

    $sql = $pdo->prepare("SELECT id FROM Usuario WHERE email = ?");
    $sql->execute([$usuario['email']]);
    
    if($sql->rowCount() > 0){
        return "EMAIL_EXISTE";
        exit;
    }

    $data = date('Y-m-d H:i:s');

    $senha_hash = password_hash($usuario['senha'], PASSWORD_DEFAULT);

    $sql = $pdo->prepare("
        INSERT INTO Usuario (login, email, senha, cargo, data_criacao)
        VALUES (?, ?, ?, ?, ?)
    ");


    $resultado = $sql->execute([
        $usuario['login'],
        $usuario['email'],
        $senha_hash,
        $usuario['cargo'],
        $data
    ]);

     return "OK";
    

    

}


    public function verificar($usuario){
       global $pdo;

         $sql = $pdo->prepare("SELECT senha FROM Usuario WHERE email = :id");
         $sql->bindValue(":id", $usuario['email']);
         $sql->execute();

        $resultado = $sql->fetch(PDO::FETCH_ASSOC);


         $senhaHashBanco = $resultado['senha'];     
         $senhaDigitada  = $usuario['senha'];        

 
       return password_verify($senhaDigitada, $senhaHashBanco);

         $token = geratoken(64);
         
         $sql = $pdo->prepare("UPDATE usuario set token_val = ? ");


    $resultado = $sql->execute([$token]);

    
    }
}

?>
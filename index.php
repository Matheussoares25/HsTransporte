<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "usuario.php";
require "usuarioDAO.php";
require "functions.php";


if (isset($_POST['entrar'])) {
$dao = new usuarioDAO();
$login = $dao->verificar($_POST);

    if ($login) {
       
        header("Location: sistema.php");
        exit;
    } else {
       
        alert("error","Erro", "SENHA INCORRETA");
    }
}
?>
<?php
require_once "cabeçalho.php"
?>

<body>
    

    <div class="container">
        <div class="col" style="margin: auto; width: 450px; margin-top: 15%;border: 1px solid rgb(146, 141, 141);border-radius: 25px; background-color: rgb(146, 146, 146);  ">
            
            <div class="col" style="padding: 5%;" >
                <form method="POST">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <div class="row-12">
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                        
                    </div>
                    <div class="mb-8">
                        <label for="exampleInputPassword1" class="form-label">Senha</label>
                        <input type="password" class="form-control" name="senha">
                    </div>
                    <div class="mb-3 form-check">
                        
                    </div>
                    <button type="submit" name="entrar"class="btn btn-primary">Entrar</button>
                </form>
            </div>
            <div class="col">
                

            </div>
        </div>
    </div>


</body>

</html>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "usuario.php";
require "usuarioDAO.php";
require "functions.php";

$dao = new usuarioDAO();
$cargos = $dao->listCargos(); // lista todos os cargos

if (isset($_POST['cadastrar'])) {
    $cadastro = $dao->cadastrar($_POST);

    if ($cadastro === "OK") {
        alert("success", "Cadastrado", "Usuario cadastrado");
    }

    if ($cadastro === "EMAIL_EXISTE") {
        alert("error", "Ja existe", "Usuario ja existe");
    }

    if ($cadastro === "ERRO") {
        alert("error", "ERRO", "ERRO FATAL");
    }
}

require_once "cabeçalho.php";
?>

<body>

    <div class="container">
        <div class="col"
            style="margin: auto; width: 450px; margin-top: 15%; border: 1px solid rgb(146, 141, 141);
                   border-radius: 25px; background-color: rgb(146, 146, 146);">

            <form class="row g-3 p-5" method="POST">

           
                <div class="col-12">
                    <label for="login" class="form-label">Login</label>
                    <input type="text" class="form-control" name="login" id="login" placeholder="Seu nome / login">
                </div>

           
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>

            
                <div class="col-md-6">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" name="senha" id="senha">
                </div>

            
                <div class="col-md-4">
                    <label for="cargos" class="form-label">Cargo</label>
                    <select name="cargo" id="cargos" class="form-select">
                        <?php foreach ($cargos as $cargo): ?>
                            <option value="<?= $cargo['id'] ?>">
                                <?= $cargo['nome_cargo'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

            
                <div class="col-12">
                    <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
                </div>

            </form>

        </div>
    </div>

</body>

</html>

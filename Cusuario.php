<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "usuario.php";
require "usuarioDAO.php";
require "functions.php";

$dao = new usuarioDAO();
$cargos = $dao->listCargos();

if (isset($_POST['cadastrar'])) {

    $obj = new usuario();

    $obj->nome = $_POST['login'];
    $obj->email = $_POST['email'];
    $obj->cargo = $_POST['cargo'];
    $obj->senha = $_POST['senha'];
    $obj->cpf = $_POST['cpf'];

    $cadastro = $dao->cadastrar($obj);

    if ($cadastro === "OK") {
        alert("success", "Cadastrado", "Usuario cadastrado");
    }

    if ($cadastro === "CPF_EXISTE") {
        alert("error", "Ja existe", "Usuario ja existe");
    }

    if ($cadastro === "ERRO") {
        alert("error", "ERRO", "ERRO FATAL");
    }
}

require_once "cabeçalho.php";



?>
<style>
    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('/img/fundologin.jpg') no-repeat center center;
        background-size: cover;
        filter: blur(32px);
        transform: scale(1.1);
        z-index: -2;
    }

    .login-wrapper {
        min-height: 80vh;
        padding: 20px;
    }

    .login-card {
        width: 520px;
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: white;
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.5);
    }

    .modern-input {
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.25);
        color: white;
        border-radius: 10px;
    }

    .modern-input:focus {
        border-color: #ff3d3d;
        box-shadow: 0 0 10px rgba(255, 0, 0, 0.6);
    }

    .btn-modern {
        background: linear-gradient(45deg, #ff1e1e, #7a0000);
        border: none;
        padding: 12px;
        font-size: 18px;
        border-radius: 12px;
        color: white;
        transition: 0.2s;
    }

    .btn-modern:hover {
        transform: scale(1.04);
        box-shadow: 0 0 15px rgba(255, 0, 0, 0.65);
    }

    label.form-label {
        color: #fff;
    }

    .form-text {
        color: rgba(255, 255, 255, 0.8);
    }
</style>

<body>

    <div class="login-wrapper d-flex justify-content-center align-items-center">
        <div class="login-card p-4">
            <form method="POST">
                <h2 class="text-center mb-3">Cadastro de Usuário</h2>

                <div class="mb-3">
                    <label class="form-label">Nome de usuário</label>
                    <input type="text" class="form-control modern-input" name="login" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control modern-input" name="email" required>
                </div>
                 <div class="mb-3">
                    <label class="form-label">Cpf</label>
                    <input type="text" class="form-control modern-input" name="cpf" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cargo</label>
                    <select name="cargo" class="form-select modern-input" required style="color: black;">
                        <option value="">-- Selecione --</option>
                        <?php foreach ($cargos as $cargo): ?>
                            <option value="<?= $cargo['id'] ?>">
                                <?= $cargo['nome_cargo'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>


                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" class="form-control modern-input" name="senha" required>
                </div>

                <button type="submit" name="cadastrar" class="btn btn-modern w-100 mt-3">Cadastrar</button>

            </form>
        </div>
    </div>

</body>

</html>
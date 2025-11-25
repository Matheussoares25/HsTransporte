<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "motorista.php";
require "motoristaDAO.php";
require "functions.php";


if (isset($_POST['entrar'])) {

    $dao = new motoristaDAO();

    $obj = new motorista();
    $obj->cpf = $_POST['cpf'];
    $obj->senha = $_POST['senha'];

    $login = $dao->verificar($obj);

    if ($login === "NAO_EXISTE") {

        alert("error", "Erro", "Motorista não cadastrado");

    } elseif ($login === true) {

        header("Location: sistema_motor.php");
        exit;

    } else {

        alert("error", "Erro", "SENHA INCORRETA");

    }
}




?>
<?php
require_once "cabeçalho.php"
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
        width: 420px;
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
</style>

<body>




    <div class="login-wrapper d-flex justify-content-center align-items-center">
        <div class="login-card p-5">
            <form method="POST">
                <h2 class="text-center mb-4">Entrar</h2>

                <div class="mb-3">
                    <label class="form-label">Cpf</label>
                    <input type="text" class="form-control modern-input" name="cpf" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" class="form-control modern-input" name="senha" required>
                </div>

                <button type="submit" name="entrar" class="btn btn-modern w-100 mt-3">
                    Entrar Como motorista
                </button>
            </form>
        </div>
    </div>


</body>

</html>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "cabeçalho.php";
require_once "motoristaDAO.php";
require_once "functions.php";
require_once "motorista.php";


$dao = new motoristaDAO();
$motorista = $dao->listar();

if (isset($_POST['cadastrar'])) {

    $obj = new motorista();

    $obj->nome = $_POST['nome'];
    $obj->senha = $_POST['senha'];
    $obj->cpf = $_POST['cpf'];
    $obj->tel = $_POST['tel'];
    $obj->idade = $_POST['idade'];
    $obj->endereco = $_POST['endereco'];
    $obj->cnh = $_POST['cnh'];

    $retorno = $dao->cadastrar($obj);

    if ($retorno) {

        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "<div class='alert alert-danger'>Erro ao cadastrar motorista.</div>";
    }
}
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">



<div class="container " style="margin-top:10%">
    <div class="container text-center">
        <div class="row">
            <div class="col text-center">
                <h3>Motoristas Cadastrados</h3>
                =
                <table class="table table table-striped " name="motoristas" id="motoristas" style="margin-top: 15%">

                    <thead>
                        <tr>

                            <th>Motorista</th>
                            <th>Telefone</th>
                            <th>Cnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($motorista as $m): ?>
                            <tr>
                                <td><?= $m['nome_motor'] ?></td>
                                <td><?= $m['tel_motor'] ?></td>
                                <td><?= $m['cnh_motor'] ?></td>
                                <td><Button type="submit" name="editar"> <i class='fa-solid fa-pen'></i></Button></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

     
<style>
    .login-card {
    width: 900px;
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    border: 1px solid rgba(255,255,255,0.15);
    color: black;
    box-shadow: 0 0 2px rgba(0,0,0,0.5);
    margin-top: 10%;
}
.modern-input {
    background: rgba(255,255,255,0.15);
    border: 1px solid rgba(0, 0, 0, 0.25);
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
</style>

                <div class="login-wrapper d-flex justify-content-center align-items-center">
                    <div class="login-card p-5">
                        <form class="row g-3 p-5" method="POST">
                            <div class="col-12">
                                <label for="nome" class="form-label">Cadastro Motorista</label>
                                <input type="text" class="form-control" name="nome" id="nome"
                                    placeholder="Seu nome / login" required>
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>

                            <div class="col-md-6">
                                <label for="cnh" class="form-label">CNH</label>
                                <input type="text" class="form-control" name="cnh" id="cnh" required>
                            </div>

                            <div class="col-md-6">
                                <label for="cpf" class="form-label">CPF</label>
                                <input type="text" class="form-control" name="cpf" id="cpf" required>
                            </div>

                            <div class="col-md-6">
                                <label for="tel" class="form-label">Telefone</label>
                                <input type="text" class="form-control" name="tel" id="tel" required>
                            </div>

                            <div class="col-md-6">
                                <label for="endereco" class="form-label">Endereço</label>
                                <input type="text" class="form-control" name="endereco" id="endereco" required>
                            </div>

                            <div class="col-md-6">
                                <label for="idade" class="form-label">Idade</label>
                                <input type="text" class="form-control" name="idade" id="idade" required>
                            </div>

                            <div class="col-md-6">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" class="form-control" name="senha" id="senha" required>
                            </div>

                            <div class="col-12">
                                <button type="submit" name="cadastrar" class="btn btn-modern w-100 mt-3">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
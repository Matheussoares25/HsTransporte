<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "cabeçalho.php";
require_once "motoristaDAO.php";
require_once "functions.php";
require_once "motorista.php";


$dao = new motoristaDAO();
$motorista = $dao->listar();
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">



<div class="container">
    <div class="container text-center">
        <div class="row">
            <div class="col text-center" style="margin-top:15%">
                <h3>Motoristas Cadastrados</h3>

                <table class="table table table-striped " name="motoristas" id="motoristas" style="margin-top: 15%">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Motorista</th>
                            <th>Telefone</th>
                            <th>Cnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($motorista as $m): ?>
                            <tr>
                                <td><?= $m['id'] ?></td>
                                <td><?= $m['nome_motor'] ?></td>
                                <td><?= $m['tel_motor'] ?></td>
                                <td><?= $m['cnh_motor'] ?></td>
                                <td><Button> <i class='fa-solid fa-pen'></i></Button></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col">
                Column
            </div>
        </div>
    </div>
</div>
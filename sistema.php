<?php

require_once "cabeçalho.php";

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
    .carousel-item img {
        height: 250px;
        width: 100%;
        object-fit: cover;
    }
</style>

<div class="container-fluid">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/1.png" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="img/2.png" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="img/3.png" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="img/4.png" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="img/5.png" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="img/6.png" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="img/7.png" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="img/8.png" class="d-block w-100">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>



    <div class="offcanvas offcanvas-end" tabindex="-1" id="MenuOption" aria-labelledby="MenuOption"
        style="background: linear-gradient(145deg, #000000ff, #0f0f0fff);color:white;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Mais opções</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="list-group gap-4 text-white">
                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                    Novo frete
                </a>
                <a href="Lmotorista.php" class="list-group-item list-group-item-action">Motoristas</a>
                <a href="#" class="list-group-item list-group-item-action">Veiculos</a>
                <a href="#" class="list-group-item list-group-item-action">Usuarios e login</a>
                <a href="#" class="list-group-item list-group-item-action">A disabled link item</a>
            </div>
        </div>
    </div>


    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel"
        style="background: linear-gradient(145deg, #000000ff, #8d8d8d);color:white;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Simular Frete</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Env</span>
                <input class="form-control" type="text" placeholder="Endereço Envio"
                    aria-label="Disabled input example">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Dest</span>
                <input class="form-control" type="text" placeholder="Endereço Recebimento"
                    aria-label="Disabled input example">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <span class="input-group-text">0.00</span>
                <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)"
                    placeholder="Valor por km">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">kg</span>
                <span class="input-group-text">0.00</span>
                <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)"
                    placeholder="Peso Carga">
            </div>
            <button class="card-opcao" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
                Simular</button>







        </div>
    </div>


    <div class="container text-center" style="margin-top: 10%">

        <style>
            .card-opcao {
                background: linear-gradient(145deg, #cd0f0fff, #8d8d8d);
                padding: 35px;
                border-radius: 18px;
                color: white;
                width: 100%;
                font-size: 1.4rem;
                font-weight: 800;
                border: none;
                box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.15);
                transition: 0.3s ease;
                cursor: pointer;
            }

            .card-opcao:hover {
                transform: translateY(-6px);
                box-shadow: 0px 12px 30px rgba(0, 0, 0, 0.35);
            }
        </style>

        <div class="row g-4">

            <div class="col-md-6">
                <button class="card-opcao" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">Nova
                    Simulação</button>
            </div>

            <div class="col-md-6">
                <button class="card-opcao">Novo Frete</button>
            </div>

            <div class="col-md-6">
                <button class="card-opcao">Consultar Fretes</button>
            </div>
            <div class="col-md-6">
                <button class="card-opcao" data-bs-toggle="offcanvas" data-bs-target="#MenuOption">Mais</button>

            </div>

        </div>
    </div>


</div>
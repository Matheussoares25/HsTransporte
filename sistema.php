<?php

require_once "cabeçalho.php";

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
    .carousel-item img {
        height: 450px;
        width: 100%;
        object-fit: cover;
    }
</style>

<div class="container-fluid">
    <!-- <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
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
    </div> -->



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

    
<style>
    body {
    margin: 0;
    font-family: Arial, sans-serif;
    position: relative;
    overflow-x: hidden;
}


    body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('/img/57b233de040bce12c9b4d7d9dedbcfc4.jpg') 
        no-repeat center center;
    background-size: cover;
    filter: blur(10px);            
    transform: scale(1.1);         
    z-index: -2;
}

    .card-tech {
        background: #ad1111ff; 
        padding: 40px 25px;
        border-radius: 20px;
        border: 2px solid #000000ff;
        transition: .3s ease;
        height: 100%;
    
    }

    .card-tech:hover {
        box-shadow: 0 0 25px rgba(90, 15, 15, 0.9);
        transform: translateY(-2px);
    }

    .card-tech h3 {
        color: white;
        font-size: 22px;
        font-weight: 700;
    }

    .card-tech h3 span {
        color: #f8ae38ff;
    }

    .card-tech p {
        color: #ffffffff;
        font-size: 15px;
        margin-top: 12px;
    }

    .card-icon {
        font-size: 42px;
        margin-bottom: 18px;
        color: #38bdf8;
    }
</style>


<div class="container text-center" style="margin-top: 10%">

    <div class="row align-items-start">

        <div class="col-md-3">
            <div class="card-tech" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
                <div class="card-icon"></div>
                <h3>Nova <span>Simulação</span></h3>
                <p>Criar simulações rápidas e automatizadas para seus fretes.</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-tech">
                <div class="card-icon"></div>
                <h3>Novo <span>Frete</span></h3>
                <p>Cadastre novos fretes com agilidade e precisão.</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-tech">
                <div class="card-icon"></div>
                <h3>Consultar <span>Fretes</span></h3>
                <p>Acesse seu histórico completo de fretes cadastrados.</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-tech" data-bs-toggle="offcanvas" data-bs-target="#MenuOption">
                <div class="card-icon"></div>
                <h3>Mais <span>Opções</span></h3>
                <p>Acessar configurações e funcionalidades adicionais.</p>
            </div>
        </div>

    </div>

</div>


</div>
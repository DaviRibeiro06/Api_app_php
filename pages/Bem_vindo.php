<?php
    include_once("../conexao.php");

    $dados = array();

    $query = $pdo->query('SELECT * FROM usuario');
    $res = $query->fetchAll(PDO::FETCH_ASSOC);

   

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>DooMês - Gerenciamento</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/style5.css">


    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <style>
        body {
            overflow: hidden;
        }
        /* ini: Preloader */
        
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #F27620;
            /* cor do background que vai ocupar o body */
            z-index: 999;
            /* z-index para jogar para frente e sobrepor tudo */
        }
        
        #preloader .inner {
            position: absolute;
            top: 50%;
            /* centralizar a parte interna do preload (onde fica a animação)*/
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
        .bolas>div {
            display: inline-block;
            background-color: #fff;
            width: 25px;
            height: 25px;
            border-radius: 100%;
            margin: 3px;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
            animation-name: animarBola;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
        }
        
        .bolas>div:nth-child(1) {
            animation-duration: 0.75s;
            animation-delay: 0;
        }
        
        .bolas>div:nth-child(2) {
            animation-duration: 0.75s;
            animation-delay: 0.12s;
        }
        
        .bolas>div:nth-child(3) {
            animation-duration: 0.75s;
            animation-delay: 0.24s;
        }
        
        @keyframes animarBola {
            0% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 1;
            }
            16% {
                -webkit-transform: scale(0.1);
                transform: scale(0.1);
                opacity: 0.7;
            }
            33% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 1;
            }
        }
        /* end: Preloader */
    </style>
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>DooMês</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Menu DooMês</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="../pages/Bem_vindo.html">Inicio</a>
                        </li>
                        <!-- <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li> -->
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="../pages/cadastrar_produto.html">Cadastrar Produto</a>
                        </li>
                        <li>
                            <a href="../pages/pedidos.php">Pedidos</a>
                        </li>
                        <li>
                            <a href="../pages/produtos_cadastrados.php">Produtos Cadastrados</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>


        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <center>
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem; display: inline-block;">
                    <div class="card-header">Pedidos <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                      </svg></div>
                    <a href="../pages/pedidos.php">
                        <div class="card-body">
                            <h5 class="card-title">Pedidos dos usuarios</h5>

                        </div>
                    </a>
                </div>

                <div class="card text-white bg-success mb-3" style="max-width: 18rem; display: inline-block;">
                    <div class="card-header">Cadastrar Produto <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                      </svg></i>
                    </div>
                    <a href="../pages/cadastrar_produto.html">
                        <div class="card-body">
                            <h5 class="card-title">Cadastro de Produto</h5>

                        </div>
                    </a>
                </div>

                <div class="card text-white bg-danger mb-3" style="max-width: 18rem; display: inline-block; ">
                    <div class="card-header">Produtos <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
                        <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"/>
                      </svg></div>
                    <a href="../pages/produtos_cadastrados.php">
                        <div class="card-body">
                            <h5 class="card-title">Produtos Cadastrados</h5>

                        </div>
                    </a>
                </div>
            </center>

            <div class="line"></div>

            <h2>Clientes</h2>
            <table class="table">
                        
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                        </tr>
                        <tr>
                            <?php
                    foreach($res as $ress){
                  ?>
                        <tr>
                            <th>
                                <?php echo $ress['id'] ?>
                            </th>
                            <th>
                                <?php echo $ress['email']?>
                            </th>    
                        </tr>
                        </tr>
                        <?php
                    }
                ?>
                    </table>
        </div>


        <!-- jQuery CDN - Slim version (=without AJAX) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#sidebarCollapse').on('click', function() {
                    $('#sidebar').toggleClass('active');
                    $(this).toggleClass('active');
                });
            });
        </script>
</body>

</html>
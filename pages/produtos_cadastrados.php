<?php
    include_once("../conexao.php");

    $dados = array();

    $query = $pdo->query('SELECT * FROM produtos');
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
                                <a href="../pages/Bem_vindo.php">Inicio</a>
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
                                <a href="#">Produtos Cadastrados</a>
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
                <div >
                    <h1 style="text-align: center;">Produtos Cadastrados</h1>
                    <table class="table">
                        <tr>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th>Quantidade</th>
                            <th>Valor</th>
                            <th>ID</th>
                            <th>Ações</th>
                        </tr>
                        <tr>
                            <?php
                    foreach($res as $ress){
                  ?>
                                <tr>
                                    <th>
                                        <?php echo "<img src='../assets/$ress[imagem]' style='width='50' height='70''>"?>
                                    </th>
                                    <th>
                                        <?php echo $ress['nome']?>
                                    </th>
                                    <th>
                                        <?php echo $ress['quantidade']?>
                                    </th>
                                    <th>
                                        <?php echo "R$", $ress['valor']?>
                                    </th>
                                    <th>
                                        <?php echo $ress['produto_id']?>
                                    </th>
                                    <th>
                                    <a href="javascript: if(confirm('Tem certeza que deseja deletar esse item: <?php echo $ress['nome']?>'))
                                    location.href='../pedidos/deletar_produtos.php?p=deletar_produtos.php&usuario=<?php echo $ress['produto_id'];?>'; ">Deletar</a>                                      
                                    <a href="">Editar</a>
                                    </th>
                                </tr>
                        </tr>
                        <?php
                    }
                ?>
                    </table>
                </div>


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
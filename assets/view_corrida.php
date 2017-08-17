<?php

use Remo\Model\classes\Sessao;

require("../vendor/autoload.php");

new Sessao();

if(Sessao::getValue('login') == true) {


    ?>

    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Área Administrativa</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="css/bootstrap.css" rel="stylesheet"/>
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet"/>
        <!-- CUSTOM STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet"/>
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    </head>
    <body>
    <div id="wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top">

            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span class="logout-spn">
                                        <a style="color: #fff" ; href="../index.php">Início</a>
                                    </span>

                </div>


                <span class="logout-spn">
                                    <a href="../Remo/Model/logout.php" style="color:#fff;">Sair</a>

                                </span>
                <span class="logout-spn">
                                    <a target="_blank" href="/Remo-runners2/index.php" style="color:#fff;">Ir para Página</a>

                                </span>

            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">


                    <li class="active-link">
                        <a href="../index.php"><i class="fa fa-desktop "></i>Painel Geral</a>
                    </li>


                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>ADMIN DASHBOARD</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                            <strong>Seja bem-vindo <?= Sessao::getValue('nome') ?></strong>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <?php
                        if (Sessao::getValue('atualizou')) {
                            ?>
                            <h3>Atualizado</h3>
                            <?
                        }

                        Sessao::freeSessionOne('atualizou');
                        ?>


                        <?php
                        if (Sessao::getValue("login_existente") && Sessao::getValue('alterar_cadastro')) {

                            ?>

                            <h3 class="alert-danger">Não é possível alterar o cadastro</h3>
                            <h3 class="alert-danger">O login já existe</h3>
                            <?php
                        } else if (Sessao::getValue('alterar_cadastro')) {
                            ?>
                            <h3 class="alert-success">Cadastro alterado com sucesso</h3>
                            <?php
                        }

                        Sessao::freeSessionOne('login_existente');
                        Sessao::freeSessionOne('alterar_cadastro');

                        ?>
                    </div>
                </div>

                <!-- /. ROW  -->
                <div class="row text-center pad-top">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="pages/corridas/cadastra_corridas.php">
                                <i class="fa fa-plus-square fa-5x"></i>
                                <h4>Cadastrar Corrida</h4>
                            </a>
                        </div>

                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="pages/corridas/corridas.php">
                                <i class="fa fa-edit fa-5x"></i>
                                <h4>Alterar Corrida</h4>
                            </a>
                        </div>

                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="pages/corridas/despublicar_corrida.php">
                                <i class="fa fa-eraser fa-5x"></i>
                                <h4>Despublicar Corrida</h4>
                            </a>
                        </div>

                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="pages/corridas/excluir_corridas.php">
                                <i class="fa fa-trash fa-5x"></i>
                                <h4>Excluir Corrida</h4>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>
    <div class="footer">
        <img src="../assets/img/publicacoes/b2690f9084c2cfd39597eaa496cb3120.jpg">

        <div class="row">

        </div>
    </div>


    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


    </body>
    </html>

    <?
}else{
    header('Location: ../index.php');
}
?>



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

                    </div>
                </div>

                <!-- /. ROW  -->
                <div class="row text-center pad-top">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="view_publicacao.php">
                                <i class="fa fa-bookmark fa-5x"></i>
                                <h4>Publicação</h4>
                            </a>
                        </div>

                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="view_administrador.php">
                                <i class="fa fa-user fa-5x"></i>
                                <h4>Administrador</h4>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="view_banner.php">
                                <i class="fa fa-image fa-5x"></i>
                                <h4>Banner</h4>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="view_membro.php">
                                <i class="fa fa-male fa-5x"></i>
                                <h4>Membros</h4>
                            </a>
                        </div>

                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="view_corrida.php">
                                <i class="fa fa-road fa-5x"></i>
                                <h4>Corridas</h4>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href='view_parceiros.php'>
                                <i class="fa fa-handshake-o fa-5x"></i>
                                <h4>Parceiros</h4>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="#">
                                <i class="fa fa-bolt fa-5x"></i>
                                <h4>Treinos</h4>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="view_contato.php">
                                <i class="fa fa-comments fa-5x"></i>
                                <h4>Mensagens</h4>
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
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


    </body>
    </html>

    <?php
}else{
    header('Location: ../index.php');
}
?>



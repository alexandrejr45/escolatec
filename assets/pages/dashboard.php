<?php
session_start();

if(isset($_SESSION['login'])) {

    ?>


    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Área Administrativa</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="../css/bootstrap.css" rel="stylesheet"/>
        <!-- FONTAWESOME STYLES-->
        <link href="../css/font-awesome.css" rel="stylesheet"/>
        <!-- CUSTOM STYLES-->
        <link href="../css/custom.css" rel="stylesheet"/>
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
                                    <a style="color: #fff" href="../../index.php">Início</a>
                                </span>

                </div>


                <span class="logout-spn">
                                <a href="../../model/usuario/usuario_deslogar.php" style="color:#fff;">Sair</a>

                            </span>
                <span class="logout-spn">
                                <a target="_blank" href="#" style="color:#fff;">Ir para Página</a>

                            </span>

            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">


                    <li class="active-link">
                        <a href="../../index.php"><i class="fa fa-desktop "></i>Painel Geral</a>
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
                            <strong>Seja bem-vindo <? echo $_SESSION['usuario_nome']?></strong>
                        </div>

                    </div>
                </div>

                <!-- /. ROW  -->
                <div class="row text-center pad-top">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <div class="div-square">
                            <a href="usuario/usuario.php">
                                <i class="fa fa-edit fa-5x"></i>
                                <h4>Alterar Cadastro</h4>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <div class="div-square">
                            <a href="usuario/deletar.php">
                                <i class="fa fa-trash fa-5x"></i>
                                <h4>Excluir Cadastro</h4>
                            </a>
                        </div>
                    </div>

                    <?php
                        if(isset($_SESSION['professor'])){
                            ?>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="div-square">
                                    <a href="aluno/aluno_dashboard.php">
                                        <i class="fa fa-user-circle fa-5x"></i>
                                        <h4>Alunos</h4>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="div-square">
                                    <a href="turma/turma_dashboard.php">
                                        <i class="fa fa-users fa-5x"></i>
                                        <h4>Turmas</h4>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="div-square">
                                    <a href="disciplina/disciplina_dashboard.php">
                                        <i class="fa fa-address-book fa-5x"></i>
                                        <h4>Disciplinas</h4>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="div-square">
                                    <a href="aula/aula_dashboard.php">
                                        <i class="fa fa-address-card fa-5x"></i>
                                        <h4>Aulas</h4>
                                    </a>
                                </div>
                            </div>


                            <?php

                        }else if(isset($_SESSION['responsavel'])){
                            ?>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="div-square">
                                    <a href="usuario/alunos_responsavel.php">
                                        <i class="fa fa-trash fa-5x"></i>
                                        <h4>Verificar Alunos</h4>
                                    </a>
                                </div>
                            </div>


                            <?
                        }
                    ?>

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

        <div class="row">

        </div>
    </div>


    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../js/custom.js"></script>


    </body>
    </html>

    <?
}else{
    header('Location: ../../index.php');
}
    ?>
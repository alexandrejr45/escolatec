<?php
session_start();

if(isset($_SESSION['login'])) {

    require_once('../../../model/disciplina/disciplina_view.php');

    ?>

    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta charset="utf-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <title>Área Administrativa</title>
            <!-- BOOTSTRAP STYLES-->
            <link href="../../css/bootstrap.css" rel="stylesheet"/>
            <!-- FONTAWESOME STYLES-->
            <link href="../../css/font-awesome.css" rel="stylesheet"/>
            <!-- CUSTOM STYLES-->
            <link href="../../css/custom.css" rel="stylesheet"/>
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
                                    <a style="color: #fff" href="../../../index.php">Início</a>
                                </span>

                    </div>


                    <span class="logout-spn">
                                    <a href="../../../model/usuario/usuario_deslogar.php" style="color:#fff;">Sair</a>

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
                            <a href="../../../index.php"><i class="fa fa-desktop "></i>Painel Geral</a>
                        </li>


                    </ul>
                </div>

            </nav>
            <!-- /. NAV SIDE  -->
            <div id="page-wrapper">
                <div id="page-inner">
                    <div class="container">
                        <div class="row">

                            <h2>Cadastro da Aula</h2>

                            <?php
                            if(isset($_SESSION['aula_cadastrada'])){
                                ?>

                                <h2 class="alert-success">Aula cadastrada com sucesso</h2>

                                <?php
                            }else if(isset($_SESSION['aula_falhou'])){
                                ?>

                                <h2 class="alert-danger">Falha no cadastro da Aula</h2>

                                <?php
                            }

                            unset($_SESSION['aula_cadastrada']);
                            unset($_SESSION['aula_falhou']);
                            ?>


                            <form action="../../../model/aula/aula_cadastrar.php" method="post">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <label style="font-size: 20px">Nome
                                            <input name="nome" class="form-control" type="text" required>
                                        </label>

                                    </div>
                                </div>

                               <label style="font-size: 20px; margin-top: 30px;">

                                   Disciplinas

                                   <?php
                                        retornaDisciplinaOpcoes();
                                   ?>

                               </label>


                                <div class="botao" style="margin-top: 40px;">
                                    <input style="font-size: 20px;" type="submit" class="btn btn-primary" value="Cadastrar">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
        <div class="footer">
            <div class="row">

            </div>
        </div>


        <!-- /. WRAPPER  -->
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- JQUERY SCRIPTS -->
        <script src="../../js/jquery-3.2.1.min.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="../../js/bootstrap.min.js"></script>
        <!-- CUSTOM SCRIPTS -->
        <script src="../../js/custom.js"></script>


        </body>
    </html>

    <?
}else{
    header('Location: ../../../index.php');
}
?>
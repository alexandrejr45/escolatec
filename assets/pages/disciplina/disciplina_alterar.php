<?php
session_start();


if(isset($_SESSION['login'])) {

    require_once ('../../../model/disciplina/disciplina_view.php');

    $id = $_POST['id'];

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
                                <h2>Alteração da Disciplina</h2>


                                <div class="col-lg-12">

                                    <form style="margin-top: 30px" action="../../../model/disciplina/disciplina_alterar.php" method="post">


                                        <input type="hidden" value="<?=$id?>" name="id">


                                        <div class="col-lg-3">
                                            <label style="font-size: 20px">Nome <input style="font-size: 20px" type="text" value="<? echo retornaDadosDisciplina($id, 0)?>" name="nome" class="form-control"></label>

                                        </div>


                                        <label style="font-size: 20px">Conteúdo<textarea style="font-size: 18px; width: 400px; height: 250px" class="form-control" name="conteudo"><? echo retornaDadosDisciplina($id, 1)?></textarea></label>


                                        <div class="botao" style="margin-top: 40px;">
                                            <input style="font-size: 20px;" type="submit" class="btn btn-primary" value="Alterar">
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
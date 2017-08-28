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
                                <?php
                                    if(isset($_SESSION['turma_cadastrada'])){
                                        ?>

                                        <h2 class="alert-success">Turma cadastrada com sucesso</h2>

                                        <?php
                                    }else if(isset($_SESSION['turma_erro'])){
                                        ?>

                                        <h2 class="alert-danger">Falha no cadastro da Turma</h2>

                                        <?php
                                    }

                                    unset($_SESSION['turma_cadastrada']);
                                    unset($_SESSION['turma_erro']);
                                ?>

                                <h2>Cadastro de Turmas</h2>

                                <div class="col-lg-12">

                                    <form style="margin-top: 30px" action="../../../model/turma/turma_cadastrar.php" method="post">
                                        <label style="font-size: 20px">Nome
                                            <input name="nome" class="form-control" type="text" required>
                                        </label>

                                        <div style="margin-top: 15px">
                                            <label style="font-size: 20px">
                                                Categoria

                                                <select name="categoria" required>
                                                    <option value="manha">Manhã</option>
                                                    <option value="tarde">Tarde</option>
                                                </select>

                                            </label>

                                        </div>

                                        <label style="font-size: 20px; margin-top: 15px;">
                                            Ano
                                            <select name="ano" required>
                                                <option value="1º ano">1º ano</option>
                                                <option value="2º ano">2º ano</option>
                                                <option value="3º ano">3º ano</option>
                                                <option value="4º ano">4º ano</option>
                                                <option value="5º ano">5º ano</option>
                                                <option value="6 ºano">6 ºano</option>
                                                <option value="7º ano">7º ano</option>
                                                <option value="8º ano">8º ano</option>
                                                <option value="9º ano">9º ano</option>
                                                <option value="1º ano E.Médio">1º ano Ensino Médio</option>
                                                <option value="2º ano E.Médio">2º ano Ensino Médio</option>
                                                <option value="3º ano E.Médio">3º ano Ensino Médio</option>
                                            </select>
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
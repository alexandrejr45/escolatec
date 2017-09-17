<?php
session_start();



if(isset($_SESSION['login'])) {

    $id_pagina = filter_input(INPUT_GET, 'pagina', FILTER_VALIDATE_INT);

    require_once ('../../../model/aluno/aluno_view.php');
    require_once ('../../../model/aluno/aluno_bd.php');

    $total = totalAlunos();

    $alunos = 5;

    $num_paginas = ceil($total/$alunos);

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
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Nome</td>
                                            <td>Sobrenome</td>
                                            <td>Matricula</td>
                                            <td>Turma</td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                        $offset = $alunos * $id_pagina;

                                        retornaAlunos('alterar', $offset, $alunos);
                                    ?>
                                    </tbody>
                                </table>
                            </div>

                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="alunos.php?pagina=0">Anterior</a></li>
                                    <?php
                                        for($i = 0; $i < $num_paginas; $i++) {
                                            $estilo = '';

                                            if($id_pagina == $i){

                                              $estilo = "active";
                                            }

                                         ?>
                                            <li class="page-item <?echo $estilo?>"><a href="alunos.php?pagina=<?echo $i?>"><?echo $i + 1?></a></li>
                                            <?
                                        }
                                    ?>

                                    <li class="page-item"><a class="page-link" href="alunos.php?pagina=<?echo $id_pagina + 1?>">Próxima</a></li>
                                </ul>
                            </nav>

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
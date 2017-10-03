<?php session_start();


if(isset($_SESSION['login'])) {
    require_once ('../../../model/usuario/usuario_view.php');

    $id = $_SESSION['id_usuario'];

    $valores = retornaDados();
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
                        <div class="col-lg-12">
                            <h1 style= "text-align: center">Cadastro</h1>

                            <?php
                                if(isset($_SESSION['alterou'])) {

                                    ?>
                                    <h3 class="alert-success">Cadastro alterado</h3>

                                    <?php
                                }else if(isset($_SESSION['inalterado'])) {

                                    ?>
                                    <h3 class="alert-danger">Falha na alteração</h3>

                                    <?php
                                }
                                    ?>
                            <form action="../../../model/usuario/usuario_alterar.php" method="post" style="margin-top: 30px">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Nome<input class="form-control" name="nome" value="<?php echo "$valores[nome]"?>" type="text" required></label>
                                        <label>Sobrenome<input class="form-control" name="sobrenome" value="<?php echo "$valores[sobrenome]"?>" type="text" required></label>
                                        <label>Email <input class="form-control" name="email" value="<?php echo "$valores[email]"?>" type="email" required></label>
                                        <label>Senha <input class="form-control" name="senha" value="<?php echo "$valores[senha]"?>" type="password"  required></label>
                                        <label>Data de Nascimento<input class="form-control" name="data_nascimento" value="<?php echo "$valores[data_nascimento]"?>" type="date" required></label>
                                    </div>

                                    <div class="col-lg-4">
                                        <?php
                                            if($valores['tipo'] == 'P'){
                                                ?>
                                                <h4>Status atual: Professor</h4>
                                                <?php
                                            }else if($valores['tipo'] == 'R'){
                                                ?>
                                                <h4>Status atual: Responsável</h4>
                                                <?
                                            }
                                        ?>
                                        <label>Professor<input class="checkbox" name="tipo" value="P" type="radio" required></label>
                                        <label>Responsável<input class="checkbox" name="tipo" value="R" type="radio" required></label>
                                        <label>Telefone<input class="form-control" name="telefone" value="<?php echo "$valores[telefone]"?>" type="number" required></label>
                                        <label>Endereço <input class="form-control" name="endereco" value="<?php echo "$valores[endereco]"?>" type="text" required></label>
                                        <label>Cidade <input class="form-control" name="cidade" value="<?php echo "$valores[cidade]"?>" type="text" required></label>
                                        <label>CPF <input class="form-control" name="cpf" value="<?php echo "$valores[cpf]"?>" type="number" maxlength="9" required></label>
                                        <label>CEP <input class="form-control" name="cep" value="<?php echo "$valores[cep]"?>" type="number" required></label>
                                    </div>

                                    <input type="hidden" value="<?=$id?>" name="id">
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <input class="btn btn-primary" type="submit" value="Alterar">
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
            <div class="footer">
                <img src="../img/publicacoes/b2690f9084c2cfd39597eaa496cb3120.jpg">

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
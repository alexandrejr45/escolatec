<?php
session_start();


if(isset($_SESSION['login'])){

  
    header('Location: assets/pages/usuario/dashboard.php');
}else {

    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Escolatec</title>
        <link type="text/css" rel="stylesheet" href="assets/style.css">
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/bootstrap/css/bootstrap.css.map" rel="stylesheet">
        <link href="assets/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
        <link href="assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="assets/bootstrap/css/bootstrap-theme.min.css.map" rel="stylesheet">
        <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="assets/bootstrap/css/bootstrap.min.css.map" rel="stylesheet">
        <link href="assets/bootstrap/css/bootstrap.min.css.map" rel="stylesheet">
        <link href="assets/bootstrap/css/bootstrap.min.css.map" rel="stylesheet">
        <link href="assets/bootstrap/css/bootstrap.min.css.map" rel="stylesheet">
        <link href="assets/bootstrap/css/bootstrap.min.css.map" rel="stylesheet">
        <link href="assets/bootstrap/css/bootstrap-theme.css.map" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="script" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>

    <div class="img-login"
         style="background: url(assets/img/school.jpg) no-repeat center center; background-size: cover;height: 662px">
        <div class="container">
            <div class="row">
                <div class="col-md-6 borda-login col-md-offset-3">
                    <h2 style="text-align: center">Sua conta</h2>

                    <?php
                        if(isset($_SESSION['login_falha'])){
                            ?>
                            <p style="font-family: 'Helvetica', sans-serif; font-size: 20px; color: #fff6dc">Login Inválido</p>

                            <?
                        }

                        unset($_SESSION['login_falha']);
                    ?>

                    <form action="model/usuario/usuario_conexao.php" method="post">
                        <div class="form-group" style="margin-top: 4em">
                            <label style="letter-spacing: 5px;"> Login:</label>
                            <input name="email" type="text" class="form-control" style="font-family: Georgia,sans-serif"
                                   placeholder="digite seu login">
                        </div>
                        <div class="form-group" style="margin-top: 4em">
                            <label style="letter-spacing: 5px;"> Senha:</label>
                            <input name="senha" type="password" class="form-control"
                                   style="font-family: Georgia,sans-serif"
                                   placeholder="digite sua senha">
                        </div>
                        <div class="col-md-10" style="left: 3em">
                            <label class="col-md-6 input">
                                <input type="radio" name="tipo" value="R" required>Sou Responsavel
                            </label>

                            <label class="col-md-6 input">
                                <input type="radio" name="tipo" value="P" required>Sou professor
                            </label>
                        </div>

                        <div class="col-md-4 col-md-offset-2" style="top: 1.4em">
                            <button type="submit" class="btn btn-default color-button" value="Sua Conta">Esqueceu sua
                                senha?
                            </button>
                        </div>

                        <div class="col-md-6 col-md-offset-8" style="bottom: 1em; margin-right: 10px">
                            <input type="submit" class="btn btn-primary" value="Entrar">
                        </div>

                        <div class="col-md-12" style="top:3em;">
                            <a href="formulario.php" style="font-family: Georgia,sans-serif; color: white"><p>Caso não
                                    seja
                                    cadastrado, clique aqui!</p></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </body>
    </html>

    <?php
}
    ?>

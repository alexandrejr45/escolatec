<?php

session_start();

if(isset($_SESSION['login'])){
    header('Location: assets/Dashboard.php');
}else {

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="assets/css/bootstrap-theme.css" type="text/css" rel="stylesheet">
        <link href="assets/css/bootstrap.css" type="text/css" rel="stylesheet">
        <link href="assets/css/bootstrap.css.map" type="text/css" rel="stylesheet">
        <link href="assets/css/bootstrap-theme.css.map" type="text/css" rel="stylesheet">
        <link href="assets/css/estilo.css" type="text/css" rel="stylesheet">
        <title>Title</title>
    </head>
    <body>
    <div class="jumbotron">
        <div class="container">
            <span><img style='margin-top: 10px' src=""></span>
            <h2>Escola Tec</h2>
            <h2>Seja bem-vindo!</h2>
            <form action="model/usuario/usuario_conexao.php" method="post">
                <h2>Login</h2>

                <div class="box">
                    <input name="email" type="email" placeholder="Login" required>
                    <input name="senha" type="password" placeholder="Senha" required>

                    <button type="submit" class="btn btn-default full-width"><span
                                class="glyphicon glyphicon-ok"></span></button>
                </div>
            </form>
        </div>
    </div>
    <script href="assets/js/bootstrap.js" type="javascript"></script>
    </body>
    </html>

    <?php
}
    ?>
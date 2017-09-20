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
        <link type="text/css" rel="stylesheet" href="assets/style_formulario.css">
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
                    <form action="model/usuario/usuario_cadastrar.php" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Nome<input style="font-family: Helvetica, sans-serif;"  class="form-control" name="nome" type="text" required></label>
                                <label>Sobrenome<input style="font-family: Helvetica, sans-serif;"  class="form-control" name="sobrenome" type="text" required></label>
                                <label>Email <input style="font-family: Helvetica, sans-serif;"  class="form-control" name="email" type="email" required></label>
                                <label>Senha <input style="font-family: Helvetica, sans-serif;"  class="form-control" name="senha" type="password"  required></label>
                                <label>Data de Nascimento<input style="font-family: Helvetica, sans-serif;"  class="form-control" name="data_nascimento" type="date" required></label>
                                <label>Professor<input style="font-family: Helvetica, sans-serif;"  class="checkbox" name="tipo" value="P" type="radio" required></label>
                            </div>

                            <div class="col-lg-6">
                                <label>Telefone<input style="font-family: Helvetica, sans-serif;"  class="form-control" name="telefone" type="number" required></label>
                                <label>Endereço <input style="font-family: Helvetica, sans-serif;"  class="form-control" name="endereco" type="text" required></label>
                                <label>Cidade <input style="font-family: Helvetica, sans-serif;"  class="form-control" name="cidade" type="text" required></label>
                                <label>CPF <input style="font-family: Helvetica, sans-serif;"  class="form-control" name="cpf" type="number" maxlength="9" required></label>
                                <label>CEP <input style="font-family: Helvetica, sans-serif;"  class="form-control" name="cep" type="number" required></label>
                                <label>Responsável<input style="font-family: Helvetica, sans-serif;"  class="checkbox" name="tipo" value="R" type="radio" required></label>
                            </div>

                            <div class="col-md-4" style="top: 1em">
                                <a href="index.php" style="font-family: Helvetica, sans-serif; font-size: 20px" class="btn btn-default">Voltar</a>

                            </div>

                            <div class="col-md-3 col-md-offset-3" style="top: 1em">
                                <input style="font-family: Helvetica, sans-serif; font-size: 20px"  type="submit" class="btn btn-default" value="Cadastrar">
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
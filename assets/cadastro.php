<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
      <link href="css/bootstrap-theme.min.css" type="text/css" rel="stylesheet">
    </head>

    <body>
        <header>
            <div class="container">
                <form action="../model/cadastro_usuario.php" method="post">
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Nome<input class="form-control" name="nome" type="text"></label>
                            <label>Sobrenome<input class="form-control" name="sobrenome" type="text"></label>
                            <label>Email <input class="form-control" name="email" type="email"></label>
                            <label>Senha <input class="form-control" name="senha" type="password"></label>
                            <label>Data de Nascimento<input class="form-control" name="data_nascimento" type="date"></label>
                        </div>

                        <div class="col-lg-4">
                            <label>Tipo <input class="form-control" name="tipo" type="text"></label>
                            <label>Telefone<input class="form-control" name="telefone" type="number"></label>
                            <label>Endereço <input class="form-control" name="endereco" type="text"></label>
                            <label>Cidade <input class="form-control" name="cidade" type="text"></label>
                            <label>CPF <input class="form-control" name="cpf" type="number"></label>
                            <label>CEP <input class="form-control" name="cep" type="number"></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <input class="btn btn-primary" type="submit" value="Cadastrar">
                        </div>
                    </div>
                </form>
            </div>
        </header>

        <section>

        </section>
    </body>
</html>





























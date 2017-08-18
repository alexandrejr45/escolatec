<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <link href="../../css/bootstrap.css" type="text/css" rel="stylesheet">
      <link href="../../css/bootstrap-theme.min.css" type="text/css" rel="stylesheet">
    </head>

    <body>
        <header>
            <div class="container">
                <form action="../../../model/usuario/usuario_cadastrar.php" method="post">
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Nome<input class="form-control" name="nome" type="text" required></label>
                            <label>Sobrenome<input class="form-control" name="sobrenome" type="text" required></label>
                            <label>Email <input class="form-control" name="email" type="email" required></label>
                            <label>Senha <input class="form-control" name="senha" type="password"  required></label>
                            <label>Data de Nascimento<input class="form-control" name="data_nascimento" type="date" required></label>
                        </div>

                        <div class="col-lg-4">
                            <label>Professor<input class="checkbox" name="tipo" value="P" type="radio" required></label>
                            <label>Responsável<input class="checkbox" name="tipo" value="R" type="radio" required></label>
                            <label>Telefone<input class="form-control" name="telefone" type="number" required></label>
                            <label>Endereço <input class="form-control" name="endereco" type="text" required></label>
                            <label>Cidade <input class="form-control" name="cidade" type="text" required></label>
                            <label>CPF <input class="form-control" name="cpf" type="number" maxlength="9" required></label>
                            <label>CEP <input class="form-control" name="cep" type="number" required></label>
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





























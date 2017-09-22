<?php

require_once ('usuario_bd.php');

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$nome = filter_input(INPUT_POST, 'nome');
$sobrenome = filter_input(INPUT_POST, 'sobrenome');
$email =  filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha');
$data_nascimento = filter_input(INPUT_POST, 'data_nascimento');
$tipo = filter_input(INPUT_POST, 'tipo');
$telefone = filter_input(INPUT_POST, 'telefone');
$endereco = filter_input(INPUT_POST, 'endereco');
$cidade = filter_input(INPUT_POST, 'cidade');
$cpf = filter_input(INPUT_POST, 'cpf');
$cep = filter_input(INPUT_POST, 'cep');

$senha_hash = selecionarSenhaHash($id);

try{

    if($senha == $senha_hash){

        $altera = alterarCadastro($id, $nome, $sobrenome, $email, $senha, $data_nascimento, $tipo, $telefone, $endereco, $cidade, $cpf, $cep);

        if($altera == true){
            $_SESSION['alterou'] = 'Usuário alterado';
            header('Location: ../../assets/pages/usuario/usuario.php');
        }else{
            $_SESSION['inalterado'] = 'Falha na alteração';
            header('Location: ../../assets/pages/usuario/usuario.php');

        }
    }else{
        $senha = password_hash($senha, PASSWORD_DEFAULT);

        $altera = alterarCadastro($id, $nome, $sobrenome, $email, $senha, $data_nascimento, $tipo, $telefone, $endereco, $cidade, $cpf, $cep);

        if($altera == true){
            $_SESSION['alterou'] = 'Usuário alterado';
            header('Location: ../../assets/pages/usuario/usuario.php');
        }else{
            $_SESSION['inalterado'] = 'Falha na alteração';
            header('Location: ../../assets/pages/usuario/usuario.php');

        }

    }



}catch (mysqli_sql_exception $e){
    echo "ERRO".$e->getMessage();
}


















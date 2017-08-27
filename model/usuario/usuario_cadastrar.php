<?php

session_start();

include('usuario_bd.php');

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


try{
    $validaUsuario = buscaUsuario($email, $cpf);

    if($validaUsuario == true){

        $_SESSION['usuario_existente'] = 'O email ou cpf já existem';
         header('Location: ../../index.php');
    }else{
        $cad = cadastrar($nome, $sobrenome, $email, $senha, $data_nascimento, $tipo, $telefone, $endereco, $cidade, $cpf, $cep);

        if($cad == true){
            $_SESSION['login'] = 'Logado';
            header('Location: ../../assets/pages/usuario/dashboard.php');

        }else{
            $_SESSION['login_falhou'] = 'Falhou';
            header('Location: ../../index.php');
        }

    }


}catch (mysqli_sql_exception $e){
    echo "ERRO".$e->getMessage();
}

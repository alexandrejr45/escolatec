<?php

require_once('usuario_bd.php');

$nome = filter_input(INPUT_POST, 'nome');
$sobrenome = filter_input(INPUT_POST, 'sobrenome');
$email =  filter_input(INPUT_POST, 'email');
$senha = filter_input(INPUT_POST, 'senha');
$data_nascimento = filter_input(INPUT_POST, 'data_nascimento');
$tipo = filter_input(INPUT_POST, 'tipo');
$telefone = filter_input(INPUT_POST, 'telefone');
$endereco = filter_input(INPUT_POST, 'endereco');
$cidade = filter_input(INPUT_POST, 'cidade');
$cpf = filter_input(INPUT_POST, 'cpf');
$cep = filter_input(INPUT_POST, 'cep');



try{
    $cad = cadastrar($nome, $sobrenome, $email, $senha, $data_nascimento, $tipo, $telefone, $endereco, $cidade, $cpf, $cep);

    if($cad){
        $_SESSION['login'] = true;

        echo 'OLÁ, MUNDOOOOO!!';
    }else{
        echo 'NÃO CONECTOU :(';
    }

}catch (mysqli_sql_exception $e){
    echo "ERRO".$e->getMessage();
}



















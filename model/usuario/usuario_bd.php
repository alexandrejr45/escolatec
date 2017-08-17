<?php

require_once('conexao.php');

function cadastrar($nome, $sobrenome, $email, $senha, $data_nascimento, $tipo, $telefone, $endereco, $cidade, $cpf, $cep){
    $conexao = conexao();

    $sql = "INSERT INTO usuarios(nome, 
    sobrenome, 
    email, 
    senha, 
    data_nascimento, 
    tipo, 
    telefone, 
    endereco, 
    cidade, 
    cpf, 
    cep) VALUES ('$nome', '$sobrenome','$email', '$senha', '$data_nascimento', '$tipo', $telefone,'$endereco', '$cidade',  $cpf,$cep)";

    $cadastro = mysqli_query($conexao, $sql);

    return $cadastro;

}
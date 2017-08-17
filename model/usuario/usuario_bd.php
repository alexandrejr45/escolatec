<?php

include('../conexao.php');

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

function conectar($email, $senha){
    $validacao = selecionarUsuario($email, $senha);

    if($validacao == true){
        return true;

    }else{
        return false;
    }

}

function selecionarUsuario($email, $senha){
    $conexao = conexao();

    $sql = "SELECT *FROM usuarios WHERE email = '$email' and senha = '$senha'";

    $valor = mysqli_query($conexao, $sql);

    $valores = mysqli_num_rows($valor);

    if($valores > 0){
        return true;
    }else{
        return false;
    }


}

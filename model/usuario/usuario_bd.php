<?php

if(isset($_SESSION['pagina'])){
    require_once ('../../../model/conexao.php');
}else{
    require_once('../conexao.php');
}

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
    cep) VALUES ('$nome', '$sobrenome','$email', '$senha', '$data_nascimento', '$tipo', $telefone,'$endereco', '$cidade',  '$cpf', '$cep')";

    $cadastro = $conexao->query($sql);
    $valor = $cadastro->num_rows;

    if($cadastro){
        if($valor > 0){
            $conexao->close();
            return true;
        }else{
            $conexao->close();
            return false;
        }
    }else{
        die(mysqli_error($conexao));
    }

}


function buscaUsuario($email, $cpf){
    $conexao = conexao();

    $sql = "SELECT *FROM usuarios WHERE email = '$email' or cpf = $cpf";

    $valor = $conexao->query($sql);

    $rows = $valor->num_rows;

    if($rows > 0){
        $conexao->close();
        return true;
    }else{
        $conexao->close();
        return false;

    }

}

function conectar($email, $senha){
    $validacao = verificaCadastro($email, $senha);

    if($validacao == true){
        return $validacao;

    }else{
        return false;
    }

}

function verificaCadastro($email, $senha){
    $conexao = conexao();

    $sql = "SELECT id FROM usuarios WHERE email = '$email' and senha = '$senha'";

    $valor = mysqli_query($conexao, $sql);
    $rows = mysqli_num_rows($valor);

    $id = mysqli_fetch_assoc($valor);

    if(isset($conexao)){
        if($rows > 0){
            desconecta($conexao);
            return $id;
        }else{
            desconecta($conexao);
            return false;
        }
    }else{
        die($conexao->error);
    }


}


function selecionarUsuario($id){
    $conexao = conexao();

    $sql = "SELECT *FROM usuarios WHERE id = $id";

    $valor = mysqli_query($conexao, $sql);

    $valores = mysqli_num_rows($valor);

    if(isset($conexao)){
        if($valores > 0){
            $conexao->close();
            return $valores;
        }else{
            $conexao->close();
            return false;
        }
    }else{
        die($conexao->error);
    }

}

function alterarCadastro($id, $nome, $sobrenome, $email, $senha, $data_nascimento, $tipo, $telefone, $endereco, $cidade, $cpf, $cep){
    $conexao = conexao();

    $sql = "UPDATE usuarios SET
    nome = '$nome',
    sobrenome = '$sobrenome',
    email = '$email',
    senha = '$senha',
    data_nascimento = '$data_nascimento',
    tipo = '$tipo',
    telefone = '$telefone',
    endereco = '$endereco',
    cidade = '$cidade', 
    cpf = '$cpf',
    cep = '$cep'
    WHERE id = $id";


    $valor = $conexao->query($sql);

    if($valor){
        if($valor->num_rows > 0){
            $conexao->close();
            return true;
        }else{
            $conexao->close();
            return false;
        }
    }else{
        die($conexao->error);
    }
}

function deletar($id){
    $conexao = conexao();

    $valor = mysqli_query($conexao, "DELETE FROM usuarios WHERE id = ".$id);

    if (isset($conexao)) {
        if ($valor > 0) {
            desconecta($conexao);
            return true;
        } else {
            desconecta($conexao);
            return false;
        }
    }else {
        die(mysqli_error($conexao));
    }

}


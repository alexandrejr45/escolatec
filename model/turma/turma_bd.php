<?php
session_start();

if(isset($_SESSION['pagina'])){
    require_once ('../../../model/conexao.php');
}else{
    require_once('../conexao.php');
}

function cadastrarTurma($codigo, $nome, $categoria, $ano){
    $conexao = conexao();

    $sql = "INSERT INTO turmas (codigo, nome, categoria, ano)
    VALUES ('$codigo', '$nome', '$categoria', '$ano')";

    $valor = mysqli_query($conexao, $sql);

    if(isset($conexao)){
        if($valor > 0){
            desconecta($conexao);
            return true;
        }else{
            desconecta($conexao);
            return false;
        }
    }else{
        die(mysqli_error($conexao));
    }

}

function alterarTurma($nome, $categoria, $ano){
    $conexao = conexao();

    $sql = "UPDATE turmas SET nome = :nome, categoria = :categoria, ano = :ano";

    $valor = mysqli_query($conexao, $sql);

    if(isset($conexao)){
        if($valor > 0){
            desconecta($conexao);
            return true;
        }else{
            desconecta($conexao);
            return false;
        }
    }else{
        die(mysqli_error($conexao));
    }

}


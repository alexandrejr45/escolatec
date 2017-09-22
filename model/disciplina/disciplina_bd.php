<?php

if(isset($_SESSION['pagina'])){
    require_once ('../../../model/conexao.php');
}else{
    require_once('../conexao.php');
}

function cadastrarDisciplina ($nome, $conteudo){
    $conexao = conexao();

    $sql = "INSERT INTO disciplinas (nome, conteudo) VALUES ('$nome', '$conteudo')";

    $cadastrar = mysqli_query($conexao, $sql);

    if(isset($conexao)){
        if($cadastrar > 0){
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








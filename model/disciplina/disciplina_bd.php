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


function selecionaDisciplinas(){

    $conexao =  conexao();

    $sql = "SELECT *FROM disciplinas";


    $selecionar = mysqli_query($conexao, $sql);

    $disciplinas = mysqli_fetch_all($selecionar);

    if(isset($conexao)){
        if(mysqli_num_rows($selecionar) > 0){
            desconecta($conexao);
            return $disciplinas;

        }else{
            desconecta($conexao);
            return false;
        }
    }

}







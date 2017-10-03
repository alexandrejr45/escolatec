<?php


if(isset($_SESSION['pagina'])){
    require_once ('../../../model/conexao.php');
}else{
    require_once('../conexao.php');
}

function cadastrarAula($data, $nome, $disciplina){
    $conexao = conexao();

    $sql = "INSERT INTO aulas (horario, nome, disciplinas_id) VALUES ('$data', '$nome', $disciplina)";

    $cadastro = mysqli_query($conexao, $sql);

    if(isset($conexao)){
        if($cadastro > 0){
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


function selecionarAulas(){
    $conexao = conexao();

    $sql = "SELECT a.id, a.nome, a.horario, d.nome FROM aulas a INNER JOIN disciplinas d ON a.disciplinas_id = d.id";

    $cadastro = mysqli_query($conexao, $sql);

    $aulas = mysqli_fetch_all($cadastro);

    if(isset($conexao)){
        if(mysqli_num_rows($cadastro) > 0){
            desconecta($conexao);
            return $aulas;
        }else{
            desconecta($conexao);
            return false;
        }
    }else{
        die(mysqli_error($conexao));
    }

}
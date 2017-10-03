<?php

if(isset($_SESSION['pagina'])){
    require_once ('../../../model/conexao.php');
}else{
    require_once('../conexao.php');
}


function cadastrarNotificacao($texto, $data, $id_responsavael, $id_aluno){
    $conexao = conexao();


    $sql = "INSERT INTO notificacoes (texto, data_notificacao, usuario_id, aluno_id) 
            VALUES ('$texto', '$data', $id_responsavael, $id_aluno)";

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
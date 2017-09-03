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

function alterarTurma($id, $codigo, $nome, $categoria, $ano){
    $conexao = conexao();

    $sql = "UPDATE turmas SET codigo = '$codigo', nome = '$nome', categoria = '$categoria', ano = '$ano' WHERE id = ".$id;

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


function selecionarTurmas(){
    $conexao = conexao();

    $sql = "SELECT * FROM turmas";

    $valor = mysqli_query($conexao, $sql);

    $turmas = mysqli_fetch_all($valor);


    if(isset($conexao)){
        if(mysqli_num_rows($valor) > 0){
            desconecta($conexao);
            return $turmas;
        }else{
            desconecta($conexao);
            return false;
        }
    }else {
        die(mysqli_error($conexao));
    }

}


function selecionaTurma($id){
    $conexao = conexao();

    $sql = "SELECT codigo, nome, categoria, ano FROM turmas WHERE id = ".$id;

    $valor = mysqli_query($conexao, $sql);

    $turma = mysqli_fetch_all($valor);

    if(isset($conexao)){
        if(mysqli_num_rows($valor) > 0){
            desconecta($conexao);
            return $turma;
        }else{
            desconecta($conexao);
            return false;
        }
    }else{
        die(mysqli_error($conexao));

    }
}

function deletarTurma($id){

    $conexao = conexao();

    $sql = "DELETE FROM turmas WHERE id = $id";

    $valor = mysqli_query($conexao, $sql);


    if(isset($conexao)){
        if(mysqli_num_rows($valor) > 0){
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

function contarAlunosTurma($id){
    $conexao = conexao();

    $sql = "SELECT COUNT(a.id) FROM alunos a INNER JOIN turmas t ON a.turma_id = t.id WHERE turma_id = $id";

    $valor = mysqli_query($conexao, $sql);

    $contagem = mysqli_fetch_all($valor);

    if(isset($conexao)){
        if(mysqli_num_rows($valor) > 0){
            desconecta($conexao);
            return $contagem[0][0];
        }else{
            desconecta($conexao);
            return false;
        }

    }else{
        die(mysqli_error($conexao));
    }

}

<?php

if(isset($_SESSION['pagina'])){
    require_once ('../../../model/conexao.php');
}else{
    require_once('../conexao.php');
}


function cadastrarAluno($nome, $sobrenome, $data_nascimento, $endereco, $matricula, $turma){
    $conexao = conexao();

    $sql = "INSERT INTO alunos (nome, sobrenome, data_nascimento, endereco, matricula, turma_id)
    VALUES ('$nome', '$sobrenome', '$data_nascimento', '$endereco', '$matricula', ".$turma.")";

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

function alterarAluno($id, $nome, $sobrenome, $data_nascimento, $endereco, $matricula, $turma)
{
    $conexao = conexao();

    $sql = "UPDATE alunos SET nome = '$nome', 
    sobrenome = '$sobrenome', 
    data_nascimento = '$data_nascimento',
    endereco = '$endereco',
    matricula = '$matricula',
    turma_id = $turma WHERE id = $id";

    $valor = mysqli_query($conexao, $sql);

    if (isset($conexao)) {
        if (mysqli_fetch_row($valor) > 0) {
            desconecta($conexao);
            return true;
        } else {
            desconecta($conexao);
            return false;
        }

    } else {
        die(mysqli_error($conexao));
    }

}

function selecionarAlunos(){
    $conexao = conexao();

    $sql = "SELECT a.id, a.nome, a.sobrenome, a.matricula, t.nome FROM alunos a INNER JOIN turmas t WHERE turma_id = t.id;";

    $valor = mysqli_query($conexao, $sql);

    $alunos = mysqli_fetch_all($valor);

    if(isset($conexao)){
        if(mysqli_num_rows($valor) > 0){
            desconecta($conexao);
            return $alunos;
        }else{
            desconecta($conexao);
            return false;
        }

    }else{
        die(mysqli_error($conexao));
    }
}

function selecionarAluno($id){
    $conexao = conexao();

    $sql = "SELECT *FROM alunos WHERE id = $id";

    $valor = mysqli_query($conexao, $sql);

    $alunos = mysqli_fetch_all($valor);

    if(isset($conexao)){
        if(mysqli_num_rows($valor) > 0){
            desconecta($conexao);
            return $alunos;
        }else{
            desconecta($conexao);
            return false;
        }

    }else{
        die(mysqli_error($conexao));
    }
}

function selecionarAlunosTurma($id){
    $conexao = conexao();

    $sql = "SELECT a.nome, a.sobrenome, a.matricula, t.nome FROM alunos a INNER JOIN turmas t ON a.turma_id = t.id WHERE turma_id = $id";

    $valor = mysqli_query($conexao, $sql);

    $alunos = mysqli_fetch_all($valor);

    if(isset($conexao)){
        if(mysqli_num_rows($valor) > 0){
            desconecta($conexao);
            return $alunos;
        }else{
            desconecta($conexao);
            return false;
        }

    }else{
        die(mysqli_error($conexao));
    }
}

function deletarAluno($id){
    $conexao = conexao();

    $sql = "DELETE FROM alunos WHERE id = $id";

    $valor = mysqli_query($conexao, $sql);

    if(isset($conexao)){
        if(mysqli_num_rows($valor)){
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



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
            cadastrarDisciplinaProfessor();

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


function cadastrarDisciplinaProfessor(){
    $conexao =  conexao();

    $id_professor = $_SESSION['id_usuario'];
    $id_disciplina = selecionaUltimaDisciplina();

    $sql = "INSERT INTO professores_disciplinas (usuario_id, disciplina_id) VALUES ($id_professor, $id_disciplina)";

    $selecionar = mysqli_query($conexao, $sql);

    if(isset($conexao)){
        if($selecionar > 0){
            desconecta($conexao);
            return true;

        }else{
            desconecta($conexao);
            return false;
        }
    }
}

function selecionaUltimaDisciplina(){
    $conexao = conexao();

    $sql = "SELECT id FROM disciplinas ORDER BY id desc LIMIT 1";

    $cadastro = mysqli_query($conexao, $sql);

    $id = mysqli_fetch_assoc($cadastro);

    if(isset($conexao)){
        if(mysqli_num_rows($cadastro) > 0){
            desconecta($conexao);
            return $id['id'];

        }else{
            desconecta($conexao);
            return false;
        }
    }

}



function selecionaDisciplinas(){

    $conexao =  conexao();

    $id = $_SESSION['id_usuario'];

    $sql = "SELECT d.id, d.nome, d.conteudo FROM disciplinas d INNER JOIN professores_disciplinas pd ON d.id = pd.disciplina_id 
          INNER JOIN usuarios p ON pd.usuario_id = p.id WHERE p.id = $id";

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

function selecionaUnicaDisciplina($id){
    $conexao =  conexao();

    $sql = "SELECT nome, conteudo FROM disciplinas WHERE id = $id";

    $cadastro = mysqli_query($conexao, $sql);

    $disciplina = mysqli_fetch_all($cadastro);

    if(isset($conexao)){
        if(mysqli_num_rows($cadastro) > 0){
            desconecta($conexao);
            return $disciplina;

        }else{
            desconecta($conexao);
            return false;
        }
    }
}


function alterarDisciplina($id, $nome, $conteudo){
    $conexao = conexao();

    $sql = "UPDATE disciplinas SET nome = '$nome', conteudo = '$conteudo' 
            WHERE id = $id";

    $alterar = mysqli_query($conexao, $sql);


    if(isset($conexao)){
        if($alterar > 0){
            desconecta($conexao);
            return true;

        }else{
            desconecta($conexao);
            return false;
        }
    }

}

function deletarDisciplina($id){
    $conexao = conexao();

    deletarDisciplinaProfessor($id);


    $sql = "DELETE FROM disciplinas WHERE id = $id";

    $deletar = mysqli_query($conexao, $sql);

    if(isset($conexao)){
        if(mysqli_num_rows($deletar) > 0){
            desconecta($conexao);
            return true;

        }else{
            desconecta($conexao);
            return false;
        }
    }

}

function deletarDisciplinaProfessor($id){
    $conexao = conexao();

    $id_professor = $_SESSION['id_usuario'];

    $sql = "DELETE FROM professores_disciplinas WHERE disciplina_id = $id and usuario_id = $id_professor";

    $deletar = mysqli_query($conexao, $sql);

    if(isset($conexao)){
        if(mysqli_num_rows($deletar) > 0){
            desconecta($conexao);
            return true;

        }else{
            desconecta($conexao);
            return false;
        }
    }

}
















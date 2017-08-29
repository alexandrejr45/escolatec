<?php

session_start();

require_once ('aluno_bd.php');

$resposta = filter_input(INPUT_POST, 'Sim');
$id = filter_input(INPUT_POST, 'id');

try{
    $deletar = deletarAluno($id);

    if(isset($resposta)){
        $_SESSION['aluno_deletado'] = 'Aluno deletado';
        header('Location: ../../assets/pages/aluno/alunos1.php');
    }else{
        $_SESSION['aluno_permanece'] = 'Aluno permaneceu';
        header('Location: ../../assets/pages/aluno/alunos1.php');
    }

}catch (mysqli_sql_exception $e){

    echo "Erro".$e->getMessage();

}


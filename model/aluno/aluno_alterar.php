<?php

session_start();

require_once ('aluno_bd.php');

$nome = filter_input(INPUT_POST, 'nome');
$sobrenome = filter_input(INPUT_POST, 'sobrenome');
$data_nascimento = filter_input(INPUT_POST, 'data');
$endereco = filter_input(INPUT_POST, 'endereco');
$matricula = filter_input(INPUT_POST, 'matricula');
$turma = filter_input(INPUT_POST, 'turma');
$id = filter_input(INPUT_POST, 'id');

try{
    $alteracao = alterarAluno($id, $nome, $sobrenome, $data_nascimento, $endereco, $matricula, $turma);

    if(isset($alteracao)){
        $_SESSION['aluno_alterado'] = 'Aluno alterado';
        header('Location: ../../assets/pages/aluno/alunos.php');
    }else{
        $_SESSION['aluno_inalterado'] = 'Aluno inalterado';
        header('Location: ../../assets/pages/aluno/alunos.php');
    }

}catch (mysqli_sql_exception $e){
    echo "Erro".$e->getMessage();
}










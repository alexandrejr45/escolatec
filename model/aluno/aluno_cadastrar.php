<?php

session_start();

require_once ('aluno_bd.php');


$nome = filter_input(INPUT_POST, 'nome');
$sobrenome = filter_input(INPUT_POST, 'sobrenome');
$data_nascimento = filter_input(INPUT_POST, 'data');
$endereco = filter_input(INPUT_POST, 'endereco');
$matricula = filter_input(INPUT_POST, 'matricula');
$turma = filter_input(INPUT_POST, 'turma');



try{
    $cadastro = cadastrarAluno($nome, $sobrenome, $data_nascimento, $endereco, $matricula, $turma);

    if($cadastro == true){
        $_SESSION['aluno_cadastrado'] = 'Aluno Cadastrado';
        header('Location: ../../assets/pages/aluno/aluno_cadastro.php');
    }else{
        $_SESSION['aluno_falha'] = 'Falha no Cadastro de alunos';
        header('Location: ../../assets/pages/aluno/aluno_cadastro.php');
    }


}catch (mysqli_sql_exception $e){
    echo "Erro".$e->getMessage();
}

















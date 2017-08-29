<?php

session_start();

require_once ('turma_bd.php');

$nome = filter_input(INPUT_POST, 'nome');
$categoria = filter_input(INPUT_POST, 'categoria');
$ano = filter_input(INPUT_POST, 'ano');
$id = filter_input(INPUT_POST, 'id');

if($categoria == 'manha'){
    $num = random_int(0, 10);
    $codigo = 'M'.$num.'12';
}else{
    $num = random_int(0, 10);
    $codigo = 'T'.$num.'13';
}

try{
    $cadastro = alterarTurma($id, $codigo, $nome, $categoria, $ano);

    if($cadastro == true){
        $_SESSION['turma_alterada'] = 'Turma cadastrada';
        header('Location: ../../assets/pages/turma/turmas.php');

    }else{
        $_SESSION['turma_inalterada'] = 'Cadastro falhou';
        header('Location: ../../assets/pages/turma/turmas.php');

    }

}catch (mysqli_sql_exception $e){
    echo 'ERRO'.$e->getMessage();
}













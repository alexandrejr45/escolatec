<?php

session_start();

require_once ('turma_bd.php');

$nome = filter_input(INPUT_POST, 'nome');
$categoria = filter_input(INPUT_POST, 'categoria');
$ano = filter_input(INPUT_POST, 'ano');

if($categoria == 'manha'){
    $num = random_int(0, 10);
    $codigo = 'M'.$num.'12';
}else{
    $num = random_int(0, 10);
    $codigo = 'T'.$num.'13';
}

try{
    $cadastro = cadastrarTurma($codigo, $nome, $categoria, $ano);

    if($cadastro == true){
        $_SESSION['turma_cadastrada'] = 'Turma cadastrada';
        header('Location: ../../assets/pages/turma/turma_cadastro.php');

    }else{
        $_SESSION['turma_erro'] = 'Cadastro falhou';
        header('Location: ../../assets/pages/turma/turma_cadastro.php');

    }

}catch (mysqli_sql_exception $e){
    echo 'ERRO'.$e->getMessage();
}













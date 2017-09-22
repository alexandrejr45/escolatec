<?php

session_start();

require_once('disciplina_bd.php');

$nome = filter_input(INPUT_POST, 'nome');
$conteudo = filter_input(INPUT_POST, 'conteudo');


try{
    $cadastro = cadastrarDisciplina($nome, $conteudo);

    if($cadastro){
        $_SESSION['disciplina_sucesso'] = 'Sucesso';
        header('Location: ../../assets/pages/disciplina/disciplina_cadastro.php');

    }else{
        $_SESSION['disciplina_insucesso'] = 'Insucesso';
        header('Location: ../../assets/pages/disciplina/disciplina_cadastro.php');

    }

}catch (mysqli_sql_exception $e){
    echo "ERRO".$e->getMessage();
}




















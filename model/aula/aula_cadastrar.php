<?php

session_start();

require_once ('aula_bd.php');

$disciplina = filter_input(INPUT_POST, 'disciplina');
$nome = filter_input(INPUT_POST, 'nome');
$data = date('Y-m-d');

try{
    if(isset($disciplina) and isset($nome)){
        $cadastrar = cadastrarAula($data, $nome, $disciplina);

        if($cadastrar){
            $_SESSION['aula_cadastrada'] = 'Aula cadastrada';
            header('Location: ../../assets/pages/aula/aula_cadastrar.php');

        }else{
            $_SESSION['aula_falhou'] = 'Aula falhou';
            header('Location: ../../assets/pages/aula/aula_cadastrar.php');

        }


    }



}catch (mysqli_sql_exception $e){
    echo "Erro".$e->getMessage();
}


































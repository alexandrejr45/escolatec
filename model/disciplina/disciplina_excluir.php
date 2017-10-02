<?php

session_start();

require_once ('disciplina_bd.php');

$id = filter_input(INPUT_POST, 'id');
$resposta = filter_input(INPUT_POST, 'Sim');

try{
    $deletar = deletarDisciplina($id);

    if(isset($resposta)){
        $_SESSION['disciplina_deletada'] = 'Disciplina deletada';

        header('Location: ../../assets/pages/disciplina/disciplinas2.php');
    }else{
        $_SESSION['disciplina_mantida'] = 'Disciplina mantida';

        header('Location: ../../assets/pages/disciplina/disciplinas2.php');
    }

}catch (mysqli_sql_exception $e){
    echo 'Erro'.$e->getMessage();
}

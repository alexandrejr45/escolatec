<?php

session_start();

require_once ('turma_bd.php');

$resposta = filter_input(INPUT_POST, 'Sim');
$id = filter_input(INPUT_POST, 'id');

try{

    $contagem = contarAlunosTurma($id);

    if($contagem > 0){
        $_SESSION['turma_permanece'] = 'Falha na exclusão da turma';
        header('Location: ../../assets/pages/turma/turmas2.php');

    }else{
        $deletar = deletarTurma($id);

        if(isset($deletar)){
            $_SESSION['turma_deletada'] = 'Turma deletada';
            header('Location: ../../assets/pages/turma/turmas2.php');
        }else{
            $_SESSION['turma_permanece'] = 'Falha na exclusão da turma';
            header('Location: ../../assets/pages/turma/turmas2.php');
        }
    }


}catch (mysqli_sql_exception $e){

    echo "Erro".$e->getMessage();

}


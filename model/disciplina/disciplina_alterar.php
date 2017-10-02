<?php

session_start();

require_once ('disciplina_bd.php');


$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$nome = filter_input(INPUT_POST, 'nome');
$conteudo = filter_input(INPUT_POST, 'conteudo');


try{
    if(isset($id) and isset($nome) and isset($conteudo)){
        $alterar = alterarDisciplina($id, $nome, $conteudo);

        if($alterar == true){
            $_SESSION['disciplina_alterada'] = 'Disciplina alterada';

            header('Location: ../../assets/pages/disciplina/disciplinas.php');

        }else{
            $_SESSION['disciplina_inalterada'] = 'Disciplina alterada';

            header('Location: ../../assets/pages/disciplina/disciplinas.php');

        }

    }else{
        $_SESSION['disciplina_inalterada'] = 'Disciplina alterada';

        header('Location: ../../assets/pages/disciplina/disciplinas.php');

    }




}catch (mysqli_sql_exception $e){
    echo "Erro".$e->getMessage();
}


































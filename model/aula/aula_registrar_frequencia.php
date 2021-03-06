<?php

session_start();


require_once('aula_bd.php');
require_once('../aluno/aluno_bd.php');

$tamanho = filter_input(INPUT_POST, 'tamanho', FILTER_VALIDATE_INT);

$alunos = array();
$frequencia = array();
$aula = array();
$data = date('Y-m-d');



for($i = 0; $i < $tamanho; $i++){
    $alunos[$i] = filter_input(INPUT_POST, "aluno$i");
    $frequencia[$i] = filter_input(INPUT_POST, "freq$i");
    $aula[$i] = filter_input(INPUT_POST, "aula$i");



}


try{
    if(isset($alunos) and isset($frequencia)){
        for($i = 0; $i < $tamanho; $i++){
            $cadastro  = cadastraRegistro($aula[$i], $alunos[$i], $frequencia[$i], $data);


            if($frequencia[$i] == 0){
                $responsavel = selecionaResponsavel($alunos[$i]);

                foreach($responsavel as $res){

                    enviaSms($res[1], $res[4], $data, $aula[$i]);
                    enviaEmail($res[0], $res[1], $data, $aula[$i], $res[3], $alunos[$i]);
                }
            }

        }

        if($cadastro == true){

            $_SESSION['registro_cadastrado'] = 'Cadastrado';
            header('Location: ../../assets/pages/aula/aula_turmas.php');

        }else{

            $_SESSION['registro_invalido'] = 'Inválido';
            header('Location: ../../assets/pages/aula/aula_turmas.php');

        }


    }else{

        $_SESSION['registro_invalido'] = 'Inválido';
        header('Location: ../../assets/pages/aula/aula_turmas.php');

    }




}catch (mysqli_sql_exception $e){
    echo "Erro".$e->getMessage();
}





























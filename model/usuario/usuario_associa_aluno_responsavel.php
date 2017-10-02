<?php

session_start();


require_once ('usuario_bd.php');

$id_aluno = filter_input(INPUT_POST, 'id_aluno');
$id_responsavel = filter_input(INPUT_POST, 'id_responsavel');

try{
    if(isset($id_aluno) and isset($id_responsavel)){
        $verificacao = confereAlunoResponsavel($id_responsavel, $id_aluno);

        if($verificacao == true){
            $_SESSION['aluno_desassociado'] = 'Falha na Associação';

            header('Location: ../../assets/pages/aluno/alunos2.php');
        }else{
            $cadastro = cadastraAlunoResponsavel($id_responsavel, $id_aluno);


            if($cadastro > 0){
                $_SESSION['aluno_associado'] = 'Aluno associado';

                header('Location: ../../assets/pages/aluno/alunos2.php');
            }else{

                $_SESSION['aluno_desassociado'] = 'Falha na Associação';

                header('Location: ../../assets/pages/aluno/alunos2.php');
            }

        }



    }else{
        $_SESSION['aluno_desassociado'] = 'Falha na Associação';

        header('Location: ../../assets/pages/aluno/alunos2.php');
    }



}catch (mysqli_sql_exception $e){
    echo "Erro".$e->getMessage();
}










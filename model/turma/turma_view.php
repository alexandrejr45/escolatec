<?php

$_SESSION['pagina'] = 'view';

require_once ('turma_bd.php');

function retornaTurmas(){
    $turmas  = selecionarTurmas();

    if(isset($turmas)){
        foreach ($turmas as $turma){
            echo "<form action='turma_alterar_cadastro.php' method='post'>";


            echo "<tr></tr>";
            echo "<td>$turma[2]</td>";
            echo "<td>$turma[3]</td>";
            echo "<td>$turma[4]</td>";

            echo "
               <td><input type='hidden' name='id' value=$turma[0]></td>               
               <td><input class='btn btn-primary' value='Alterar' type='submit'></td>
            </form>";
        }
    }
}

function retornaDadosTurma($id, $num){
    $turma = selecionaTurma($id);

    if(isset($turma)){
        foreach ($turma as $tur){
            return $tur[$num];
        }
    }

}

unset($_SESSION['pagina']);






















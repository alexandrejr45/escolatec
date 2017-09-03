<?php

$_SESSION['pagina'] = 'view';

require_once ('turma_bd.php');

function retornaTurmas($categoria){
    $turmas  = selecionarTurmas();

    if($categoria == 'alterar'){
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
    }else if($categoria == 'verificar'){
        if(isset($turmas)){
            foreach ($turmas as $turma){
                echo "<form action='turma_alunos.php' method='post'>";

                echo "<tr></tr>";
                echo "<td>$turma[2]</td>";
                echo "<td>$turma[3]</td>";
                echo "<td>$turma[4]</td>";

                echo "
               <td><input type='hidden' name='id' value=$turma[0]></td>               
               <td><input class='btn btn-primary' value='Selecionar' type='submit'></td>
            </form>";
            }
        }
    }else if($categoria == 'excluir'){
        if(isset($turmas)){
            foreach ($turmas as $turma){
                echo "<form action='turma_excluir_cadastro.php' method='post'>";

                echo "<tr></tr>";
                echo "<td>$turma[2]</td>";
                echo "<td>$turma[3]</td>";
                echo "<td>$turma[4]</td>";

                echo "
               <td><input type='hidden' name='id' value=$turma[0]></td>               
               <td><input type='hidden' name='nome' value=$turma[2]></td>               
               <td><input class='btn btn-danger' value='Excluir' type='submit'></td>
            </form>";
            }
        }
    }


}

function retornaDadosTurma($id, $num){
    $turma = selecionaTurma($id);

    if(isset($turma)){
        foreach ($turma as $tur){
            return $tur[$num];
        }
    }else{
        return "Não existe essa opção";
    }

}

function retornaTurmaOpcoes(){

    $turmas  = selecionarTurmas();


    if(isset($turmas)){
        echo "<select name='turma'>";

        foreach ($turmas as $turma){
            echo "<option value='$turma[0]'>$turma[2]  $turma[3]</option>";
        }

        echo "</select>";
    }
}

unset($_SESSION['pagina']);












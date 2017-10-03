<?php

$_SESSION['pagina'] = 'view';

require_once ('disciplina_bd.php');


function retornaDisciplinas($categoria){
    $disciplinas =  selecionaDisciplinas();

    if($categoria == 'alterar'){

        foreach ($disciplinas as $disciplina){
            echo "<form action='disciplina_alterar.php' method='post'>";


            echo "<tr></tr>";
            echo "<td>$disciplina[1]</td>";
            echo "<td>$disciplina[2]</td>";

            echo "
               <td><input type='hidden' name='id' value=$disciplina[0]></td>
               <td><input class='btn btn-primary' value='Alterar' type='submit'></td>
            </form>";
        }

    }else{
        foreach ($disciplinas as $disciplina){
            echo "<form action='disciplina_excluir.php' method='post'>";


            echo "<tr></tr>";
            echo "<td>$disciplina[1]</td>";
            echo "<td>$disciplina[2]</td>";

            echo "
               <td><input type='hidden' name='id' value=$disciplina[0]></td>
               <td><input type='hidden' name='nome' value=$disciplina[1]></td>
               <td><input class='btn btn-danger' value='Deletar' type='submit'></td>
            </form>";
        }
    }

}


function retornaDadosDisciplina($id, $num){
    $disciplina = selecionaUnicaDisciplina($id);

    if(isset($disciplina)){
        return $disciplina[0][$num];
    }else{
        return "Não existe essa opção";
    }

}


function retornaDisciplinaOpcoes(){

    $disciplinas  = selecionaDisciplinas();


    if(isset($disciplinas)){
        echo "<select name='disciplina'>";

        foreach ($disciplinas as $disciplina){
            echo "<option value='$disciplina[0]'>$disciplina[1]</option>";
        }

        echo "</select>";
    }
}





unset($_SESSION['pagina']);
















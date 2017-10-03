<?php
session_start();

$_SESSION['pagina'] = 'view';

require_once ('aluno_bd.php');

function retornaAlunos($categoria, $pagina, $total){
    $alunos = selecionarAlunos($pagina, $total);

    if($categoria == 'alterar'){
        if(isset($alunos)){
            foreach ($alunos as $aluno){
                echo "<form action='aluno_alterar_cadastro.php' method='post'>";


                echo "<tr></tr>";
                echo "<td>$aluno[1]</td>";
                echo "<td>$aluno[2]</td>";
                echo "<td>$aluno[3]</td>";
                echo "<td>$aluno[4]</td>";

                echo "
               <td><input type='hidden' name='id' value=$aluno[0]></td>               
               <td><input class='btn btn-primary' value='Alterar' type='submit'></td>
            </form>";
            }
        }

    }else if($categoria == 'excluir'){
        if(isset($alunos)){
            foreach ($alunos as $aluno){
                echo "<form action='aluno_excluir_cadastro.php' method='post'>";


                echo "<tr></tr>";
                echo "<td>$aluno[1]</td>";
                echo "<td>$aluno[2]</td>";
                echo "<td>$aluno[3]</td>";
                echo "<td>$aluno[4]</td>";

                echo "
               <td><input type='hidden' name='id' value=$aluno[0]></td>               
               <td><input type='hidden' name='nome' value=$aluno[1]></td>               
               <td><input class='btn btn-danger' value='Excluir' type='submit'></td>
            </form>";
            }
        }
    }else if($categoria == 'associar'){
        if(isset($alunos)){
            foreach ($alunos as $aluno){
                echo "<form action='alunos_responsaveis.php?pagina=0' method='post'>";


                echo "<tr></tr>";
                echo "<td>$aluno[1]</td>";
                echo "<td>$aluno[2]</td>";
                echo "<td>$aluno[3]</td>";
                echo "<td>$aluno[4]</td>";

                echo "
               <td><input type='hidden' name='id' value=$aluno[0]></td>               
               <td><input type='hidden' name='nome' value=$aluno[1]></td>               
               <td><input class='btn btn-warning' value='Selecionar' type='submit'></td>
            </form>";
            }
        }
    }


}

function retornaAlunosTurma($id){
    $alunos = selecionarAlunosTurma($id);

    if(isset($alunos)){
        foreach ($alunos as $aluno){

            echo "<tr></tr>";
            echo "<td>$aluno[0]</td>";
            echo "<td>$aluno[1]</td>";
            echo "<td>$aluno[2]</td>";
            echo "<td>$aluno[3]</td>";

        }
    }
}

function retornaDadosAluno($id, $opcao){
    $aluno = selecionarAluno($id);

    if(isset($aluno)){
        foreach ($aluno as $alu){
            return $alu[$opcao];
        }
    }

}

function retornaTurmaAluno($id){
    $turmas =  selecionarTurmas();
    $aluno = selecionarAluno($id);


    echo "<select name='turma'>";

    foreach ($turmas as $turma){
        if($turma[0] == $aluno[0][6]){
            echo "<option value='$turma[0]' selected >$turma[2]  $turma[3]</option>";
        }else{
            echo "<option value='$turma[0]'>$turma[2]  $turma[3]</option>";
        }

    }

    echo "</select>";


}


unset($_SESSION['pagina']);


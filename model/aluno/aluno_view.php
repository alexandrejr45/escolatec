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


function retornaFrequenciaAlunos($id_turma, $id_aula)
{
    $alunos = selecionarAlunosTurma($id_turma);

    $nomes_input_freq = array();
    $nomes_input_aula = array();
    $nomes_input_aluno = array();
    $aux = 0;


    foreach ($alunos as $aluno) {
        $nomes_input_freq[$aux] = "freq$aux";
        $nomes_input_aula[$aux] = "aula$aux";
        $nomes_input_aluno[$aux] = "aluno$aux";

        echo "<tr></tr>";
        echo "<td>$aluno[0]</td>";
        echo "<td>$aluno[1]</td>";
        echo "<td>$aluno[2]</td>";
        echo "<td>$aluno[3]</td>";


        echo "<td><label>Sim<input style='margin-left: 15px' type='radio' name='$nomes_input_freq[$aux]' value='1' required></label></td>";
        echo "<td><label>Não<input style='margin-left: 15px' type='radio' name='$nomes_input_freq[$aux]' value='0' required></label></td>";

        echo "<td><input type='hidden' name='$nomes_input_aula[$aux]' value='$id_aula'></td>";
        echo "<td><input type='hidden' name='$nomes_input_aluno[$aux]' value='$aluno[4]'></td>";

        $aux++;

    }

    $tamanho = count($nomes_input_aula);

    echo "<td><input type='hidden' name='tamanho' value=$tamanho></td>";

}




unset($_SESSION['pagina']);


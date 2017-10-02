<?php

$_SESSION['pagina'] = 'view';

require_once ('usuario_bd.php');


function retornaDados(){
    $id = $_SESSION['id_usuario'];

    $valores = selecionarUsuario($id);


    if($valores == true){

        return $valores;

    }else{
        echo "<h1>Não há dados cadastrados</h1>";
    }


}


function retornaResposta(){
    $id = $_SESSION['id_usuario'];

    echo "<h1>Você deseja mesmo excluir sua conta??</h1>
                            <div class='row'>
                            <a href=\"dashboard.php\" class=\"btn btn-danger\">Não</a>
</div>

<div class='row'>
<form action=\"../../../model/usuario/usuario_deletar.php\" method=\"post\">
        <input type='hidden' value='$id' name='id'>
        <input type = \"submit\" name='Sim' value = \"Sim\" class=\"btn btn-success\" >
                                </form>
</div>";
                                

}

function retornaResponsaveis($categoria, $pagina, $total, $id_aluno){
    $responsaveis = selecionaResponsaveis($pagina, $total);

    if($categoria == 'associar'){
        if(isset($responsaveis)){
            foreach ($responsaveis as $responsavel){
                $verificacao = confereAlunoResponsavel($responsavel[0], $id_aluno);

                echo "<form action='../../../model/usuario/usuario_associa_aluno_responsavel.php' method='post'>";



                echo "<tr></tr>";
                echo "<td>$responsavel[1]</td>";
                echo "<td>$responsavel[2]</td>";
                echo "<td>$responsavel[3]</td>";
                echo "<td>$responsavel[4]</td>";


                if($verificacao == true){

                    echo "
                       <td><input type='hidden' name='id_aluno' value=$id_aluno></td>               
                       <td><input type='hidden' name='id_responsavel' value=$responsavel[0]></td>               
                       <td><input class='btn btn-danger' value='Associado' type='submit'></td>
                    </form>";
                }else{
                    echo "
                       <td><input type='hidden' name='id_aluno' value=$id_aluno></td>               
                       <td><input type='hidden' name='id_responsavel' value=$responsavel[0]></td>               
                       <td><input class='btn btn-success' value='Associar' type='submit'></td>
                    </form>";
                }


            }
        }

    }

}





unset($_SESSION['pagina']);


















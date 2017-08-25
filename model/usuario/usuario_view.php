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
        <input type = \"submit\" name=\"Sim\" value = \"Sim\" class=\"btn btn-success\" >
                                </form>
</div>";
                                

}

unset($_SESSION['pagina']);


















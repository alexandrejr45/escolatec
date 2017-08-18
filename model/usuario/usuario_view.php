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

unset($_SESSION['pagina']);


















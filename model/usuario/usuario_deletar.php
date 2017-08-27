<?php

session_start();

$_SESSION['delete'] = 'delete';

require_once ('usuario_bd.php');

$id = filter_input(INPUT_POST, 'id');
$resposta = filter_input(INPUT_POST, 'Sim');

try{
    $deletar = deletar($id);

    if(isset($resposta) and $deletar == true){
        header('Location: usuario_deslogar.php');
    }else{
        header('Location: ../../assets/pages/usuario/dashboard.php');
    }

}catch (mysqli_sql_exception $e){
    echo 'Erro'.$e->getMessage();
}

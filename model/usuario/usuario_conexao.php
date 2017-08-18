<?php

session_start();

require_once ('usuario_bd.php');

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha');


try{
    $conexao = conectar($email, $senha);

    if($conexao == true){

        $_SESSION['id_usuario'] = $conexao;
        $_SESSION['login'] = 'Logado';
        header('Location: ../../assets/pages/usuario/dashboard.php');
    }else{
        $_SESSION['login_falha'] = true;
        header('Location: ../../index.php');
    }

}catch (mysqli_sql_exception $e){
    echo "ERRO".$e->getMessage();
}


























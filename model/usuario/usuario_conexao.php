<?php

session_start();

require_once ('usuario_bd.php');

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha');
$tipo = filter_input(INPUT_POST, 'tipo');


try{
    $senha_hash = selecionarSenha($email, $tipo);

    if(password_verify($senha, $senha_hash)){
        $conexao = conectar($email, $senha_hash, $tipo);

        if($conexao == true){

            if(isset($tipo) and $tipo == 'P'){
                $_SESSION['professor'] = 'professor';
            }else{
                $_SESSION['responsavel'] = 'responsavel';
            }

            $nome = selecionarNome($conexao);

            $_SESSION['id_usuario'] = $conexao;
            $_SESSION['usuario_nome'] = $nome;
            $_SESSION['login'] = 'Logado';
            header('Location: ../../assets/pages/dashboard.php');
        }else{
            $_SESSION['login_falha'] = 'Não foi possível entrar com esse login e senha';
            header('Location: ../../index.php');
        }
    }else{
        $_SESSION['login_falha'] = 'Não foi possível entrar com esse login e senha';
        header('Location: ../../index.php');
    }




}catch (mysqli_sql_exception $e){
    echo "ERRO".$e->getMessage();
}


























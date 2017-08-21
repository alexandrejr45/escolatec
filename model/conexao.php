<?php

function conexao (){
    if(file_exists('../../database/config/database.ini')){
        $bd = parse_ini_file('../../database/config/database.ini');
    }else if(file_exists('../../../database/config/database.ini')){
        $bd = parse_ini_file('../../../database/config/database.ini');
    }else{
        $bd = null;

    }

    $usuario = $bd['usuario'];
    $senha = $bd['senha'];
    $host = $bd['host'];
    $nome = $bd['nome'];


    $conexao = mysqli_connect("$host", "$usuario", "$senha", "$nome");

    return $conexao;

}

function desconecta($conn){
    mysqli_close($conn);
}
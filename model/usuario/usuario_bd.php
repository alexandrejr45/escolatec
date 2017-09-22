<?php

if(isset($_SESSION['pagina'])){
    require_once ('../../../model/conexao.php');
}else{
    require_once('../conexao.php');
}

function cadastrar($nome, $sobrenome, $email, $senha, $data_nascimento, $tipo, $telefone, $endereco, $cidade, $cpf, $cep){
    $conexao = conexao();

    $senha = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios(nome,
    sobrenome,
    email,
    senha,
    data_nascimento,
    tipo,
    telefone,
    endereco,
    cidade,
    cpf,
    cep) VALUES ('$nome', '$sobrenome', '$email', '$senha', '$data_nascimento', '$tipo' , '$telefone', '$endereco', '$cidade', '$cpf', '$cep')";

    $cadastro = mysqli_query($conexao, $sql);

    if(isset($conexao)){
      if($cadastro > 0){
        desconecta($conexao);
        return true;
      }else{
        desconecta($conexao);
        return false;
      }
    }else{
      die(mysqli_error($conexao));
    }

}


function buscaUsuario($email, $cpf){
    $conexao = conexao();

    $sql = "SELECT *FROM usuarios WHERE email = '$email' or cpf = '$cpf'";

    $valor = mysqli_query($conexao, $sql);

    if(isset($conexao)){
       if(mysqli_num_rows($valor) > 0){
           desconecta($conexao);
           return true;

       }else{
           desconecta($conexao);
           return false;
       }
    }else{
        die(mysqli_error($conexao));
    }

}

function conectar($email, $senha, $tipo){
    $validacao = verificaCadastro($email, $senha, $tipo);

    if($validacao == true){
        return $validacao;

    }else{
        return false;
    }

}

function verificaCadastro($email, $senha, $tipo){
    $conexao = conexao();

    $sql = "SELECT id FROM usuarios WHERE email = '$email' and senha = '$senha' and tipo = '$tipo'";

    $valor = mysqli_query($conexao, $sql);

    $id = mysqli_fetch_row($valor);

    if($valor){
        if(mysqli_num_rows($valor) > 0){
            desconecta($conexao);
            return $id[0];
        }else{
            desconecta($conexao);
            return false;
        }
    }else{
        die(mysqli_error($conexao));
    }


}


function selecionarUsuario($id){
    $conexao = conexao();

    $sql = "SELECT *FROM usuarios WHERE id = $id";

    $valor = mysqli_query($conexao, $sql);

    $valores = mysqli_fetch_assoc($valor);

    if($valor){
        if(mysqli_num_rows($valor) > 0){
            desconecta($conexao);
            return $valores;
        }else{
            desconecta($conexao);
            return false;
        }
    }else{
        die(mysqli_error($conexao));
    }

}

function alterarCadastro($id, $nome, $sobrenome, $email, $senha, $data_nascimento, $tipo, $telefone, $endereco, $cidade, $cpf, $cep){
    $conexao = conexao();

    $sql = "UPDATE usuarios SET
    nome = '$nome',
    sobrenome = '$sobrenome',
    email = '$email',
    senha = '$senha',
    data_nascimento = '$data_nascimento',
    tipo = '$tipo',
    telefone = '$telefone',
    endereco = '$endereco',
    cidade = '$cidade',
    cpf = '$cpf',
    cep = '$cep'
    WHERE id = $id";


    $valor = mysqli_query($conexao, $sql);

    if(isset($conexao)){
        if($valor > 0){
            desconecta($conexao);
            return true;
        }else{
            desconecta($conexao);
            return false;
        }
    }else{
        die(mysqli_error($conexao));
    }


}

function deletar($id){
    $conexao = conexao();

    $sql = "DELETE FROM usuarios WHERE id = ".$id;

    $valor = mysqli_query($conexao, $sql);

    if (isset($conexao)) {
        if ($valor > 0) {
            desconecta($conexao);
            return true;
        } else {
            desconecta($conexao);
            return false;
        }
    }else {
        die(mysqli_error($conexao));
    }

}

function selecionarSenha($email, $tipo){
    $conexao = conexao();

    $sql = "SELECT senha FROM usuarios WHERE email = '$email' and tipo = '$tipo'";

    $valor = mysqli_query($conexao, $sql);

    $senha = mysqli_fetch_assoc($valor);

    if(isset($conexao)){
        if(mysqli_num_rows($valor) > 0){
            desconecta($conexao);
            return $senha['senha'];
        }else{
            desconecta($conexao);
            return false;
        }

    }else{
        die(mysqli_error($conexao));
    }


}


function selecionarNome($id){
    $conexao = conexao();

    $sql = "SELECT nome FROM usuarios WHERE id = ".$id;

    $valor = mysqli_query($conexao, $sql);

    $nome = mysqli_fetch_assoc($valor);


    if(isset($conexao)){
        if(mysqli_num_rows($valor) > 0){
            desconecta($conexao);
            return $nome['nome'];
        }else{
            desconecta($conexao);
            return false;
        }

    }else{
        die(mysqli_error($conexao));
    }

}



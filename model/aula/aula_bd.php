<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader


if(isset($_SESSION['pagina'])){
    require_once ('../../../model/conexao.php');
    require '../../../vendor/autoload.php';
}else{
    require_once('../conexao.php');
    require '../../vendor/autoload.php';
}

function cadastrarAula($data, $nome, $disciplina){
    $conexao = conexao();

    $sql = "INSERT INTO aulas (horario, nome, disciplinas_id) VALUES ('$data', '$nome', $disciplina)";

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


function selecionarAulas(){
    $conexao = conexao();

    $sql = "SELECT a.id, a.nome, a.horario, d.nome FROM aulas a INNER JOIN disciplinas d ON a.disciplinas_id = d.id";

    $cadastro = mysqli_query($conexao, $sql);

    $aulas = mysqli_fetch_all($cadastro);

    if(isset($conexao)){
        if(mysqli_num_rows($cadastro) > 0){
            desconecta($conexao);
            return $aulas;
        }else{
            desconecta($conexao);
            return false;
        }
    }else{
        die(mysqli_error($conexao));
    }

}



function cadastraRegistro($id_aula, $id_aluno, $frequencia, $data){
    $conexao = conexao();

    $sql = "INSERT INTO registros (aula_id, aluno_id, frequencia, data_aula) VALUES ($id_aula, $id_aluno, $frequencia, '$data')";

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


function enviaEmail($email, $aluno, $data, $aula){
    $mail = new PHPMailer(true);

    // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'escoltecufra@gmail.com';                 // SMTP username
        $mail->Password = 'escolatec123';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('escoltecufra@gmail.com', 'Escola');
        $mail->addAddress("$email", "$aluno");     // Add a recipient


        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Alerta de falta';
        $mail->Body = "O estudante $aluno levou falta na aula de $aula do dia $data";
        $mail->AltBody = "Falta na aula de $aula";

        $mail->send();

        $_SESSION['registro_cadastrado'] = 'Cadastrado';
        header('Location: ../../assets/pages/aula/aula_turmas.php');

    } catch (Exception $e) {
        echo 'Mensagem não pode ser enviada';
        echo 'Mailer Error: ' . $mail->ErrorInfo;

    }

}
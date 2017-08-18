<?php

$_SESSION['pagina'] = 'view';

require_once ('usuario_bd.php');


function retornaDados(){
    $id = $_SESSION['id_usuario'];

    $valores = selecionarUsuario($id);


    if($valores == true){
            echo " <div class=\"col-lg-4\">
                                        <label>Nome<input class=\"form-control\" name=\"nome\" placeholder=\"$valores[nome]\" type=\"text\" required></label>
                                        <label>Sobrenome<input class=\"form-control\" name=\"sobrenome\" placeholder=\"$valores[sobrenome]\" type=\"text\" required></label>
                                        <label>Email <input class=\"form-control\" name=\"email\" placeholder=\"$valores[email]\" type=\"email\" required></label>
                                        <label>Senha <input class=\"form-control\" name=\"senha\" placeholder=\"$valores[senha]\" type=\"password\"  required></label>
                                        <label>Data de Nascimento<input class=\"form-control\" name=\"data_nascimento\" placeholder=\"$valores[data_nascimento]\" type=\"date\" required></label>
                                    </div>

                                    <div class=\"col-lg-4\">
                                        <label>Professor<input class=\"checkbox\" name=\"tipo\" value=\"P\" type=\"radio\" required></label>
                                        <label>Responsável<input class=\"checkbox\" name=\"tipo\" value=\"R\" type=\"radio\" required></label>
                                        <label>Telefone<input class=\"form-control\" name=\"telefone\" placeholder=\"$valores[telefone]\"  type=\"number\" required></label>
                                        <label>Endereço <input class=\"form-control\" name=\"endereco\" placeholder=\"$valores[endereco]\" type=\"text\" required></label>
                                        <label>Cidade <input class=\"form-control\" name=\"cidade\" placeholder=\"$valores[cidade]\" type=\"text\" required></label>
                                        <label>CPF <input class=\"form-control\" name=\"cpf\" type=\"number\" placeholder=\"$valores[cpf]\" maxlength=\"9\" required></label>
                                        <label>CEP <input class=\"form-control\" name=\"cep\" type=\"number\" placeholder=\"$valores[cep]\" required></label>
                                    </div>
                                    
                                    <input type='hidden' value='$id' name='id'>";
        


    }else{
        echo "<h1>Não há dados cadastrados</h1>";
    }


}

unset($_SESSION['pagina']);


















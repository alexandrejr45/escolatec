<?php

$_SESSION['pagina'] = 'view';

require_once ('aula_bd.php');


function retornaAulas($categoria){
    $aulas = selecionarAulas();

    if($categoria == 'alterar'){
        if(isset($aulas)){
            if(isset($aulas)){
                foreach ($aulas as $aula){
                    echo "<form action='#' method='post'>";


                    echo "<tr></tr>";
                    echo "<td>$aula[1]</td>";
                    echo "<td>$aula[2]</td>";
                    echo "<td>$aula[3]</td>";

                        echo "
                            <td><input type='hidden' name='id' value=$aula[0]></td>               
                            <td><input class='btn btn-primary' value='Alterar' type='submit'></td>
                            </form>";
                }
            }

        }

    }

}
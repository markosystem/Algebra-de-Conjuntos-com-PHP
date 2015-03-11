<?php
/**
 * Created by PhpStorm.
 * User: Desenvolvedor
 * Date: 06/03/2015
 * Time: 14:13
 */
require "classes/file.php";
if(isset($_GET)){
    $tipo = $_GET['optionTipo'];
    $instancia = new file();
    $file1 = $instancia->loadingFile("file1.txt","r");
    $file2 = $instancia->loadingFile("file2.txt","r");
    $universo = $instancia->loadingFile("universo.txt","r");
    switch($tipo){
        case"Pertinencia":
            $elemento = $_GET['Elemento'];
            $arquivo = $_GET['optionSelection'];

            if($arquivo == "file1.txt"){
                $file = $file1;
            }elseif($arquivo == "file2.txt"){
                $file = $file2;
            }else{
                $file = $universo;
            }
            $existe = in_array($elemento, $file);
            if($existe){
                $instancia->writeText("output","output.txt", "O Elemento ".$elemento." está contido no Conjunto ".$arquivo);
            }else{
                $instancia->writeText("output","output.txt", "O Elemento ".$elemento." NÃO está contido no Conjunto ".$arquivo);
            }
            break;
        case"Contingencia":
            $arquivo1 = $_GET['optionSelection1'];
            $arquivo2 = $_GET['optionSelection2'];

            if($arquivo1 == "file1.txt"){
                $file_1 = $file1;
            }elseif($arquivo1 == "file2.txt"){
                $file_1 = $file2;
            }else{
                $file_1 = $universo;
            }

            if($arquivo2 == "file1.txt"){
                $file_2 = $file1;
            }elseif($arquivo2 == "file2.txt"){
                $file_2 = $file2;
            }else{
                $file_2 = $universo;
            }

            $result1 = array_diff($file_2,$file_1);
            $result2 = array_diff($file_1,$file_2);

            if(empty($result2) && count($result1) > 0){
                $instancia->writeText("output","output.txt", "O Conjunto ".$arquivo1." é SubConjunto próprio do Conjunto ".$arquivo2);
            }else{
                if(empty($result2) && empty($result1)){
                    $instancia->writeText("output","output.txt", "O Conjunto ".$arquivo1." é SubConjunto do Conjunto ".$arquivo2);
                }else{
                    $instancia->writeText("output","output.txt", "O Conjunto ".$arquivo1." NÃO é SubConjunto do Conjunto ".$arquivo2);
                }
            }
            break;
        case"Uniao":
            $result = array_unique(array_merge($file1, $file2));
            $instancia->writeFile("output","output.txt",$result);
            break;
        case"Interseccao":
            $result = array_uintersect($file1, $file2,"strcasecmp");
            $instancia->writeFile("output","output.txt",$result);
            break;
        default:
            echo"Nao foi possivel encontrar o Tipo";
            break;
        case"Complemento":
            $result = array_diff($universo, $file1);
            $instancia->writeFile("output","output.txt",$result);
            break;
    }
    header("location:/Algebra-de-Conjuntos-com-PHP?optionTipo=".$tipo);
}else{
    echo "Necessita de uma requisicao GET";
}
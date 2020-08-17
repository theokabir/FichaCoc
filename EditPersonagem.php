<?php
session_start();
require_once('connect.php');

//variaveis do formulario
    //basico personagem
        //campos text
            $nome = (isset($_POST['nome']))?$_POST['nome']:"indefinido";
            $ocupacao = (isset($_POST['ocupacao']))?$_POST['ocupacao']:"indefinido";
            $jogador = (isset($_POST['jogador']))?$_POST['jogador']:"indefinido";
            $localnascimento = (isset($_POST['localnascimento']))?$_POST['localnascimento']:"indefinido";
            $sexo = (isset($_POST['sexo']))?$_POST['sexo']:"indefinido";

        //campos number
            $idade = (isset($_POST['idade']))?$_POST['idade']:18;
            $sorte = (isset($_POST['sorte']))?$_POST['sorte']:1;

            if($sorte > 100){
                $sorte = 100;
            }

        //campos date
            $datanascimento = (isset($_POST['datanascimento']))?$_POST['datanascimento']:date("Y-m-d");

    //caracteristicas
        $FOR = (isset($_POST['FOR']))?$_POST['FOR']:1;
        $CON = (isset($_POST['CON']))?$_POST['CON']:1;
        $DES = (isset($_POST['DES']))?$_POST['DES']:1;
        $TAM = (isset($_POST['TAM']))?$_POST['TAM']:1;
        $APA = (isset($_POST['APA']))?$_POST['APA']:1;
        $INT = (isset($_POST['INT']))?$_POST['INT']:1;
        $EDU = (isset($_POST['EDU']))?$_POST['EDU']:1;
        $POD = (isset($_POST['POD']))?$_POST['POD']:1;

    //renda
        //campos number
            $renda = (isset($_POST['renda']))?$_POST['renda']:1;
            $diario = (isset($_POST['diario']))?$_POST['diario']:1;
            $economia = (isset($_POST['economia']))?$_POST['economia']:1;

        //campos textarea
            $posse = (isset($_POST['posse']))?$_POST['posse']:"nada";
            $imoveis = (isset($_POST['imoveis']))?$_POST['imoveis']:"nada";
    
    //historia
        $historia = (isset($_POST['historia']))?$_POST['historia']:"indefinida";

//vida e sanidade
    $vida =  floor((($CON/5)+($TAM/5))/2);
    $sanidade = $POD;

    $fordf = ceil($FOR / 5);
    $tamdf = ceil($TAM / 5);

    $bdbase = $fordf + $tamdf;

    $BD = "";

    if($bdbase >= 2 && $bdbase <= 12){
        $BD = "-1D6";
    }elseif($bdbase >= 13 && $bdbase <= 16){
        $BD = "-1D4";
    }elseif($bdbase >= 17 && $bdbase <= 24){
        $BD = "0";
    }elseif($bdbase >= 25 && $bdbase <= 32){
        $BD = "+1D4";
    }elseif($bdbase >= 33 && $bdbase <= 40){
        $BD = "+1D6";
    }else{
        $BD = "ERRO";
    }

//querys
    $query_personagem = "UPDATE personagem SET nome = '$nome', jogador = '$jogador', localnascimento = '$localnascimento', datanascimento = '$datanascimento', idade = '$idade', sexo = '$sexo', bd = '$BD', vidatotal = '$vida', vidaatual = '$vida', sanidade = '$sanidade', historia = '$historia', ocupacao = '$ocupacao', sorte='$sorte' WHERE id = '1'";
    $query_renda = "UPDATE renda SET Renda = '$renda', Diario = '$diario', Economia = '$economia', Posse = '$posse', Imoveis = '$imoveis'  WHERE ID = '1' ";
    //caracteristicas
        $query_FOR = "UPDATE caracteristica SET pontos = '$FOR' WHERE ID = '1'";
        $query_CON = "UPDATE caracteristica SET pontos = '$CON' WHERE ID = '2'";
        $query_DES = "UPDATE caracteristica SET pontos = '$DES' WHERE ID = '3'";
        $query_TAM = "UPDATE caracteristica SET pontos = '$TAM' WHERE ID = '4'";
        $query_APA = "UPDATE caracteristica SET pontos = '$APA' WHERE ID = '5'";
        $query_INT = "UPDATE caracteristica SET pontos = '$INT' WHERE ID = '6'";
        $query_EDU = "UPDATE caracteristica SET pontos = '$EDU' WHERE ID = '7'";
        $query_POD = "UPDATE caracteristica SET pontos = '$POD' WHERE ID = '8'";

//mysqli_query
    $query_result_personagem = mysqli_query($conn, $query_personagem);
    $query_result_renda = mysqli_query($conn, $query_renda);
    //caracteristicas
        $query_result_FOR = mysqli_query($conn, $query_FOR);
        $query_result_CON = mysqli_query($conn, $query_CON);
        $query_result_DES = mysqli_query($conn, $query_DES);
        $query_result_TAM = mysqli_query($conn, $query_TAM);
        $query_result_APA = mysqli_query($conn, $query_APA);
        $query_result_INT = mysqli_query($conn, $query_INT);
        $query_result_EDU = mysqli_query($conn, $query_EDU);
        $query_result_POD = mysqli_query($conn, $query_POD);

//header
    $_SESSION['msg_success'] = "Personagem editado";
    header("Location: index.php");
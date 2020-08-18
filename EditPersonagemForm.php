<?php
require_once('connect.php');

$arrCac = [];

$query_personagem = "SELECT * FROM personagem";
$query_renda = "SELECT * FROM renda";
$query_caracteristicas = "SELECT * FROM caracteristica";

$query_result_personagem = mysqli_query($conn, $query_personagem);
$personagem = mysqli_fetch_assoc($query_result_personagem);

$query_result_renda = mysqli_query($conn, $query_renda);
$renda = mysqli_fetch_assoc($query_result_renda);

$query_result_caracteristicas = mysqli_query($conn, $query_caracteristicas);

while($caracteristicas = mysqli_fetch_assoc($query_result_caracteristicas)){
    array_push($arrCac, $caracteristicas['pontos']);
}

$nome_pers = $personagem['nome'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha - <?php echo $nome_pers ; ?> </title>
    <link rel="stylesheet" href="./public/css/bootstrap.css">
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="icon" type="image/png" href="icon/icone.png">
</head>
<body>
    
    <div class="container-fluid">
        <h3 class="text-center">Edição de personagem</h3>
        <!-- div para as informações basicas do personagem -->
        <form action="EditPersonagem.php" method="post">
            <div style="margin: 0px 270px" class="border rounded row p-2">

                <div class="col-6 p-2 border-right border-bottom">
                    <label for="nome">Nome:</label>
                        <!-- campo: nome -->
                        <input type="text" name="nome" id="nome" class="form form-control" value="<?php echo $personagem['nome'] ; ?>" required >

                    <label for="localnascimento">Local de nascimento:</label>
                        <!-- campo: localnascimento -->
                        <input required type="text" name="localnascimento" id="localnascimento" class="form form-control" value="<?php echo $personagem['localnascimento']; ?>">
                
                    <label for="idade">Idade:</label>
                        <!-- campo: idade -->
                        <input required type="number" name="idade" id="idade" class="form form-control" value="<?php echo $personagem['idade']; ?>">

                    <label for="ocupacao">Ocupação:</label>
                        <!-- campo: idade -->
                        <input required type="text" name="ocupacao" id="ocupacao" class="form form-control" value="<?php echo $personagem['ocupacao']; ?>">

               
                </div>
                <div class="col-6 p-2 border-bottom">

                    <label for="jogador">Jogador:</label>
                        <!-- campo: jogador -->
                        <input required type="text" name="jogador" id="jogador" class="form form-control" value="<?php echo $personagem['jogador']; ?>">

                    <label for="datanascimento">Data de nascimento:</label>
                        <!-- campo: datanascimento -->
                        <input required type="date" name="datanascimento" id="datanascimento" class="form form-control" value="<?php echo $personagem['datanascimento']; ?>">

                    <label for="sexo">Sexo:</label>
                        <!-- campo: sexo -->
                        <input required type="text" name="sexo" id="sexo" class="form form-control" value="<?php echo $personagem['sexo']; ?>">

                    <label for="sorte">Sorte:</label>
                        <!-- campo: sorte -->
                        <input required type="number" name="sorte" id="sorte" class="form form-control" value="<?php echo $personagem['sorte']; ?>">

                </div>
                <!-- div de caracteristicas -->
                <div class="col-12 p-4 border rounded mt-2">
                    <div class="row">
                        <div class="col-3 border rounded p-2">
                            <label for="FOR">FOR</label>
                                <!-- campo: FOR -->
                                <input required type="number" name="FOR" id="FOR" class="form form-control" value="<?php echo $arrCac[0] ; ?>">
                        </div>
                        <div class="col-3 border rounded p-2">
                            <label for="CON">CON</label>
                                <!-- campo: CON -->
                                <input required type="number" name="CON" id="CON" class="form form-control" value="<?php echo $arrCac[1] ; ?>">
                        </div>
                        <div class="col-3 border rounded p-2">
                            <label for="DES">DES</label>
                                <!-- campo: DES -->
                                <input required type="number" name="DES" id="DES" class="form form-control" value="<?php echo $arrCac[2] ; ?>">
                        </div>
                        <div class="col-3 border rounded p-2">
                            <label for="TAM">TAM</label>
                                <!-- campo: TAM -->
                                <input required type="number" name="TAM" id="TAM" class="form form-control" value="<?php echo $arrCac[3] ; ?>">
                        </div>
                        <div class="col-3 border rounded p-2">
                            <label for="APA">APA</label>
                                <!-- campo: APA -->
                                <input required type="number" name="APA" id="APA" class="form form-control" value="<?php echo $arrCac[4] ; ?>">
                        </div>
                        <div class="col-3 border rounded p-2">
                            <label for="INT">INT</label>
                                <!-- campo: INT -->
                                <input required type="number" name="INT" id="INT" class="form form-control" value="<?php echo $arrCac[5] ; ?>">
                        </div>
                        <div class="col-3 border rounded p-2">
                            <label for="EDU">EDU</label>
                                <!-- campo: EDU -->
                                <input required type="number" name="EDU" id="EDU" class="form form-control" value="<?php echo $arrCac[6] ; ?>">
                        </div>
                        <div class="col-3 border rounded p-2">
                            <label for="POD">POD</label>
                                <!-- campo: POD -->
                                <input required type="number" name="POD" id="POD" class="form form-control" value="<?php echo $arrCac[7] ; ?>">
                        </div>
                    </div>
                </div>
                <!-- div de renda -->
                <div class="col-12 p-4 border-top border-bottom mt-2 rounded ">
                    <div class="row">
                        <div class="col-6 border-right">

                            <label for="renda">Renda:</label>
                                <!-- campo: renda -->
                                <input required type="number" name="renda" id="renda" class="form form-control" value="<?php echo $renda['Renda']; ?>">

                            <label for="diario">Dinheiro diario:</label>
                                <!-- campo: diario -->
                                <input required type="number" name="diario" id="diario" class="form form-control" value="<?php echo $renda['Diario']; ?>">

                            <label for="economia">Economia:</label>
                                <!-- campo: economia -->
                                <input required type="number" name="economia" id="economia" class="form form-control" value="<?php echo $renda['Economia']; ?>">

                        </div>
                        <div class="col-6">
                            <label for="posses">Posse:</label>
                                <!-- campo: posse -->
                                <textarea required style="resize: none" name="posse" id="posse" class="form form-control"><?php echo $renda['Posse']; ?></textarea>
                            <label for="imoveis">Imoveis:</label>
                                <!-- campo: imoveis -->
                                <textarea  required style="resize: none"name="imoveis" id="imoveis" class="form form-control"><?php echo $renda['Imoveis']; ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- historia -->
                <div class="col-12" id="historia">
                    <h5>
                        <label for="historia"><strong>Historia:</strong></label>
                            <div class="alert alert-success alert-dismissible fade show col-12" role="alert">
                                    usar uma tag <strong>br</strong> para pular linhas
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <!-- campo: historia -->
                            <textarea required style="resize: none" name="historia" id="historia" cols="30" rows="10" class="form form-control"><?php echo $personagem['historia']; ?></textarea>
                    </h5>
                </div>
                <input type="submit" value="Editar" class="btn btn-primary btn-block">
            </div>

        </form>

    </div>
    <script src="./public/js/jquery.js"></script>
    <script src="./public/js/popper.js"></script>
    <script src="./public/js/bootstrap.js"></script>
</body>
</html>
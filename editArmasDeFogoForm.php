<?php
require_once('connect.php');
$query_personagem = "SELECT * FROM personagem";
$query_result_personagem = mysqli_query($conn, $query_personagem);
$personagem = mysqli_fetch_assoc($query_result_personagem);

$id = $_GET['id'];

$query_armasdefogo = "SELECT * FROM armasdefogo WHERE ID = '$id'";
$armasdefogo_result = mysqli_query($conn, $query_armasdefogo);
$armasdefogo = mysqli_fetch_assoc($armasdefogo_result);

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
</head>
<body>


    <div class="container-fluid">

        <h3 class="text-center">Editar arma de fogo</h3>
        <!-- div para as informações basicas do personagem -->
        <form action="editArmasDeFogo.php" method="post">
            <div style="margin: 0px 270px" class="border rounded row p-2">
                <h4 class="text-center m-auto col-12"><?php echo $armasdefogo['Nome']; ?></h4>
                <h5 class=" col-12"><label for="pontos" class="m-auto">Pontos:</label></h5>
                    <input type="number" name="pontos" id="pontos" class="form form-control" value="<?php echo $armasdefogo['Pontos']; ?>" required>

                <label for="check col-12"> <input type="checkbox" name="check" id="check" <?php if($armasdefogo['Checado']==1){echo "checked";} ?> > Checado</label>

                <input type="hidden" name="id" value="<?php echo $armasdefogo['ID']; ?>">

                <input type="submit" value="Editar" class="btn btn-lg btn-success col-12">
            </div>
        </form>

    </div>


    <script src="./public/js/jquery.js"></script>
    <script src="./public/js/popper.js"></script>
    <script src="./public/js/bootstrap.js"></script>
</body>
</html>
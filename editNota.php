<?php
require_once('connect.php');
$query_personagem = "SELECT * FROM personagem";
$query_result_personagem = mysqli_query($conn, $query_personagem);
$personagem = mysqli_fetch_assoc($query_result_personagem);
$nome_pers = $personagem['nome'];

$query_nota = "SELECT * FROM nota WHERE ID = 1";
$query_nota_result = mysqli_query($conn, $query_nota);
$nota = mysqli_fetch_assoc($query_nota_result);

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

        <h3 class="text-center">Editar Nota</h3>
        <!-- div para as informações basicas do personagem -->
        <form action="editNotaCode.php" method="post">
            <div style="margin: 0px 370px" class="border rounded row p-2">

                <label for="note">Anotações:</label>
                    <textarea required name="note" id="note" style="resize: none" class="form form-control" cols="30" rows="10"><?php echo $nota['NotaText']; ?></textarea>

                <input type="submit" value="Editar" class="btn btn-success btn-block mt-2">

            </div>
        </form>

    </div>


    <script src="./public/js/jquery.js"></script>
    <script src="./public/js/popper.js"></script>
    <script src="./public/js/bootstrap.js"></script>
</body>
</html>
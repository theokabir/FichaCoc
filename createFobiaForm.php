<?php
require_once('connect.php');
$query_personagem = "SELECT * FROM personagem";
$query_result_personagem = mysqli_query($conn, $query_personagem);
$personagem = mysqli_fetch_assoc($query_result_personagem);
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

        <h3 class="text-center">Criar Fobia</h3>
        <!-- div para as informações basicas do personagem -->
        <form action="createFobia.php" method="post">
            <div style="margin: 0px 370px" class="border rounded row p-2">

                <label for="nome">Nome:</label>
                    <!-- campo: nome -->
                    <input type="text" name="nome" id="nome" class="fomr form-control" required>

                <label for="desc">Descrição:</label>
                    <!-- campo: desc -->
                    <input type="text" name="desc" id="desc" class="form form-control" required>

                <!-- campo: check -->
                <label for="check"> <input type="checkbox" name="check" id="check"> Checar</label><br>
                <input type="submit" value="Criar" class="btn btn-success btn-block">
            </div>
        </form>

    </div>


    <script src="./public/js/jquery.js"></script>
    <script src="./public/js/popper.js"></script>
    <script src="./public/js/bootstrap.js"></script>
</body>
</html>
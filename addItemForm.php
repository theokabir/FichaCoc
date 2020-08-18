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

        <h3 class="text-center">Adicionar item</h3>
        <!-- div para as informações basicas do personagem -->
        <form action="addItem.php" method="post">
            <div style="margin: 0px 370px" class="border rounded row p-2">

                <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form form-control" required>
            
                <label for="qtd">Quantidade:</label>
                    <input type="number" name="qtd" id="qtd" class="form form-control" value="1" required>
            
                <label for="desc">Descrição:</label>
                    <textarea required name="desc" id="desc" style="resize: none" class="form form-control" cols="30" rows="10"></textarea>

                <input type="submit" value="Adicionar" class="btn btn-success btn-block mt-2">

            </div>
        </form>

    </div>


    <script src="./public/js/jquery.js"></script>
    <script src="./public/js/popper.js"></script>
    <script src="./public/js/bootstrap.js"></script>
</body>
</html>
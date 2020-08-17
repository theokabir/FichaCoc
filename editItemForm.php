<?php
require_once('connect.php');
$query_personagem = "SELECT * FROM personagem";
$query_result_personagem = mysqli_query($conn, $query_personagem);
$personagem = mysqli_fetch_assoc($query_result_personagem);
$nome_pers = $personagem['nome'];

$id = $_GET['id'];

$query_item = "SELECT * FROM item WHERE ID = '$id'";
$query_item_result = mysqli_query($conn, $query_item);
$item = mysqli_fetch_assoc($query_item_result);

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

        <h3 class="text-center">Editar item</h3>
        <!-- div para as informações basicas do personagem -->
        <form action="editItem.php" method="post">
            <div style="margin: 0px 370px" class="border rounded row p-2">

                <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form form-control" value="<?php echo $item['Nome']; ?>" required>
            
                <label for="qtd">Quantidade:</label>
                    <input type="number" name="qtd" id="qtd" class="form form-control" value="<?php echo $item['Quantidade']; ?>" required>
            
                <label for="desc">Descrição:</label>
                    <textarea required name="desc" id="desc" style="resize: none" class="form form-control" cols="30" rows="10"><?php echo $item['Descricao']; ?></textarea>

                <input type="hidden" name="id" value="<?php echo $item['ID']; ?>">
                <input type="submit" value="Editar" class="btn btn-success btn-block mt-2">

            </div>
        </form>

    </div>


    <script src="./public/js/jquery.js"></script>
    <script src="./public/js/popper.js"></script>
    <script src="./public/js/bootstrap.js"></script>
</body>
</html>
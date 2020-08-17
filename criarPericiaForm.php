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
</head>
<body>


    <div class="container-fluid">

        <h3 class="text-center">Criar Pericia</h3>
        <!-- div para as informações basicas do personagem -->
        <form action="criarPericia.php" method="post">
            <div style="margin: 0px 270px" class="border rounded row p-2">
                <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" placeholder="insira o nome da pericia" class="form form-control" required>
                <label for="subNome">Caracteristica:</label>
                    <input type="text" name="subNome" id="subNome" placeholder="insira o a caracteristica da pericia(opcional)" class="form form-control">
                <table class="col-12 border-bottom pb-2">
                    <tr>
                        <td class="border-right">
                            <label for="minimo">Mininmo:</label>
                                <input type="number" name="minimo" id="minimo" class="form form-control"required>
                        </td>
                        <td>
                            <label for="pontos">Pontos</label>
                                <input type="number" name="pontos" id="pontos" class="form form-control"required>
                        </td>
                    </tr>
                </table>

                <label for="extra"> <input type="checkbox" name="extra" id="extra"> Destacar</label>
                
                <input type="submit" value="Criar" class="btn btn-success btn-block mt-2">
            </div>
        </form>

    </div>


    <script src="./public/js/jquery.js"></script>
    <script src="./public/js/popper.js"></script>
    <script src="./public/js/bootstrap.js"></script>
</body>
</html>
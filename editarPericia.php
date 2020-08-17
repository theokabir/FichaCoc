<?php
require_once('connect.php');
$query_personagem = "SELECT * FROM personagem";
$query_result_personagem = mysqli_query($conn, $query_personagem);
$personagem = mysqli_fetch_assoc($query_result_personagem);

$id = $_GET['id'];

$query_pericia = "SELECT * FROM pericia WHERE ID = '$id'";
$pericia_result = mysqli_query($conn, $query_pericia);
$pericia = mysqli_fetch_assoc($pericia_result);

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

        <h3 class="text-center">Editar Pericia</h3>
        <!-- div para as informações basicas do personagem -->
        <form action="editPericia.php" method="post">
            <div style="margin: 0px 270px" class="border rounded row p-2">
                <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $pericia['Nome']; ?>" class="form form-control" required>
                <label for="subNome">Caracteristica:</label>
                    <input type="text" name="subNome" id="subNome"  value="<?php echo $pericia['SubNome']; ?>" class="form form-control">
                <table class="col-12 border-bottom pb-2">
                    <tr>
                        <td class="border-right">
                            <label for="minimo">Mininmo:</label>
                                <input type="number"  value="<?php echo $pericia['Minimo']; ?>"name="minimo" id="minimo" class="form form-control"required>
                        </td>
                        <td>
                            <label for="pontos">Pontos</label>
                                <input type="number" name="pontos" id="pontos"  value="<?php echo $pericia['Pontos']; ?>"class="form form-control"required>
                        </td>
                    </tr>
                </table>

                <label for="check" class="col-12"> <input type="checkbox" name="check" id="check" <?php if($pericia['Checado'] == 1){echo "checked";} ?> > Checar</label>
                <label for="extra" class="col-12"> <input type="checkbox" name="extra" id="extra" <?php if($pericia['extra'] == 1){echo "checked";} ?> > Pericia extra</label>

                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="submit" value="Editar" class="btn btn-success btn-block mt-2">
                <a href="deletPericia.php?id=<?php echo $id; ?>" class="btn btn-danger btn-block mt-2">Deletar Pericia</a>
            </div>
        </form>

    </div>


    <script src="./public/js/jquery.js"></script>
    <script src="./public/js/popper.js"></script>
    <script src="./public/js/bootstrap.js"></script>
</body>
</html>
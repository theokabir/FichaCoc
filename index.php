<?php
session_start();
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
        <?php if(isset($_SESSION['msg_success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['msg_success']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if(isset($_SESSION['msg_danger'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <?php echo $_SESSION['msg_danger']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
            <!-- primeira row -->
        <div class="row mb-2">

            <!-- Personagem e renda -->
            <div class="col-lg-3 col-12 caixa p-0">
                <ul class="col-12 rounded">
                    <li class="mx-0 mb-2">
                        <!-- Personagem -->
                        <div class="border p-4 rounded">
                            <h5 class="text-center"><strong>Personagem</strong> <a href="EditPersonagemForm.php" class="btn btn-outline-success">Editar</a> </h5>
                            <?php
                            echo "<b>Nome: </b>" . $personagem['nome'] ."<br>";
                            echo "<b>Jogador: </b>" . $personagem['jogador'] ."<br>";
                            echo "<b>Ocupação: </b>" . $personagem['ocupacao'] ."<br>";
                            echo "<b>Local de Nascimento: </b>" . $personagem['localnascimento'] ."<br>";
                            echo "<b>Data de nascimento: </b>" . (date( "d/m/Y" , strtotime($personagem['datanascimento']))) ."<br>";
                            echo "<b>Idade: </b>" . $personagem['idade'] ."<br>";
                            echo "<b>Sexo: </b>" . $personagem['sexo'] ."<br>";
                            echo "<b>Bônus de dano: </b>" . $personagem['bd'] ."<br>";
                            echo "<b>Vida: </b><span style=\"color: red\">" . $personagem['vidaatual'] . "/" .$personagem['vidatotal']. "</span> <a href=\"addLife.php?life=". $personagem['vidaatual'] . "\" class=\"btn-life d-inline-block\">+</a><a href=\"subLife.php?life=" .$personagem['vidaatual']. "\" class=\"btn-life d-inline-block menos\"> - </a> <br>";
                            ?>
                            <input type="checkbox" name="#" id="#"> Morrendo <br>
                            <input type="checkbox" name="#" id="#"> Lesão Grave <br>
                            <?php
                            echo "<b>Sanidade: </b><span style=\"color: blue\">" . $personagem['sanidade'] . "/99</span> <a href=\"addSan.php?san=".$personagem['sanidade']."\" class=\"btn-sanity d-inline-block\">+</a><a href=\"subSan.php?san=".$personagem['sanidade']."\" class=\"btn-sanity d-inline-block menos\">-</a> <br>";
                            echo "<b>Sorte: </b><span style=\"color:green\">" . $personagem['sorte'] ."</span><br>";
                            ?>

                        </div>
                    </li>
                    <li class="mx-0">
                        <!-- Renda -->
                        <div class="border p-4 rounded caixaRenda"> 
                            <?php 
                            $query_renda = "SELECT * FROM renda";
                            $query_result_renda = mysqli_query($conn, $query_renda);
                            $renda = mysqli_fetch_assoc($query_result_renda);

                            echo "<b>Renda:</b> R$" . $renda['Renda'] . ",00<br>"; 
                            echo "<b>Dinheiro diário:</b> R$" . $renda['Diario'] . ",00<br>"; 
                            echo "<b>Economia:</b> R$" . $renda['Economia'] . ",00<br>"; 
                            
                            echo "<b>Posse:</b><br>";
                            echo "<div class=\" border rounded p-2 historia\" > ". $renda['Posse'] ."</div>";
                            
                            echo "<b>Imoveis:</b><br>";
                            echo "<div class=\" border rounded p-2 historia\" > ". $renda['Imoveis'] ."</div>";

                            ?>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Caracteristicas -->
            <div class="col-lg-2 col-12" style="margin-top: 25px">
                <div class="col-12 caixa">
                    <?php
                    $query_caracteristicas = "SELECT * FROM caracteristica";
                    $query_result_caracteristicas = mysqli_query($conn, $query_caracteristicas);
                    ?>
                    <h5 class="text-center"><strong>Caracteristicas</strong></h5>
                    <?php while($caracteristicas = mysqli_fetch_assoc($query_result_caracteristicas)): ?>
                        <!-- celula de caracteristica -->
                        <div class="border rounded p-2 my-2 row">
                            <p class="col-6 d-inline-block nCarac"><b><?php echo $caracteristicas['Nome'] ?></b></p>

                            <div  class='col-6 pr-4'>
                                <table>
                                    <tr>
                                        <td rowspan=2 class="border-right"> <?php echo $caracteristicas['pontos']; ?> </td>
                                        <td class="border-bottom"> <?php echo (ceil($caracteristicas['pontos']/2)); ?> </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo (ceil($caracteristicas['pontos']/5)); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>

            <!-- Pericias -->
            <div class="col-lg-7 col-12">

                    <div class="col-12 border rounded caixa">
                        <h5 class="text-center mt-3"><strong>Pericias  </strong><a href="criarPericiaForm.php" class="btn btn-outline-success">Criar nova</a></h5>

                        <?php
                        
                        $query_pericias = "SELECT * FROM pericia WHERE extra = '0' ORDER BY Nome";
                        $query_result_pericias = mysqli_query($conn, $query_pericias);

                        $query_destacados = "SELECT * FROM pericia WHERE extra = '1' ORDER BY Nome";
                        $query_destacados_result = mysqli_query($conn, $query_destacados);

                        ?>

                        <div class="row border-top rounded caixaPericias">
                        
                        <?php while($pericias_destacadas = mysqli_fetch_assoc($query_destacados_result)): ?>
                            
                            <div class="col-3 p-0 h my-3" style="height: 61px">
                                <div class="border rounded m-1 row <?php if($pericias_destacadas['extra']==1){echo " bg-light\" style=\" color: #0065b8" ;} ?>">
                                    <div class="col-8 border-right p-1" style="font-size: 15px">
                                        <input type="checkbox" name="<?php $pericias_destacadas['ID']; ?>" id="<?php $pericias_destacadas['ID']; ?>" <?php if($pericias_destacadas['Checado']==1){echo "checked"; } ?> disabled>
                                        <a href="editarPericia.php?id=<?php echo $pericias_destacadas['ID']; ?>" class="linkPericia"><?php echo $pericias_destacadas['Nome']; ?></a> <br> (<?php echo $pericias_destacadas['Minimo']; ?>%) 
                                        <?php 
                                        if(($pericias_destacadas['SubNome']) ){

                                            echo "<br>".$pericias_destacadas['SubNome'];

                                        } 
                                        ?>
                                    
                                    </div>

                                    <div class="col-4 ">
                                        <table class="my-1">
                                            <tr>
                                                <td rowspan=2 class="border-right"><?php echo $pericias_destacadas['Pontos']; ?></td>
                                                <td class="border-bottom"><?php echo (ceil($pericias_destacadas['Pontos']/2)); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo (ceil($pericias_destacadas['Pontos']/5)); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile; ?>
                        
                            <?php while($pericias = mysqli_fetch_assoc($query_result_pericias)): ?>
                                
                                <div class="col-3 p-0 h my-3" style="height: 61px">
                                    <div class="border rounded m-1 row <?php if($pericias['extra']==1){echo " bg-light\" style=\" color: #0065b8" ;} ?>">
                                        <div class="col-8 border-right p-1" style="font-size: 15px">
                                            <input type="checkbox" name="<?php $pericias['ID']; ?>" id="<?php $pericias['ID']; ?>" <?php if($pericias['Checado']==1){echo "checked"; } ?> disabled>
                                            <a href="editarPericia.php?id=<?php echo $pericias['ID']; ?>" class="linkPericia"><?php echo $pericias['Nome']; ?></a> <br> (<?php echo $pericias['Minimo']; ?>%) 
                                            <?php 
                                            if(($pericias['SubNome']) ){

                                                echo "<br>".$pericias['SubNome'];

                                            } 
                                            ?>
                                        
                                        </div>

                                        <div class="col-4 ">
                                            <table class="my-1">
                                                <tr>
                                                    <td rowspan=2 class="border-right"><?php echo $pericias['Pontos']; ?></td>
                                                    <td class="border-bottom"><?php echo (ceil($pericias['Pontos']/2)); ?></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo (ceil($pericias['Pontos']/5)); ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; ?>

                            <h5 class="text-center mt-2 col-12"><strong>Armas de fogo</strong></h5>

                            <?php
                                $query_armasdefogo = "SELECT * FROM armasdefogo";
                                $query_result_armasdefogo = mysqli_query($conn, $query_armasdefogo);
                            ?>
                            <?php while($armasdefogo = mysqli_fetch_assoc($query_result_armasdefogo)): ?>
                                
                                <div class="col-3 p-0 h">
                                    <div class="border rounded m-1 row">
                                        <div class="col-8 border-right p-1" style="font-size: 15px">
                                        <input type="checkbox" name="<?php $armasdefogo['ID']; ?>" id="<?php $armasdefogo['ID']; ?>" <?php if($armasdefogo['Checado']==1){echo "checked"; } ?> disabled>
                                            <a href="editArmasDeFogoForm.php?id=<?php echo $armasdefogo['ID']; ?>" class="linkPericia"><?php echo $armasdefogo['Nome']; ?></a> <br> (<?php echo $armasdefogo['Minimo']; ?>%) 
                                        </div>

                                        <div class="col-4 ">
                                            <table class="my-1">
                                                <tr>
                                                    <td rowspan=2 class="border-right"><?php echo $armasdefogo['Pontos']; ?></td>
                                                    <td class="border-bottom"><?php echo (ceil($armasdefogo['Pontos']/2)); ?></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo (ceil($armasdefogo['Pontos']/5)); ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                            
                        
                        </div>
                    </div>
            </div>

        </div>

        <!-- segunda row -->
        <div class="row border rounded">
            <div class="col-12 col-lg-8 p-4">
                <!-- golpes e armas -->
                <div class="row" id="armas">
                    <!-- golpes -->
                    <div class="col-6 border-right">
                    
                        <h5 class="text-center"><strong>Golpes</strong></h5>
                                            
                        <?php 
                        
                            $query_golpes = "SELECT * FROM golpe";
                            $query_result_golpes = mysqli_query($conn, $query_golpes);

                        ?>

                        <?php while($golpes = mysqli_fetch_assoc($query_result_golpes)): ?>

                            <div class="border rounded my-2 mr-2 row">
                                <div class="col-8">
                                    <p><strong><?php echo $golpes['Nome']; ?></strong></p>
                                </div>
                                <div class="col-04">
                                    <p><?php echo $golpes['Dano']; ?></p>
                                </div>
                            </div>

                        <?php endwhile; ?>

                    </div>
                    <!-- armas -->
                    <div class="col-6 border-right" id="armas">
                        <h5 class="text-center"><strong>Armas</strong>  <a href="addArmaForm.php" class="btn btn-outline-success">Adicionar</a></h5>
                        <?php if(isset($_SESSION['msg_success_arma'])): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['msg_success_arma']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif; ?>
                        <?php if(isset($_SESSION['msg_danger_arma'])): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo $_SESSION['msg_danger_arma']; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <?php 
                        
                            $query_armas = "SELECT * FROM armas ORDER BY nome";
                            $query_result_armas = mysqli_query($conn, $query_armas);

                        ?>

                        <?php while($armas = mysqli_fetch_assoc($query_result_armas)): ?>

                            <div class="border rounded my-2 mx-2 row">
                                <div class="col-5">
                                    <p><strong><a href="editArmaForm.php?id=<?php echo $armas['ID']; ?>" class="linkPericia"> <input type="checkbox" name="" id=""> <?php echo $armas['Nome']; ?></a></strong>

                                    <?php
                                    
                                        if($armas['BalasTotal'] > 0){
                                            echo "<br><strong>Municiadas: </strong>" . $armas['BalasCarregadas'];
                                            echo "<br><strong>Carga total: </strong>" . $armas['Pente'];
                                            echo "<br><strong>Munição: </strong>" . $armas['BalasTotal'];
                                        }

                                    ?>

                                    </p>

                                </div>
                                <div class="col-5">
                                    <p <?php  if($armas['BalasTotal'] > 0){echo "class=\"mt-4\"";}?>  style="font-size: 20px"><?php echo $armas['Dano']; ?> </p>
                                </div>
                                <div class="col-2">
                                    <a href="deletarArma.php?id=<?php echo $armas['ID']; ?>" class="btn btn-outline-danger<?php if($armas['BalasTotal'] > 0){echo " mt-4 ";}else{echo " mt-1 ";} ?>">X</a> 
                                </div>
                                <?php if($armas['BalasTotal'] > 0): ?>
                                    <p class="col-12"><a href="atirar.php?id=<?php echo $armas['ID']; ?>" class="btn btn-outline-info">atirar</a>   <a href="recarregar.php?id=<?php echo $armas['ID']; ?>" class="btn btn-outline-secondary">Regarregar</a></p>
                                <?php endif;?>
                            </div>

                        <?php endwhile; ?>

                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 p-4">
                <!-- itens -->
                <div class="col-12" id="itens">
                    <h5 class="text-center"><strong>Itens </strong> <a href="addItemForm.php" class="btn btn-outline-success">Adicionar</a></h5>
                    <?php if(isset($_SESSION['msg_success_item'])): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['msg_success_item']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['msg_danger_item'])): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['msg_danger_item']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <?php

                        $query_itens = "SELECT * FROM item";
                        $query_result_itens = mysqli_query($conn, $query_itens);

                    ?>

                    <?php while($itens = mysqli_fetch_assoc($query_result_itens)): ?>

                        <div class="border rounded p-4 my-2 row">
                            <p class="col-7"> <?php echo $itens['Quantidade'] ; ?>x <strong><a href="editItemForm.php?id=<?php echo $itens['ID']; ?>" class="linkPericia"><?php echo $itens['Nome'] ; ?></a></strong></p>
                            <p class="col-3"><a href="useItem.php?id=<?php echo  $itens['ID']; ?>" class="btn btn-outline-info">Usar</a></p>
                            <p class="col-2"><a href="deletItem.php?id=<?php echo  $itens['ID']; ?>" class="btn btn-outline-danger">X</a></p>
                            
                            <div class="border rounded p-2 col-12">
                                <?php echo $itens['Descricao']; ?>
                            </div>
                        </div>

                    <?php endwhile; ?>

                </div>
            </div>
        </div>
        <hr>
        <!-- Terceira row -->
        <div class="row">
            <!-- Historia -->
            <div class="col-6 border-right">
                <h5 class="text-center col-12"><strong>História</strong></h5>


                <div class="col-12">
                    <div class="border rounded p-4">
                        <?php echo $personagem['historia']; ?>
                    </div>
                </div>

            </div>

            <!-- Notas -->
            <div class="col-6">
                <h5 class="text-center col-12" id="notas"><strong><a href="editNota.php">Notas</a></strong></h5>
                

                <div class="col-12">
                    <div class="border rounded p-4">
                        <?php if(isset($_SESSION['msg_success_nota'])): ?>
                            <div class="alert alert-success alert-dismissible fade show col-12" role="alert">
                                <?php echo $_SESSION['msg_success_nota']; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <?php
                        
                            $query_nota = "SELECT * FROM nota";
                            $query_result_nota = mysqli_query($conn, $query_nota);
                            $nota = mysqli_fetch_assoc($query_result_nota);

                            echo $nota['NotaText'];

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./public/js/jquery.js"></script>
    <script src="./public/js/popper.js"></script>
    <script src="./public/js/bootstrap.js"></script>
    <?php session_destroy(); ?>
</body>
</html>
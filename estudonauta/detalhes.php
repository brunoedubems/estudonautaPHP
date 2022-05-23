<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titulo da página</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<?php
require_once "includes/banco.php";
require_once "includes/funcoesPHP.php";
?>


    <div id="corpo">
<?php
    $c = $_GET['cod'] ?? 0;
    $busca = $banco->query("select * from jogos where 
    cod='$c'");
?>
        <h1>Detalhes do</h1>
        <table class='detalhes'>
            <?php
            if(!$busca){
                echo "<tr><td>Busca falhou! $banco->error"; 
            }else {
                if($busca->num_rows == 1){
                    $reg = $busca->fetch_object();
                   echo  "<tr><td rowspan='3'>fotos";
                   echo "<td><h2>$reg->nome</h2>";
                   echo  "<tr><td>descrição";
                   echo "<tr><td>Adm</td></tr>";
                }else{
                    echo "<tr><td>Nenhum registro encontrado";
                }
            }
 
            ?>
        </table>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titulo da página</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/icon?
    family=Material+Icons" rel="stylesheet" /> 
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>

<body>
    <?php
    require_once "includes/banco.php";
    require_once "includes/funcoesPHP.php";
    ?>


    <div id="corpo">
        <?php
        include_once "topo.php";
        $c = $_GET['cod'] ?? 0;
        $busca = $banco->query("select * from jogos where 
    cod='$c'");
        ?>
        <h1>Detalhes do</h1>
        <table class='detalhes'>
            <?php
            if (!$busca) {
                echo "<tr><td>Busca falhou! $banco->error";
            } else {
                if ($busca->num_rows == 1) {
                    $reg = $busca->fetch_object();
                    $t = thumb($reg->capa);
                    echo  "<tr><td rowspan='3'><img src='$t' class='full'/>";
                    echo "<td><h2>$reg->nome</h2>";
                    echo "Nota: " . number_format($reg->nota, 1) .
                        "/10.0";
                    echo  "<tr><td>$reg->descricao";
                    echo "<tr><td>Adm</td></tr>";
                } else {
                    echo "<tr><td>Nenhum registro encontrado";
                }
            }

            ?>
        </table>
  <?php echo voltar() ?>
    </div>
    <?php include_once "rodape.php" ?>;
</body>

</html>
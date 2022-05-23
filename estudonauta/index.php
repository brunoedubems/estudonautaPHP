<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Jogos</title>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <?php
    require_once "includes/banco.php";
    require_once "includes/funcoesPHP.php";
    $ordem = $_GET['o'] ?? "n";

    ?>
    <div id="corpo">
        <?php include_once "topo.php";?>

        <h1>Escolha seu jogo</h1>
        <form method="get" id="busca" action="index.php">
            Ordernar:
            <a href="index.php?o=n">Nome</a> |
            <a href="index.php?o=p">Produtora</a> |
            <a href="index.php?o=n1">Nota Alta</a> |
            <a href="index.php?o=n2">Nota Baixa</a> |
            Buscar:<input type="text" name="c" size="10" maxlength="40"/>
            <input type="submit" value="Ok">
        </form>
        <table class="listagem">
            <?php
            $q = "select j.cod, j.nome, g.genero, p.produtora, j.capa 
            from jogos j join generos g on j.genero = g.cod
            join produtoras p on j.produtora = p.cod ";

            switch($ordem){
                case "p":
                    $q.= "ORDER BY p.produtora";
                    break;
                case "n1":
                    $q.= "ORDER BY j.nota DESC";
                    break;
                case "n2":
                    $q.= "ORDER BY j.nota ASC";
                    break;
                    default:
                    $q .= "ORDER BY j.nome";
                    break;
            }

            
            $busca = $banco->query($q);
            if (!$busca) {
                echo "<tr><td>Infelizmente a busca deu errado";
            } else {
                if ($busca->num_rows == 0) {
                    echo "<tr><td>Nenhum registro encontrado";
                } else {
                    while ($reg = $busca->fetch_object()) {
                        $t = thumb($reg->capa);
                        echo "<tr><td><img src='$t'
                         class='mini'/>";
                        echo "<td><a href='detalhes.php?cod=
                        $reg->cod'>$reg->nome</a>";
                        echo "$reg->genero";
                        echo "<br/> $reg->produtora";
                        echo "<td>Adm";
                    }
                }
            }
            ?>
        </table>
    </div>
    <?php include_once "rodape.php" ?>
</body>

</html>
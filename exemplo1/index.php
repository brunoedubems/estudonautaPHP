<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Jogos</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    require_once "includes/banco.php";
    ?>
    <div id="corpo">
        <h1>Escolha seu jogo</h1>
        <table class="listagem">
            <?php
            $busca = $banco->query("select * from jogos order by nome");
            if (!$busca) {
                echo "<tr><td>Infelizmente a busca deu errado";
            } else {
                if ($busca->num_rows == 0) {
                    echo "<tr><td>Nenhum registro encontrado";
                } else {
                    while($reg=$busca->fetch_object()){
                        echo "<tr><td><img src='fotos/$reg->capa' class='mini'/><td>$reg->nome";
                        echo "<td>Adm";

                    }
                }
            }
            ?>
        </table>
    </div>
    <?php $banco->close(); ?>
</body>

</html>
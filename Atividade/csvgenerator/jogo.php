<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador CSV - Autor</title>
</head>

<body>


        <h2>Gerador de Arquivo CSV</h2><br>

        <p>Arquivo CSV gerado com sucesso!</p><br>

        <input type="button" value="Página Inicial" onclick="window.open('../index.html', '_top');">
    </div>
</body>

</html>


<?php

include('../connection/connectionBD.php');

try {
    $stmt = $pdo->prepare('SELECT * FROM JogoCSV ORDER BY Jogo');
    $stmt->execute();

    $fp = fopen('../csvFile/jogo.csv', 'w');

    $titleColumns = array(' Jogo', 'Tipo');

    fputcsv($fp, $titleColumns);

    while ($row = $stmt->fetch()) {
        $Jogo = $row['Jogo'];
        $Tipo = $row['Tipo'];

        $list = array(
            array($Jogo, $Tipo)
        );

        foreach ($list as $line) {
            fputcsv($fp, $line);
        }
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

?>
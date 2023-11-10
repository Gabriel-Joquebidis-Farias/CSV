<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador CSV - Editora</title>
</head>
<body>

        <h2>Gerador de Arquivos CSV</h2><br>

        <p>Arquivo CSV gerado com sucesso!</p><br>

        <input type="button" value="Página Inicial" onclick="window.open('../index.html', '_top');">
    </div>
</body>
</html>

<?php

include('../connection/connectionBD.php');

try {
    $stmt = $pdo->prepare('SELECT * FROM PessoaCSV ORDER BY Nome');
    $stmt->execute();

    $fp = fopen('../csvFile/pessoa.csv', 'w');

    $titleColumns = array('Nome', 'Sobrenome');

    fputcsv($fp, $titleColumns);

    while($row = $stmt->fetch()) {
        $Nome = $row['Nome'];
        $Sobrenome = $row['Sobrenome'];

        $list = array(
            array($Nome, $Sobrenome)
        );

        foreach($list as $line) {
            fputcsv($fp, $line);
        }
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

?>
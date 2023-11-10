<?php
try {
    $db = 'mysql:host=143.106.241.3;dbname=cl201271;charset=utf8';
    $user = 'cl201271';
    $pswd = 'cl*01022006';
    $pdo = new PDO($db, $user, $pswd);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $output = 'Impossível conectar ao Banco de Dados: ' . $e . '<br>';
    echo $output;
}
?>
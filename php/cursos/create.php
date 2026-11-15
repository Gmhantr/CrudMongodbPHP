<?php

require '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $name = $_POST['nome'];
    $codigo = $_POST['codigo'];
    $descricao = $_POST['descricao'];
    $carga_horaria = $_POST['carga_horaria'];
    $modalide = $_POST['modalidade'];



    $bulk = new MongoDB\Driver\BulkWrite();

    $bulk->insert([
        'name' => $name,
        'codigo' => $codigo,
        'descricao' => $descricao,
        'carga_horaria' => $carga_horaria,
        'modalidade' => $modalide
    ]);


    $manager->executeBulkWrite($namespace2, $bulk);

    header('Location: ../../pages/cursos.html');
    exit;
}

// Gustavo Pacheco Delazari
?>


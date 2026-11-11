<?php

require '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

    $id = new MongoDB\BSON\ObjectId($_GET['id']);

    $dados = json_decode(file_get_contents('php://input'), true);

    $bulk = new MongoDB\Driver\BulkWrite();

    $bulk->update(
        ['_id' => $id],
        ['$set' => $dados],
        ['multi' => false]
    );

    $manager->executeBulkWrite($namespace, $bulk);

    echo "Estudante atualizado!";
}
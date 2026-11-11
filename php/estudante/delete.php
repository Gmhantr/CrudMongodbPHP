<?php

require '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    // Capturar o ID recebido pela URL
    $id = $_GET['id'];

    // Converter para ObjectId
    $id = new MongoDB\BSON\ObjectId($id);

    // Preparar operação de exclusão
    $bulk = new MongoDB\Driver\BulkWrite();

    $bulk->delete(
        ['_id' => $id],
        ['limit' => 1]
    );

    // Executar exclusão
    $resultado = $manager->executeBulkWrite($namespace, $bulk);

    header('Content-Type: application/json');

    if ($resultado->getDeletedCount() > 0) {
        echo json_encode([
            'mensagem' => 'Estudante excluído com sucesso!'
        ]);
    } else {
        http_response_code(404);

        echo json_encode([
            'erro' => 'Estudante não encontrado!'
        ]);
    }
}
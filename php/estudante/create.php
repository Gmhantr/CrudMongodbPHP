<?php

// create.php
require '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Dados do estudante
    $name = $_POST['name'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $celular = $_POST['celular'];

    // Dados do endereço
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $complemento = $_POST['complemento'];

    // Preparar documento
    $bulk = new MongoDB\Driver\BulkWrite();

    $bulk->insert([
        'name' => $name,
        'email' => $email,
        'cpf' => $cpf,
        'celular' => $celular,

        'endereco' => [
            'cep' => $cep,
            'rua' => $rua,
            'bairro' => $bairro,
            'cidade' => $cidade,
            'estado' => $estado,
            'complemento' => $complemento
        ]
    ]);

    // Inserir no MongoDB
    $manager->executeBulkWrite($namespace, $bulk);

    header('Location: ../../pages/estudantes.html');
    exit;
}
?>
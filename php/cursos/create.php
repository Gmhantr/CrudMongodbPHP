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


    $manager->executeBulkWrite($namespace2, $bulk);

    header('Location: ../../pages/estudante.html');
    exit;
}

// Gustavo Pacheco Delazari
?>


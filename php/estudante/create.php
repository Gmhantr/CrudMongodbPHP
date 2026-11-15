
<?php

require '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $celular = $_POST['celular'];

    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $complemento = $_POST['complemento'];

    // Receber cursos selecionados
    $cursos = $_POST['cursos'] ?? [];

    $cursosIds = [];

    foreach ($cursos as $id) {
        $cursosIds[] = new MongoDB\BSON\ObjectId($id);
    }

    $bulk = new MongoDB\Driver\BulkWrite();

    $bulk->insert([
        'name' => $name,
        'email' => $email,
        'cpf' => $cpf,
        'celular' => $celular,

        'cursos' => $cursosIds,

        'endereco' => [
            'cep' => $cep,
            'rua' => $rua,
            'bairro' => $bairro,
            'cidade' => $cidade,
            'estado' => $estado,
            'complemento' => $complemento
        ]
    ]);

    $manager->executeBulkWrite($namespace1, $bulk);

    header('Location: ../../pages/estudante.html');
    exit;
}

// Gustavo Pacheco Delazari + IA
?>

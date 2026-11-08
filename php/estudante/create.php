<?php
// create.php
require '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar dados do formulário
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

    // Preparar o documento para inserção
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->insert([
        'name' => $name,
        'email' => $email,
        'cpf'=> $cpf,
        'celular'=> $celular,
        'cep'=> $cep,
        'rua'=> $rua,
        'bairro' => $bairro,
        'cidade'=> $cidade,
        'estado'=> $estado,
        'complemento'=> $complemento
        
    ]);

    // Inserir no MongoDB
    $manager->executeBulkWrite('escola.estudante', $bulk);

    echo "Estudante cadastrado com sucesso";
}
?>
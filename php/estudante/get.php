<?php

require '../connection.php';

$query = new MongoDB\Driver\Query([]);

$resultado = $manager->executeQuery($namespace, $query);

$estudantes = [];

foreach ($resultado as $estudante) {
    $estudantes[] = $estudante;
}

header('Content-Type: application/json');

echo json_encode($estudantes);
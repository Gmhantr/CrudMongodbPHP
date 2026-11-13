<?php

require '../connection.php';

$query = new MongoDB\Driver\Query([]);

$resultado = $manager->executeQuery($namespace1, $query);

$estudantes = [];

foreach ($resultado as $estudante) {
    $estudantes[] = $estudante;
}

header('Content-Type: application/json');

echo json_encode($estudantes);
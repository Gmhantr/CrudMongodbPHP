<?php

require '../connection.php';

$query = new MongoDB\Driver\Query([]);

$resultado = $manager->executeQuery($namespace2, $query);

$cursos = [];

foreach ($resultado as $curso) {
    $cursos[] = $curso;
}

header('Content-Type: application/json');

echo json_encode($cursos);

// Gustavo Pacheco Delazari
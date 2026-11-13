<?php

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

$banco = "escola";
$colecao1 = "estudante";
$colecao2 = "cursos";

$namespace1 = "$banco.$colecao1";
$namespace2 = "$banco.$colecao2";

?>
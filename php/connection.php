<?php

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

$banco = "escola";
$colecao = "estudante";

$namespace = "$banco.$colecao";

?>
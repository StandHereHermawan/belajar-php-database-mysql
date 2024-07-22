<?php

require_once __DIR__ . "/Koneksi.php";

$connection = getConnection();

$sqlQueries = <<<SQL
SELECT * FROM customers
SQL;

$queriesResult = $connection->query($sqlQueries); # : PDOStatement
foreach ($queriesResult as $row) {
    # var_dump($row);
    $id = $row["Id"];
    $name = $row["Name"];
    $email = $row["Email"];

    echo  PHP_EOL . "Id\t: $id" . PHP_EOL;
    echo "Name\t: $name" . PHP_EOL;
    echo "Email\t: $email" . PHP_EOL;
}

$connection = null;

<?php

function getConnection(): PDO
{
    $host = "localhost";
    $port = 3306;
    $database = "belajar_php_database";
    $username = "root";
    $password = "Rasis@Born12";

    return new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
}

$connection = getConnection();

$sql = <<<SQL
 INSERT INTO customers(Id, Name, Email)
 VALUES ('holyWibu','Kevin',"Kevin@wibu.example");
 SQL;
$connection->exec($sql);

$sql = <<<SQL
INSERT INTO customers(Id, Name, Email)
VALUES ('rkyhrmwn','Ricky Hermawan',"Ricky@test.example");
SQL;

$connection->exec($sql);

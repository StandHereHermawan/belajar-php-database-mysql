<?php

function testKoneksiMariaDB(): void
{
    $host = "localhost";
    $port = 3306;
    $username = "root";
    $databaseName = "belajar_php_database";
    $password = "12032003@Arief";

    $connection = new PDO("mysql:host=$host:$port;dbname=$databaseName", $username, $password);
    echo "Sukses Terkoneksi ke database." . PHP_EOL;
}

function testKoneksiMariaDBParameter(string $username): void
{
    $host = "localhost";
    $port = 3306;
    $databaseName = "belajar_php_database";
    $password = "";

    $connection = new PDO("mysql:host=$host:$port;dbname=$databaseName", $username, $password);
    echo "Sukses Terkoneksi ke database." . PHP_EOL;
}

testKoneksiMariaDB();

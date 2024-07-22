<?php

function testKoneksiMariaDBkeDatabasePHP(string $username): void
{
    $host = "localhost";
    $port = 3306;
    $databaseName = "belajar_php_database";
    $password = "";

    try {
        $connection = new PDO("mysql:host=$host:$port;dbname=$databaseName", $username, $password);
        echo "Sukses Terkoneksi ke database." . PHP_EOL;
    } catch (\Throwable $th) {
        echo "Gagal Terkoneksi ke MariaDB. Error:" . $th->getMessage() . PHP_EOL;
    } finally {
        $connection = null;
    }
}

function testKoneksiMariaDBDua(string $username, string $password): void
{
    $host = "localhost";
    $port = 3306;
    $databaseName = "belajar_php_database";

    try {
        $connection = new PDO("mysql:host=$host:$port;dbname=$databaseName", $username, $password);
        echo "Sukses Terkoneksi ke database." . PHP_EOL;
    } catch (PDOException $e) {
        echo "Gagal Terkoneksi ke MariaDB. Error:" . $e->getMessage() . PHP_EOL;
    } finally {
        unset($connection);
    }
}

# testKoneksiMariaDBkeDatabasePHP("root");
testKoneksiMariaDBDua("AriefInParis", "12032003@Arief");

<?php

require_once __DIR__ . "/Koneksi.php";

$connection = getConnection();

$sql = "SELECT * FROM customers";
$preparedStatement = $connection->query($sql);

# $customers = $preparedStatement->fetch();
# var_dump($customers);

$customers = $preparedStatement->fetchAll();
var_dump($customers);
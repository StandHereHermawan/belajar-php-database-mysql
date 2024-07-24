<?php

require_once __DIR__ . "/Koneksi.php";

$connection = getConnection();

$username = "terry";
$password = "voodooLicious";

$sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
$preparedStatement = $connection->prepare($sql);
$preparedStatement->execute([$username, $password]); # Binding Parameter di function execute() milik PDO. 

if ($row = $preparedStatement->fetch()) { # Function fetch().
    echo "SUKSES LOGIN : " . $row["username"] . PHP_EOL;
} else {
    echo "GAGAL LOGIN." . PHP_EOL;
}
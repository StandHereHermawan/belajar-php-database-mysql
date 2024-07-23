<?php

require_once __DIR__ . "/Koneksi.php";

$connection = getConnection();

# Membuat SQL Input dari user.
{
    $username = "admin";
    $password = "rahasia";

    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password';";
    $queryResult = $connection->query($sql);

    $success = false;
    $find_user = null;
    foreach ($queryResult as $row) {
        $success = true;
        $find_user = $row["username"];
    }

    if ($success) {
        echo "SUKSES LOGIN : $find_user" . PHP_EOL;
    } else {
        echo "GAGAL LOGIN" . PHP_EOL;
    }
}

# SQL Injection.
{
    $username = "admin'; #"; # SQL Injection.
    $password = "salah";

    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password';";
    $queryResult = $connection->query($sql); # Function query() dan exec() pada PDOStatement tidak memiliki proteksi terhadap SQL Injection.

    $success = false;
    $find_user = null;
    foreach ($queryResult as $row) {
        $success = true;
        $find_user = $row["username"];
    }

    if ($success) {
        echo "SUKSES LOGIN : $find_user" . PHP_EOL;
    } else {
        echo "GAGAL LOGIN" . PHP_EOL;
    }
}

# Salah Satu Solusi SQL Injection.
{
    $usernameLogin = "admin'; #";
    $passwordLogin = "salah";

    $username = $connection->quote($usernameLogin);
    $password = $connection->quote($passwordLogin);

    $sql = "SELECT * FROM admin WHERE username = $username AND password = $password;";
    $queryResult = $connection->query($sql); # Function query() dan exec() pada PDOStatement tidak memiliki proteksi terhadap SQL Injection.

    $success = false;
    $find_user = null;
    foreach ($queryResult as $row) {
        $success = true;
        $find_user = $row["username"];
    }

    echo $sql . PHP_EOL;

    if ($success) {
        echo "SUKSES LOGIN : $find_user" . PHP_EOL;
    } else {
        echo "GAGAL LOGIN" . PHP_EOL;
    }
}

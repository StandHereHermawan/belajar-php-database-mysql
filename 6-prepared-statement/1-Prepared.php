<?php

require_once __DIR__ . "/Koneksi.php";

$connection = getConnection();

# Membuat Prepare Statement.
{
    $usernameLogin = "admin";
    $passwordLogin = "rahasia";

    $username = $usernameLogin;
    $password = $passwordLogin;

    $sql = "SELECT * FROM admin WHERE username = :username AND password = :password;";
    $prepareStatement = $connection->prepare($sql); # Function prepare(), Prepare Statement.

    # Binding Parameter.
    $prepareStatement->bindParam("username", $username);
    $prepareStatement->bindParam("password", $password);
    $prepareStatement->execute();

    $success = false;
    $find_user = null;
    foreach ($prepareStatement as $row) {
        $success = true;
        $find_user = $row["username"];
    }

    echo $sql . PHP_EOL;

    if ($success) {
        echo "SUKSES LOGIN : $find_user" . PHP_EOL;
    } else {
        echo "GAGAL LOGIN" . PHP_EOL;
    }

    $connection = null;
}

$connection = getConnection();
# Membuat Prepare Statement.
# Dengan Binding Parameter dengan Index.
{
    $usernameLogin = "admin";
    $passwordLogin = "rahasia";

    $username = $usernameLogin;
    $password = $passwordLogin;

    $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
    $prepareStatement = $connection->prepare($sql); # Function prepare(), Prepare Statement.

    # Binding Parameter dengan Index.
    $prepareStatement->bindParam(1, $username);
    $prepareStatement->bindParam(2, $password);
    $prepareStatement->execute();

    $success = false;
    $find_user = null;
    foreach ($prepareStatement as $row) {
        $success = true;
        $find_user = $row["username"];
    }

    echo $sql . PHP_EOL;

    if ($success) {
        echo "SUKSES LOGIN : $find_user" . PHP_EOL;
    } else {
        echo "GAGAL LOGIN" . PHP_EOL;
    }

    $connection = null;
}

$connection = getConnection();
# Membuat Prepare Statement.
# Binding Parameter di function Execute.
{
    $usernameLogin = "terry";
    $passwordLogin = "voodooLicious";

    $username = $usernameLogin;
    $password = $passwordLogin;

    $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
    $prepareStatement = $connection->prepare($sql); # Function prepare(), Prepare Statement.
    # Binding Parameter di function execute.
    # Tidak menggunakan function bindParam() milik PHP Data Object.
    $prepareStatement->execute([$username, $password]);

    $success = false;
    $find_user = null;
    foreach ($prepareStatement as $row) {
        $success = true;
        $find_user = $row["username"];
    }

    echo $sql . PHP_EOL;

    if ($success) {
        echo "SUKSES LOGIN : $find_user" . PHP_EOL;
    } else {
        echo "GAGAL LOGIN" . PHP_EOL;
    }

    $connection = null;
}

<?php

require_once __DIR__ . "/Koneksi.php";

$connection = getConnection();

# Operasi Insert ke Database.
# Membuat Prepare Statement.
{
    $usernameLogin = "andrew";
    $passwordLogin = "minix pc";

    $username = $usernameLogin;
    $password = $passwordLogin;

    $sql = "INSERT INTO admin(username, password) VALUES(:username, :password)";
    $prepareStatement = $connection->prepare($sql); # Function prepare(), Prepare Statement.
    $prepareStatement->bindValue("username", $username);
    $prepareStatement->bindValue("password", $password);
    $prepareStatement->execute();

    $connection = null;
}

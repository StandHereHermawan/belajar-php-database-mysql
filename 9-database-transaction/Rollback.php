<?php

require_once __DIR__ . "/Koneksi.php";

$connection = getConnection();
$connection->beginTransaction();

# 1.
$email = "Terry@Racist.example";
$comment = "im not gay like linus, i wrote my own fucking compiler.";

$sql = "INSERT INTO comments(email, comment) VALUES(:email, :comment)";

$prepareStatement = $connection->prepare($sql);
$prepareStatement->bindValue("email", $email);
$prepareStatement->bindValue("comment", $comment);
$prepareStatement->execute();

# 2.
$email = "Terry@Racist.example";
$comment = "im not gay like linus, i wrote my own fucking compiler.";

$sql = "INSERT INTO comments(email, comment) VALUES(:email, :comment)";

$prepareStatement = $connection->prepare($sql);
$prepareStatement->bindValue("email", $email);
$prepareStatement->bindValue("comment", $comment);
$prepareStatement->execute();


$id = $connection->lastInsertId();

var_dump($id);

$connection->rollBack();
$connection = null;

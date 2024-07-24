<?php

require_once __DIR__ . "/Koneksi.php";

$connection = getConnection();

$email = "mantap_bullshit@omdo.example";
$comment = "Besok Urang Mau Rajin Coding.";

$sql = "INSERT INTO comments(email, comment) VALUES(:email, :comment)";
$prepareStatement = $connection->prepare($sql);
$prepareStatement->bindValue("email", $email);
$prepareStatement->bindValue("comment", $comment);
$prepareStatement->execute();

# function untuk Cek value Id terakhir pada kolom id autoIncrement.
$id = $connection->lastInsertId();

var_dump($id);

$connection = null;

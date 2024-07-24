<?php

require_once __DIR__ . "/Koneksi.php";

$connection = getConnection();
$connection->beginTransaction();

# 1.
$email = "mantap_omong_doang@bullshit.example";
$comment = "Isukan urang dek rajin ngoding.";

$sql = "INSERT INTO comments(email, comment) VALUES(:email, :comment)";

$prepareStatement = $connection->prepare($sql);
$prepareStatement->bindValue("email", $email);
$prepareStatement->bindValue("comment", $comment);
$prepareStatement->execute();

# 2.
$email = "mantap_omong_doang@bullshit.example";
$comment = "keur ngoding urang *emot stiker bodoh.";

$sql = "INSERT INTO comments(email, comment) VALUES(:email, :comment)";

$prepareStatement = $connection->prepare($sql);
$prepareStatement->bindValue("email", $email);
$prepareStatement->bindValue("comment", $comment);
$prepareStatement->execute();


$id = $connection->lastInsertId();

var_dump($id);

$connection->commit();
$connection = null;

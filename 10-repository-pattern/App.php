<?php

require_once __DIR__ . "/helper/Koneksi.php";
require_once __DIR__ . "/model/Model.php";
require_once __DIR__ . "/repository/Repository.php";

use Repository\CommentRepositoryImpl;
use Entity\Comment;

main();

function main()
{
    testGetAllComments();
}


function testAdd()
{
    $connection = getConnection();
    $repository = new CommentRepositoryImpl($connection);

    $recordCommentBaru = new Comment(email: "bohong_banget_ygy@bocah_slta.example", comment: "Dek Fokus ngoding urang.");
    $insertToDatabase = $repository->insert($recordCommentBaru);

    var_dump($insertToDatabase->getId());

    $connection = null;
}

function testGetById()
{
    $connection = getConnection();
    $repository = new CommentRepositoryImpl($connection);

    $comment = $repository->findById(29);
    var_dump($comment);

    $connection = null;
}

function testGetAllComments()
{
    $connection = getConnection();
    $repository = new CommentRepositoryImpl($connection);

    $allComment = $repository->findAll();
    var_dump($allComment);

    $connection = null;
}

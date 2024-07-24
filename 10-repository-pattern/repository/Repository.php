<?php

namespace Repository;

use Entity\Comment;

interface CommentRepository
{
    function insert(Comment $comment): Comment;
    function findbyId(int $id): ?Comment;
    function findAll(): array;
}

class CommentRepositoryImpl implements CommentRepository
{
    public function __construct(private \PDO $connection)
    {
    }

    function insert(Comment $comment): Comment
    {
        $sqlSyntax = "INSERT INTO comments(email, comment) VALUES (?, ?)";
        $prepareStatement = $this->connection->prepare($sqlSyntax);
        $prepareStatement->execute([$comment->getEmail(), $comment->getComment()]);
        $comment->setId((int)$this->connection->lastInsertId());
        return $comment;
    }

    public function findById(int $id): ?Comment
    {
        $sqlSyntax = "SELECT * FROM comments WHERE id = ?";
        $prepareStatement = $this->connection->prepare($sqlSyntax);
        $prepareStatement->execute([$id]);

        if ($row = $prepareStatement->fetch()) {
            return new Comment(
                id: $row["id"],
                email: $row["email"],
                comment: $row["comment"],
            );
        } else {
            return null;
        }
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM comments";
        $prepareStatement = $this->connection->prepare($sql);
        $prepareStatement->execute();

        $array = [];

        while ($row = $prepareStatement->fetch()) {
            $array[] = new Comment(
                id: $row["id"],
                email: $row["email"],
                comment: $row["comment"],
            );
        }

        return $array;
    }
}

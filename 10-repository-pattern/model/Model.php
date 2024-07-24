<?php

namespace Entity;

class Comment
{
    public function __construct(
        private ?int $id = null,
        private ?string $email = null,
        private ?string $comment = null,
    ) # Kode Konstructor.
    {
        # Kode Konstructor.
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }
}

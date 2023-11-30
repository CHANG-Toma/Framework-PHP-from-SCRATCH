<?php

namespace App\Models;

class User extends \App\Core\DB
{
    private int $id;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $pwd;
    private int $status;
    private bool $isDeleted;

    public function __construct()
    {
        parent::__construct(); // Call the parent constructor
        $this->table = 'user'; // Set the table name
    }

    // Getters and Setters
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPwd(): string
    {
        return $this->pwd;
    }

    public function setPwd(string $pwd): void
    {
        $this->pwd = $pwd; // Ideally, you should hash the password
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function isDeleted(): bool
    {
        return $this->isDeleted;
    }

    public function setIsDeleted(bool $isDeleted): void
    {
        $this->isDeleted = $isDeleted;
    }

    protected function getData(): array
    {
        return [
            'firstname' => $this->getFirstname(),
            'lastname' => $this->getLastname(),
            'email' => $this->getEmail(),
            'pwd' => $this->getPwd(),
        ];
    }
}
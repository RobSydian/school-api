<?php

declare(strict_types=1);

namespace App\Student\Domain;

class Student
{
    private string $id;
    private string $name;
    private string $surname1;
    private string $email;
    private ?string $surname2;
    private ?string $phoneNumber;

    public function __construct(string $id, string $name, string $surname1, string $email, ?string $surname2, ?string $phoneNumber)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname1 = $surname1;
        $this->email = $email;
        $this->surname2 = $surname2;
        $this->phoneNumber = $phoneNumber;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function surname1(): string
    {
        return $this->surname1;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function surname2(): ?string
    {
        return $this->surname2;
    }

    public function phoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
}

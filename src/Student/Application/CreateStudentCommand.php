<?php

declare(strict_types=1);

namespace App\Student\Application;

use App\Common\Application\Command;

class CreateStudentCommand implements Command
{
    private string $name;
    private string $surname1;
    private string $email;
    private ?string $phoneNumber;
    private ?string $surname2;

    public function __construct(
        string $name,
        string $surname1,
        string $email,
        ?string $phoneNumber = null,
        ?string $surname2 = null
    ) {
        $this->name = $name;
        $this->surname1 = $surname1;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->surname2 = $surname2;
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

    public function phoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function surname2(): ?string
    {
        return $this->surname2;
    }
}

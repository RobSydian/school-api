<?php

declare(strict_types=1);

namespace App\Student\Domain;

use App\Common\Domain\Aggregate;

class Student extends Aggregate
{
    private string $id;
    private string $name;
    private string $surname1;
    private string $email;
    private ?string $phoneNumber;
    private ?string $surname2;

    public function __construct(
        string $id,
        string $name,
        string $surname1,
        string $email,
        ?string $phoneNumber,
        ?string $surname2
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->surname1 = $surname1;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->surname2 = $surname2;
    }

    public static function create(
        string $name,
        string $surname1,
        string $email,
        ?string $phoneNumber,
        ?string $surname2
    ): self {
        return new self(
            self::uuid(),
            $name,
            $surname1,
            $email,
            $phoneNumber,
            $surname2
        );
    }

    public function update(
        ?string $name,
        ?string $surname1,
        ?string $email,
        ?string $phoneNumber,
        ?string $surname2
    ): self {
        return new self(
            $this->id,
            $name ?? $this->name,
            $surname1 ?? $this->surname1,
            $email ?? $this->email,
            $phoneNumber ?? $this->phoneNumber,
            $surname2 ?? $this->surname2
        );
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

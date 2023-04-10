<?php

declare(strict_types=1);

namespace App\Student\Domain;

interface StudentRepository
{
    /** @return Student[] */
    public function findAll();

    public function findById(string $id): ?Student;

    public function save(Student $student): void;

    public function update(Student $student): void;
}

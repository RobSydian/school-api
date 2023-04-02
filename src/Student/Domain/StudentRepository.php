<?php

declare(strict_types=1);

namespace App\Student\Domain;

interface StudentRepository
{
    /** @return Student[] */
    public function findAll();

    public function save(Student $student): void;
}

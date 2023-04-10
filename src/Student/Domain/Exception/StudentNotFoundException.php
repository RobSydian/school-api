<?php

declare(strict_types=1);

namespace App;

use Exception;

class StudentNotFoundException extends Exception
{
    public function __construct(string $id)
    {
        parent::__construct("Student with id {$id} not found.");
    }
}

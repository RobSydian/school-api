<?php

declare(strict_types=1);

namespace App\Student\Application;

use App\Student\Domain\Student;

class GetStudentsResponse
{
    /** @var Student[] $students */
    private $students;

    /** @param Student[] $students */
    public function __construct($students)
    {
        $this->students = $students;
    }

    /** @return Student[] */
    public function students()
    {
        return $this->students;
    }

    public function toPrimitives(): array
    {
        return array_map(fn (Student $student) => [
            'id' => $student->id(),
            'name' => $student->name(),
            'surname1' => $student->surname1(),
            'surname2' => $student->surname2(),
            'email' => $student->email(),
            'phoneNumber' => $student->phoneNumber(),
        ], $this->students);
    }
}

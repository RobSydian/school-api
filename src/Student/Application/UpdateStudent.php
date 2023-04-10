<?php

declare(strict_types=1);

namespace App\Student\Application;

use App\Common\Application\Command;
use App\Student\Domain\Student;
use App\Student\Domain\StudentRepository;
use App\StudentNotFoundException;

class UpdateStudent
{
    private StudentRepository $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
    }

    /** @param UpdateStudentCommand $command */
    public function handle(Command $command)
    {
        $student = $this->repository->findById($command->id());

        if (!$student) {
            throw new StudentNotFoundException($command->id());
        }

        $updatedStudent = $student->update(
            $command->name(),
            $command->surname1(),
            $command->email(),
            $command->phoneNumber(),
            $command->surname2()
        );

        $this->repository->update($updatedStudent);
    }
}

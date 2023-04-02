<?php

declare(strict_types=1);

namespace App\Student\Application;

use App\Common\Application\Command;
use App\Student\Domain\Student;
use App\Student\Domain\StudentRepository;

class CreateStudent
{
    private StudentRepository $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
    }

    /** @param CreateStudentCommand $command */
    public function handle(Command $command)
    {
        $student = Student::create(
            $command->name(),
            $command->surname1(),
            $command->email(),
            $command->phoneNumber(),
            $command->surname2()
        );

        $this->repository->save($student);
    }
}

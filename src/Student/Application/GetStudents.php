<?php

declare(strict_types=1);

namespace App\Student\Application;

use App\Common\Application\Query;
use App\Student\Domain\StudentRepository;

class GetStudents
{
    private StudentRepository $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
    }

    /** @var GetStudentsQuery */
    public function handle(Query $query): GetStudentsResponse
    {
        $students = $this->repository->findAll();

        return new GetStudentsResponse($students);
    }
}

<?php

declare(strict_types=1);

namespace App\Controller\Student;

use App\Student\Application\GetStudents;
use App\Student\Application\GetStudentsQuery;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetStudentsController
{
    private GetStudents $getStudents;

    public function __construct(GetStudents $getStudents)
    {
        $this->getStudents = $getStudents;
    }

    public function __invoke(): JsonResponse
    {
        $students = $this->getStudents->handle(new GetStudentsQuery());

        return new JsonResponse($students->toPrimitives());
    }
}

<?php

declare(strict_types=1);

namespace App\Controller\Student;

use App\Student\Application\GetStudents;
use App\Student\Application\GetStudentsQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GetStudentsController extends AbstractController
{
    private GetStudents $getStudents;

    public function __construct(GetStudents $getStudents)
    {
        $this->getStudents = $getStudents;
    }

    /**
     * @Route("/students", name="get_students",  methods={"GET"})
     */
    public function __invoke(): JsonResponse
    {
        $students = $this->getStudents->handle(new GetStudentsQuery());

        return new JsonResponse($students->toPrimitives());
    }
}

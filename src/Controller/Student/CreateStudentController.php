<?php

declare(strict_types=1);

namespace App\Controller\Student;

use App\Student\Application\CreateStudent;
use App\Student\Application\CreateStudentCommand;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateStudentController
{
    private CreateStudent $createStudent;

    public function __construct(CreateStudent $createStudent)
    {
        $this->createStudent = $createStudent;
    }

    /**
     * @Route("/students", name="create_student", methods={"POST"})
     */
    public function __invoke(Request $request): JsonResponse
    {
        $params = json_decode($request->getContent(), true);

        $this->createStudent->handle(new CreateStudentCommand(
            $params['name'],
            $params['surname1'],
            $params['email'],
            $params['phoneNumber'] ?? null,
            $params['surname2'] ?? null,
        ));

        return new JsonResponse(null, Response::HTTP_CREATED);
    }
}

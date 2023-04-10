<?php

declare(strict_types=1);

namespace App\Controller\Student;

use App\Student\Application\UpdateStudent;
use App\Student\Application\UpdateStudentCommand;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateStudentController
{
    private UpdateStudent $updateStudent;

    public function __construct(UpdateStudent $updateStudent)
    {
        $this->updateStudent = $updateStudent;
    }

    /**
     * @Route("/students/{id}", name="update_student", methods={"POST"})
     */
    public function __invoke(string $id, Request $request): JsonResponse
    {
        $params = json_decode($request->getContent(), true);

        $this->updateStudent->handle(new UpdateStudentCommand(
            $id,
            $params['name'] ?? null,
            $params['surname1'] ?? null,
            $params['email'] ?? null,
            $params['phoneNumber'] ?? null,
            $params['surname2'] ?? null,
        ));

        return new JsonResponse(null, Response::HTTP_OK);
    }
}

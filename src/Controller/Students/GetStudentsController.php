<?php

declare(strict_types=1);

namespace App\Controller\Students;

use Symfony\Component\HttpFoundation\Response;

class GetStudentsController
{
    public function __invoke(): Response
    {

        return new Response("Hello beesh");
    }
}

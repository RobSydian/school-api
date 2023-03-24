<?php

declare(strict_types=1);

namespace App\Students\Infrastructure;

use App\Student\Domain\Student;
use App\Student\Domain\StudentRepository;
use Doctrine\DBAL\Connection;

class MySqlStudentRepository implements StudentRepository
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /** @return Student[] */
    public function findAll()
    {
        $students = $this->connection->fetchAllAssociative('SELECT * FROM student');

        return $students ? $this->hydrate($students) : [];
    }

    /** @return Student[] */
    private function hydrate(array $students)
    {
        return array_map(fn ($row) => new Student(
            $row['id'],
            $row['name'],
            $row['surname1'],
            $row['email'],
            $row['surname2'],
            $row['phone_number'],
        ), $students);
    }
}

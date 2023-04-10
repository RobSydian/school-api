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
        $students = $this->connection->fetchAllAssociative(<<<SQL
            SELECT * FROM student
        SQL);

        if (!$students) {
            return [];
        }

        return array_map(fn ($student) => $this->hydrate($student), $students);
    }

    public function findById(string $id): ?Student
    {
        $student = $this->connection->fetchAssociative(
            <<<SQL
                SELECT * FROM student WHERE id = ?
            SQL,
            [$id]
        );

        return $student ? $this->hydrate($student) : null;
    }

    public function save(Student $student): void
    {
        $this->connection->executeQuery(
            <<<SQL
                INSERT INTO student (id, name, surname1, surname2, email, phone_number)
                VALUES(?, ?, ?, ?, ?, ?);
            SQL,
            [$student->id(), $student->name(), $student->surname1(), $student->surname2(), $student->email(), $student->phoneNumber() ]
        );
    }

    public function update(Student $student): void
    {
        $this->connection->executeQuery(
            <<<SQL
                UPDATE student
                SET name = ?, surname1 = ?, surname2 = ?, email = ?, phone_number = ?
                WHERE id = ?;
            SQL,
            [$student->name(), $student->surname1(), $student->surname2(), $student->email(), $student->phoneNumber(), $student->id() ]
        );
    }

    /** @return Student */
    private function hydrate(array $student)
    {
        return new Student(
            $student['id'],
            $student['name'],
            $student['surname1'],
            $student['email'],
            $student['phone_number'],
            $student['surname2'],
        );
    }
}

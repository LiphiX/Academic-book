<?php

namespace App\Dto;

use App\Models\Student;
use App\Models\Teacher;

class TeacherDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public readonly int $id,
        public readonly string $surname,
        public readonly string $name,
        public readonly string $patronymic,
        public readonly string $passport,
        public readonly int $departmentId,
        public readonly string $departmentName,
    ){}

    public static function fromModel(Teacher $teacher): self{
        return new self(
            id: $teacher->id,
            surname: $teacher->person->surname,
            name: $teacher->person->name,
            patronymic: $teacher->person->patronymic,
            passport: $teacher->person->passport,
            departmentId: $teacher->department->id,
            departmentName: $teacher->department->name
        );
    }

    public function toArray(): array{
        return [
            'id' => $this->id,
            'surname' => $this->surname,
            'name' => $this->name,
            'patronymic' => $this->patronymic,
            'passport' => $this->passport,
            'departmentId' => $this->departmentId,
            'departmentName' => $this->departmentName
        ];
    }
}

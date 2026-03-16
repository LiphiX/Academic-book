<?php

namespace App\Dto;

use App\Models\Student;

class StudentDTO
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
        public readonly int $groupId,
        public readonly string $groupName,
        public readonly float $averageAssessment,
        public readonly float $averageAttendance
    ){}

    public static function fromModel(Student $student){
        return new self(
            id: $student->id,
            surname: $student->person->surname,
            name: $student->person->name,
            patronymic: $student->person->patronymic,
            passport: $student->person->passport,
            groupId: $student->group->id,
            groupName: $student->group->name,
            averageAssessment: $student->averageAssessment(),
            averageAttendance: $student->averageAttendance(),
        );
    }

    public function toArray(): array{
        return [
            'id' => $this->id,
            'surname' => $this->surname,
            'name' => $this->name,
            'patronymic' => $this->patronymic,
            'passport' => $this->passport,
            'groupId' => $this->groupId,
            'groupName' => $this->groupName,
            'averageAssessment' => $this->averageAssessment,
            'averageAttendance' => $this->averageAttendance,
        ];
    }
}

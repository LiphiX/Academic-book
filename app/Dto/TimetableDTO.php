<?php

namespace App\Dto;

use App\Models\Discipline;
use App\Models\Teacher;
use App\Models\Timetable;

class TimetableDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private readonly int $id,
        private readonly string $surname,
        private readonly string $name,
        private readonly string $patronymic,
        private readonly string $discipline
    )
    {

    }

    public static function fromModel(Timetable $timetable): self{
        return new self(
            id: $timetable->teacher->id,
            surname: $timetable->teacher->person->surname,
            name: $timetable->teacher->person->name,
            patronymic: $timetable->teacher->person->patronymic,
            discipline: $timetable->discipline->name
        );
    }

    public function toArray(): array{
        return [
            'id' => $this->id,
            'surname' => $this->surname,
            'name' => $this->name,
            'patronymic' => $this->patronymic,
            'discipline' => $this->discipline
        ];
    }
}

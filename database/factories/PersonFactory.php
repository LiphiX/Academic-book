<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    private static array $surnames = [
        "Смирнов",
        "Кузнецов",
        "Селезнев",
        "Свиридов",
        "Медведев",
        "Дорохов",
        "Власов",
        "Васильев",
        "Ушаков",
        "Смирнов",
        "Попов",
        "Баранов",
        "Вавилов",
        "Ульянов",
        "Макеев",
        "Петров",
        "Широков",
        "Абрамов",
        "Зайцев",
        "Кузнецов",
        "Акимов",
        "Пономарев",
        "Ефимов",
        "Иванов",
        "Павлов",
        "Волков",
        "Столяров",
        "Жданов",
        "Анисимов",
        "Харитонов",
        "Черепанов",
        "Волков",
        "Мещеряков",
        "Сафонов",
        "Носов",
        "Соловьев",
        "Грачев",
        "Новиков",
        "Макаров",
        "Богомолов",
        "Ларин",
        "Осипов",
        "Логинов",
        "Кузнецов",
        "Мельников",
        "Соболева",
        "Абрамов",
        "Гаврилов",
        "Тихонов",
        "Масленников",
        "Харитонов",
        "Архипов",
        "Тарасов",
        "Фадеев",
        "Белоусов",
        "Прохоров",
        "Тихонов",
        "Черкасов",
        "Волков",
        "Куликов"
    ];

    private static array $patronymics = [
        "Евгеньев",
        "Алексеев",
        "Викторов",
        "Михаилов",
        "Леонидов",
        "Адамов",
        "Петров",
        "Тимофеев",
        "Антонов",
        "Кириллов",
        "Антонов",
        "Игорев",
        "Антонов",
        "Викторов",
        "Олегов",
        "Кириллов",
        "Борисов",
        "Леонидов",
        "Вадимов",
        "Игорев",
        "Николаев",
        "Юрьев",
        "Викторов",
        "Данилов",
        "Тимофеев",
        "Антонов",
        "Игорев",
        "Павлов",
        "Борисов",
        "Андреев",
        "Евгеньев",
        "Максимов",
        "Юрьев",
        "Андреев",
        "Леонидов",
        "Георгиев",
        "Алексиев",
        "Михаилов",
        "Максимов",
        "Леонидов",
        "Викторов",
        "Кириллов",
        "Иванов",
        "Андреев",
        "Иванов",
        "Евгеньев",
        "Виталиев",
        "Иванов",
        "Иванов",
        "Максимов",
        "Олегов",
        "Юрьев",
        "Петров",
        "Валериев",
        "Олегов",
        "Аркадиев",
        "Антоноич",
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isMale = rand(1, 10) > 5;

        $this->faker = \Faker\Factory::create('ru_RU');

        return [
            'surname' => $this->getLastName($isMale),
            'name' => $this->getFirstName($isMale),
            'patronymic'=> $this->getPatronymic($isMale),
            'passport' => rand(1000, 9999) . " " . rand(1_000_000, 9_999_999)
        ];
    }

    private function getFirstName(bool $isMale): string{
        if($isMale){
            return $this->faker->firstNameMale();
        }
        else
            return $this->faker->firstNameFemale();
    }

    private function getLastName(bool $isMale): string{
        $surname = self::$surnames[array_rand(self::$surnames)] . ($isMale ? '' : 'а');

        return $surname;
    }

    private function getPatronymic(bool $isMale): string{
        return self::$patronymics[array_rand(self::$patronymics)] . ($isMale ? "ич" : "на");
    }
}

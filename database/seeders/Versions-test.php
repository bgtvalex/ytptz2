<?php

namespace Database\Seeders;

use Hamcrest\Type\IsString;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Version; // если будет модель, иначе можно работать через DB


// $jsonString = file_get_contents(base_path('versions.json'));
// $versions = json_decode($jsonString, true);

class Versions extends Seeder
{
    public function run(): void
    {
        // Путь к файлу: корень проекта
        $jsonPath = base_path('versions.json');

        if (!file_exists($jsonPath)) {
            $this->command->error('Файл versions.json не найден в корне проекта.');
            return;
        }

        $contents = file_get_contents($jsonPath);
        $data = json_decode($contents, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->command->error('Ошибка парсинга JSON: ' . json_last_error_msg());
            return;
        }

        // Если JSON — это массив объектов
        if (is_array($data)) {
            foreach ($data as $item) {
                // Пропускаем, если нет версии (или можно выбросить ошибку)
                if (!isset($item['ver'])) {
                    
                    continue;
                }

                dd($item['theme']);

                Version::updateOrCreate(
                    ['version' => $item['ver']],
                    ['theme' => $item['theme'] ?? null],
                    ['desc' => $item['description'] ?? null],
                    ['status' => $item['status'] ?? null],
                    ['date' => $item['date'] ?? null],
                );
            }
        } else {
            $this->command->error('Ожидается массив записей в versions.json.');
        }
    }
}
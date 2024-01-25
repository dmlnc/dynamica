<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServiceFieldsTableUpdateTwoSeeder extends Seeder
{

    public function updateOrder($type, $section, $order){
        DB::table('service_fields')->where('type', $type)->where('section', $section)->where('order', '>=', $order)->increment('order');
    }

    public function run()
    {
        // Пример массива данных для добавления или обновления
        $fieldsData = [
            [

                "id" => 41,
                "name" => "Сканирование кодов неисправностей системы управления двигателем, Airbag, ABS и т.д.",
                "section" => 3.1,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([
                     ["id" => 1, "color" => "#008000", "value" => "Системы сканируются нормально, ошибки отсутствуют", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#008000", "value" => "Системы сканируются нормально, присутствуют ошибки в истории", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                     ["id" => 5, "color" => "#008000", "value" => "Системы сканируются нормально, присутствуют активные ошибк", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                     ["id" => 4, "color" => "#ffcc00", "value" => "Диагностика не подключается", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                     ["id" => 3, "color" => "#ffcc00", "value" => "Другое", "showPhoto" => true, "showComments" => true, "showSubfields" => false]
                    ]),
            ],
            [
                "id" => 192,
                "name" => "Признаки капитального ремонта двигателя и КПП (присутствие неоригинального герметика в соединениях детелей, неоригинальных патрубков, хомутов и прочее, нештатных маркировках или обозначениях на элементах двигателя и т.д.)",
                "section" => 3.2,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([
                    ["id" => 1, "color" => "#0070c0", "value" => "Отсутствуют", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                    ["id" => 2, "color" => "#ff0000", "value" => "Присутствуют", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                    ["id" => 3, "color" => "#0070c0", "value" => "Не применимо", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                ]),
            ],
            [
                "id" => 100,
                "name" => "Шаровая(ые) опора(ы) и сайлетблоки переднего левого рычага. ШРУС передний левый наружный и внутренний. Состояние переднего колесного диска.",
                "section" => 3.4,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([
                  ["value" => "Исправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                  ["value" => "Есть отклонения", "showPhoto" => false, "showComments" => false, "showSubfields" => true, "color" => "#ffcc00", "id" => 2],
                  ["value" => "Неисправны", "showPhoto" => false, "showComments" => false, "showSubfields" => true, "color" => "#ff0000", "id" => 3]
                ]),
            ],
            [
                "id" => 117,
                "name" => "Шаровая(ые) опора(ы) и сайлетблоки переднего правого рычага. ШРУС передний правый наружный и внутренний. Состояние переднего правого колесного диска.",
                "section" => 3.4,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([
                   [
                      "value" => "Исправны",
                      "showPhoto" => false,
                      "showComments" => false,
                      "showSubfields" => false,
                      "color" => "#008000",
                      "id" => 1
                   ],
                   [
                      "value" => "Есть отклонения",
                      "showPhoto" => false,
                      "showComments" => false,
                      "showSubfields" => true,
                      "color" => "#ffcc00",
                      "id" => 2
                   ],
                   [
                      "value" => "Неисправны",
                      "showPhoto" => false,
                      "showComments" => false,
                      "showSubfields" => true,
                      "color" => "#ff0000",
                      "id" => 3
                   ]
                ]),
            ],

            [
                "id" => 131,
                "name" => "Шарниры и сайлентблоки заднего левого рычага. ШРУС задний левый наружный и внутренний. Состояние заднего левого колесного диска.",
                "section" => 3.4,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "Исправны", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ffcc00", "value" => "Есть отклонения", "showPhoto" => false, "showComments" => true, "showSubfields" => true],
                     ["id" => 3, "color" => "#ff0000", "value" => "Неисправны", "showPhoto" => false, "showComments" => true, "showSubfields" => true]]),
            ],
            [
                "id" => 139,
                "name" => "Шарниры и сайлентблоки заднего правого рычага. ШРУС задний правый наружный и внутренний. Состояние заднего правого колесного диска.",
                "section" => 3.4,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "Исправны", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ffcc00", "value" => "Есть отклонения", "showPhoto" => false, "showComments" => true, "showSubfields" => true],
                     ["id" => 3, "color" => "#ff0000", "value" => "Неисправны", "showPhoto" => false, "showComments" => true, "showSubfields" => true]]),
                
            ],
        ];

        foreach ($fieldsData as $fieldData) {
            if($fieldData['id'] != null){
                $existingField = DB::table('service_fields')->where('id', $fieldData['id'])->first();
            }
            if($existingField){
                $fieldData['values'] = json_decode($fieldData['values']);
                DB::table('service_fields')->where('id', $fieldData['id'])->update($fieldData);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServiceFieldsTableUpdateSeeder extends Seeder
{

    public function updateOrder($type, $section, $order){
        DB::table('service_fields')->where('type', $type)->where('section', $section)->where('order', '>=', $order)->increment('order');
    }

    public function run()
    {
        // Пример массива данных для добавления или обновления
        $fieldsData = [
            [
                "id" => 26,
                "name" => "Освещение салона, стеклоподъёмники, регулировка боковых зеркал, сидений, руля. Обогревы заднего стекла, лобового стекла, сидений, руля. Открытие/закрытие двери багажника, люка. Работа мультимедии, кондиционера.",
                "section" => 3.1,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "Имеющиеся в данном автомобиле функции исправны", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ff0000", "value" => "Неисправно", "showPhoto" => false, "showComments" => true, "showSubfields" => true]]),
            ],
            [
                "id" => 158,
                "name" => "Работа стояночного тормоза",
                "section" => 3.1,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "Исправен", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ffcc00", "value" => "Необходима регулировка", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 3, "color" => "#ff0000", "value" => "Неисправен", "showPhoto" => false, "showComments" => true, "showSubfields" => false]]),
                "parent_id" => null,
                "order" => 4,
            ],
            [
                "id" => null,
                "name" => "Работа КПП на стоящем автомобиле.",
                "section" => 3.1,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([
                     ["id" => 1, "color" => "#008000", "value" => "Передачи включаются нормально", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ffcc00", "value" => "Есть отклонения", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 3, "color" => "#ff0000", "value" => "Неисправность", "showPhoto" => false, "showComments" => true, "showSubfields" => false]
                    ]),
                "parent_id" => null,
                "required" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "order" => 5,
            ],
            [
                "id" => 40,
                "name" => "Визуальные признаки срабатывания подушек безопасности.",
                "section" => 3.1,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "Отсутствуют", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ff0000", "value" => "Присутствуют", "showPhoto" => true, "showComments" => true, "showSubfields" => false]]),
            ],
            [
                "id" => 41,
                "name" => "Сканирование кодов неисправностей системы управления двигателем, Airbag, ABS и т.д.",
                "section" => 3.1,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([
                     ["id" => 1, "color" => "#008000", "value" => "Системы сканируются нормально, ошибки отсутствуют", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#008000", "value" => "Системы сканируются нормально, присутствуют ошибки в истории", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                     ["id" => 4, "color" => "#ffcc00", "value" => "Диагностика не подключается", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                     ["id" => 3, "color" => "#ffcc00", "value" => "Другое", "showPhoto" => true, "showComments" => true, "showSubfields" => false]
                    ]),
            ],
            [
                "id" => 44,
                "name" => "Крепление фар и корпус фар левой и правой.",
                "section" => 3.2,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "Исправно", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ffcc00", "value" => "Следы ремонта", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                     ["id" => 3, "color" => "#ffcc00", "value" => "Повреждения", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                     ["id" => 5, "color" => "#ffcc00", "value" => "Тюнинг", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                     ["id" => 4, "color" => "#ffcc00", "value" => "Другое", "showPhoto" => true, "showComments" => true, "showSubfields" => false]]),
            ],
            [
                "id" => 45,
                "name" => "Наличие нештатного оборудования и деталей (нештатные провода, нештатная укладка проводов, нештатная маркировка на деталях, нештатное оборудование, газовое оборудование и т.д.)",
                "section" => 3.2,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([
                    ["value" => "Отсутствует", "showPhoto" => false, "showComments" => true, "showSubfields" => false, "color" => "#008000", "id" => 1],
                    ["value" => "Присутствует", "showPhoto" => true, "showComments" => true, "showSubfields" => false, "color" => "#ffcc00", "id" => 2]
                ]),
            ],
            [
                "id" => 151,
                "name" => "Уровень и состояние масла ДВС",
                "section" => 3.2,
                "type" => "subfield",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "В норме", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ff0000", "value" => "Не в норме", "showPhoto" => true, "showComments" => true, "showSubfields" => false]]),
            ],
            [
                "id" => 152,
                "name" => "Уровень и состояние тормозной жидкоски",
                "section" => 3.2,
                "type" => "subfield",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "В норме", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ff0000", "value" => "Не в норме", "showPhoto" => true, "showComments" => true, "showSubfields" => false]]),
            ],
            [
                "id" => 153,
                "name" => "Уровень и состояние охлаждающей жидкости",
                "section" => 3.2,
                "type" => "subfield",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "В норме", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ff0000", "value" => "Не в норме", "showPhoto" => true, "showComments" => true, "showSubfields" => false]]),
            ],
            [
                "id" => 154,
                "name" => "Уровень и состояние жидкости ГУРа",
                "section" => 3.2,
                "type" => "subfield",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "В норме", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ff0000", "value" => "Не в норме", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                     ["id" => 3, "color" => "#0070c0", "value" => " Отсутствует в комплектации", "showPhoto" => false, "showComments" => true, "showSubfields" => false]]),
            ],
            [
                "id" => 64,
                "name" => "Номер двигателя",
                "section" => 3.2,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([
                     ["id" => 1, "color" => "#008000", "value" => "Читается", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                     ["id" => 3, "color" => "#0070c0", "value" => "Читается не полностью", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#0070c0", "value" => "Не читается", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                     ["id" => 4, "color" => "#ff0000", "value" => "Не совпадает", "showPhoto" => true, "showComments" => true, "showSubfields" => false ],
                    ]),
            ],
            [
                "id" => 65,
                "name" => "Катушки/провода/свечи зажигания.",
                "section" => 3.2,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "Исправны", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ffcc00", "value" => "Есть отклонения", "showPhoto" => false, "showComments" => true, "showSubfields" => true],
                     ["id" => 3, "color" => "#ff0000", "value" => "Необходима замена", "showPhoto" => false, "showComments" => true, "showSubfields" => true],
                     ["id" => 4, "color" => "#0070c0", "value" => "Отсутствуют в комплектации", "showPhoto" => false, "showComments" => true, "showSubfields" => false]]),
            ],
            [
                "id" => 66,
                "name" => "Катушки зажигания",
                "section" => 3.2,
                "type" => "subfield",
                "input" => "select",
                "values" => json_encode([
                     ["id" => 1, "color" => "#008000", "value" => "Исправны", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 3, "color" => "#ffcc00", "value" => "Есть отклонения", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ff0000", "value" => "Необходима замена", "showPhoto" => false, "showComments" => true, "showSubfields" => false]]),
            ],
            [
                "id" => 68,
                "name" => "Свечи зажигания",
                "section" => 3.2,
                "type" => "subfield",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "Исправны", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ffcc00", "value" => "Есть отклонения", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 3, "color" => "#ff0000", "value" => "Необходима замена", "showPhoto" => false, "showComments" => true, "showSubfields" => false]]),
               
            ],
            [
                "id" => 69,
                "name" => "Состояние цилиндров. Эндоскопия.",
                "section" => 3.2,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([ 
                    //  ["id" => 1, "color" => "#0070c0", "value" => "Осмотр будет произведен позже", "showPhoto" => false, "showComments" => false, "showSubfields" => false],
                    ["id" => 6, "color" => "#0070c0", "value" => "Не применимо", "showPhoto" => false, "showComments" => false, "showSubfields" => false],
                    ["id" => 2, "color" => "#008000", "value" => "Отличное", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                    ["id" => 7, "color" => "#008000", "value" => "Естественный износ, соответствующий пробегу", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                    ["id" => 8, "color" => "#ffcc00", "value" => "Задиры в местах перекладки поршня", "showPhoto" => true, "showComments" => true, "showSubfields" => false],

                    //  ["id" => 3, "color" => "#008000", "value" => "Хорошее", "showPhoto" => true, "showComments" => true, "showSubfields" => false],

                    ["id" => 4, "color" => "#ffcc00", "value" => "Удовлетворительное", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                    ["id" => 5, "color" => "#ff0000", "value" => "Рекомендуется ремонт", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                ]),
            ],
            [
                "id" => null,
                "name" => "Состояние цилиндров. Компрессия.",
                "section" => 3.2,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([
                    ["id" => 1, "color" => "#0070c0", "value" => "Не применимо", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                    ["id" => 2, "color" => "#008000", "value" => "В пределах нормы", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                    ["id" => 3, "color" => "#ffcc00", "value" => " Незначительные отклонения", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                    ["id" => 4, "color" => "#ff0000", "value" => "Рекомендуется ремонт", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                    ["id" => 5, "color" => "#0070c0", "value" => "Не производилась", "showPhoto" => false, "showComments" => false, "showSubfields" => false]]),
                "parent_id" => null,
                "required" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "order" => 14,
            ],
            [
                "id" => null,
                "name" => "Шины передних колес. Критические замечания и фото размерности",
                "section" => 3.3,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "Отсутствуют", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                      ["id" => 2, "color" => "#ff0000", "value" => "Необходима замена", "showPhoto" => true, "showComments" => true, "showSubfields" => false]]),
                "parent_id" => null,
                "required" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "order" => 1,
            ],
            [
                "id" => null,
                "name" => "Шины задних колес. Критические замечания",
                "section" => 3.3,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "Отсутствуют", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                      ["id" => 2, "color" => "#ff0000", "value" => "Необходима замена", "showPhoto" => true, "showComments" => true, "showSubfields" => false]]),
                "parent_id" => null,
                "required" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "order" => 5,
            ],
            [
                "id" => null,
                "name" => "Работа КПП на вывешенном автомобиле",
                "section" => 3.4,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([
                    ["id" => 1, "color" => "#008000", "value" => "Передачи включаются нормально", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                    ["id" => 2, "color" => "#ffcc00", "value" => "Есть отклонения", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                    ["id" => 3, "color" => "#ff0000", "value" => "Неисправность", "showPhoto" => false, "showComments" => true, "showSubfields" => false]
                ]),
                "parent_id" => null,
                "required" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "order" => 1,
            ],
            [
                "id" => null,
                "name" => "Работа полного привода на вывешенном автомобиле",
                "section" => 3.4,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([
                    ["id" => 1, "color" => "#008000", "value" => "Полный привод функционирует", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                    ["id" => 2, "color" => "#ff0000", "value" => "Полный привод не функционирует", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                    ["id" => 3, "color" => "#0070c0", "value" => "Отсутствует в комплектации", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                ]),
                "parent_id" => null,
                "required" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "order" => 2,
            ],
            [
                "id" => 90,
                "name" => "Лонжероны левый и правый, передняя панель.",
                "section" => 3.4,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "Исправны, нарушений геометрии нет", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ff0000", "value" => "Следы ремонта", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                     ["id" => 3, "color" => "#ff0000", "value" => "Повреждения", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                     ["id" => 4, "color" => "#ff0000", "value" => "Коррозия", "showPhoto" => true, "showComments" => true, "showSubfields" => false]]),
                
            ],
            [
                "id" => null,
                "name" => "Радиаторы систем охлаждения двигателя, ГУРа, трансмиссии, радиатор кондиционера, опоры ДВС и КПП.",
                "section" => 3.4,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([
                    ["id" => 1, "color" => "#008000", "value" => "Исправны, нарушений геометрии нет", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                    ["id" => 2, "color" => "#ff0000", "value" => "Следы ремонта", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                    ["id" => 3, "color" => "#0070c0", "value" => "Повреждения", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                ]),
                "parent_id" => null,
                "required" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "order" => 5,
            ],
            [
                "id" => 91,
                "name" => "Течи: Соединения систем охлаждения, ГУРа, топливной. Соединения передней крышки ДВС, турбины.",
                "section" => 3.4,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "Отсутствуют", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ffcc00", "value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => true, "showSubfields" => true],
                     ["id" => 3, "color" => "#ff0000", "value" => "Обильная течь", "showPhoto" => false, "showComments" => true, "showSubfields" => true]]),
            ],

            [
                "id" => 92,
                "name" => "Течь соединений системы охлаждения",
                "section" => 3.4,
                "type" => "subfield",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "Отсутствуют", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ffcc00", "value" => "Запотевание или незначительная течь", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                     ["id" => 3, "color" => "#ff0000", "value" => "Обильная течь", "showPhoto" => true, "showComments" => true, "showSubfields" => false]]),
                
            ],
            [
                "id" => 93,
                "name" => "Течь соединений системы ГУРа",
                "section" => 3.4,
                "type" => "subfield",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "Отсутствуют", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ffcc00", "value" => "Запотевание или незначительная течь", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                     ["id" => 3, "color" => "#ff0000", "value" => "Обильная течь", "showPhoto" => true, "showComments" => true, "showSubfields" => false]]),
                
            ],
            [
                "id" => 94,
                "name" => "Течь соединений топливной системы",
                "section" => 3.4,
                "type" => "subfield",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "Отсутствуют", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ffcc00", "value" => "Запотевание или незначительная течь", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                     ["id" => 3, "color" => "#ff0000", "value" => "Обильная течь", "showPhoto" => true, "showComments" => true, "showSubfields" => false]]),
            ],
            [
                "id" => 95,
                "name" => "Течь соединений передней крышки ДВС",
                "section" => 3.4,
                "type" => "subfield",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "Отсутствуют", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ffcc00", "value" => "Запотевание или незначительная течь", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                     ["id" => 3, "color" => "#ff0000", "value" => "Обильная течь", "showPhoto" => true, "showComments" => true, "showSubfields" => false]]),
            ],
            [
                "id" => 96,
                "name" => "Течь соединений турбины",
                "section" => 3.4,
                "type" => "subfield",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "Отсутствуют", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ffcc00", "value" => "Запотевание или незначительная течь", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                     ["id" => 3, "color" => "#ff0000", "value" => "Обильная течь", "showPhoto" => true, "showComments" => true, "showSubfields" => false]]),
               
            ],
            [
                "id" => 130,
                "name" => "Выхлопная система",
                "section" => 3.4,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "Исправна", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ffcc00", "value" => "Есть отклонения", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                     ["id" => 3, "color" => "#ff0000", "value" => "Неисправна", "showPhoto" => true, "showComments" => true, "showSubfields" => false]]),
                
            ],
            [
                "id" => null,
                "name" => "Течи: Переднего редуктора, КПП, заднего редуктора.",
                "section" => 3.4,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([
                    ["id" => 1, "color" => "#008000", "value" => "Отсутствуют", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                    ["id" => 2, "color" => "#ffcc00", "value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => true, "showSubfields" => true],
                    ["id" => 3, "color" => "#ff0000", "value" => "Обильная течь", "showPhoto" => false, "showComments" => true, "showSubfields" => true],
                ]),
                "parent_id" => null,
                "required" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "order" => 7,
            ],
            [
                "id" => null,
                "name" => "Визуальные следы удаления катализатора.",
                "section" => 3.4,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([
                    ["id" => 1, "color" => "#ff0000", "value" => "Присутствуют", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                    ["id" => 2, "color" => "#0070c0", "value" => "Отсутствуют", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                    ["id" => 3, "color" => "#0070c0", "value" => "Нет в комплектации", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                ]),
                "parent_id" => null,
                "required" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "order" => 13,
            ],
            [
                "id" => 131,
                "name" => "Шарниры и сайлентблоки заднего левого рычага. ШРУС задний левый наружный и внутренний. Состояние задней левой шины и колесного диска.",
                "section" => 3.4,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "Исправны", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ffcc00", "value" => "Есть отклонения", "showPhoto" => false, "showComments" => true, "showSubfields" => true],
                     ["id" => 3, "color" => "#ff0000", "value" => "Неисправны", "showPhoto" => false, "showComments" => true, "showSubfields" => true]]),
            ],
            [
                "id" => 139,
                "name" => "Шарниры и сайлентблоки заднего правого рычага. ШРУС задний правый наружный и внутренний. Состояние задней правой шины и колесного диска.",
                "section" => 3.4,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "Исправны", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ffcc00", "value" => "Есть отклонения", "showPhoto" => false, "showComments" => true, "showSubfields" => true],
                     ["id" => 3, "color" => "#ff0000", "value" => "Неисправны", "showPhoto" => false, "showComments" => true, "showSubfields" => true]]),
                
            ],
            [
                "id" => 97,
                "name" => "Течь соединений переднего редуктора",
                "section" => 3.4,
                "type" => "subfield",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "Отсутствуют", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ffcc00", "value" => "Запотевание или незначительная течь", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                     ["id" => 3, "color" => "#ff0000", "value" => "Обильная течь", "showPhoto" => true, "showComments" => true, "showSubfields" => false]]),
                "parent_id" => 190,
                "order" => 1,
            ],
            [
                "id" => 98,
                "name" => "Течь соединений КПП",
                "section" => 3.4,
                "type" => "subfield",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "Отсутствуют", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ffcc00", "value" => "Запотевание или незначительная течь", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                     ["id" => 3, "color" => "#ff0000", "value" => "Обильная течь", "showPhoto" => true, "showComments" => true, "showSubfields" => false]]),
                "parent_id" => 190,
                "order" => 2,
            ],
            [
                "id" => 99,
                "name" => "Течь соединений заднего редуктора",
                "section" => 3.4,
                "type" => "subfield",
                "input" => "select",
                "values" => json_encode([["id" => 1, "color" => "#008000", "value" => "Отсутствуют", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                     ["id" => 2, "color" => "#ffcc00", "value" => "Запотевание или незначительная течь", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                     ["id" => 3, "color" => "#ff0000", "value" => "Обильная течь", "showPhoto" => true, "showComments" => true, "showSubfields" => false]]),
                "parent_id" => 190,
                "order" => 3,
            ],
            [
                "id" => null,
                "name" => "Признаки капитального ремонта двигателя (присутствие неоригинального герметика в соединениях детелей, неоригинальных патрубков, хомутов и прочее, нештатных маркировках или обозначениях на элементах двигателя и т.д.)",
                "section" => 3.2,
                "type" => "field",
                "input" => "select",
                "values" => json_encode([
                    ["id" => 1, "color" => "#0070c0", "value" => "Отсутствуют", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                    ["id" => 2, "color" => "#ff0000", "value" => "Присутствуют", "showPhoto" => true, "showComments" => true, "showSubfields" => false],
                    ["id" => 3, "color" => "#0070c0", "value" => "Не применимо", "showPhoto" => false, "showComments" => true, "showSubfields" => false],
                ]),
                "parent_id" => null,
                "required" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "order" => 12,
            ],
        ];

        foreach ($fieldsData as $fieldData) {
            $existingField = false;
            if($fieldData['id'] != null){
                $existingField = DB::table('service_fields')->where('id', $fieldData['id'])->first();
            }
            if($existingField){
                if( isset($fieldData['order']) 
                    && ($existingField->order != $fieldData['order'] 
                        || $existingField->type != $fieldData['type']) 
                ){
                    $this->updateOrder($fieldData['type'], $fieldData['section'], $fieldData['order']);
                }
                $fieldData['values'] = json_decode($fieldData['values']);
                DB::table('service_fields')->where('id', $fieldData['id'])->update($fieldData);
            } else{
                $this->updateOrder($fieldData['type'], $fieldData['section'], $fieldData['order']);
                DB::table('service_fields')->insert($fieldData);
            }

            if($fieldData['id'] != null){
                $values = json_encode($fieldData['values']);
                DB::table('service_fields')->where('id', $fieldData['id'])->update(['name'=> $fieldData['name'], 'values' => $values]);
            } else{
                
            }
        }
    }
}

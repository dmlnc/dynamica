<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServiceFieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
              "id" => 1,
              "name" => "Ближний, дальний свет, корректор фар, ходовые, передние габаритные огни, указатели поворотов, противотуманные фары, передний парктроник, , омыватель фар, стеклоотчистители и стеклоомыватели лобового и заднего стекол, звуковой сигнал, аварийка.",
              "section" => 3.1,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Имеющиеся в данном автомобиле функции исправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправно", "showPhoto" => false, "showComments" => false, "showSubfields" => true, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 2,
              "name" => "Ближний свет",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 1,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 3,
              "name" => "Дальний свет",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 1,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 4,
              "name" => "Корректор фар",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2],
                ["value" => "Отсутствует в комплектации", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#0070c0", "id" => 3]
              ]),
              "parent_id" => 1,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 5,
              "name" => "Ходовые огни",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 1,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 6,
              "name" => "Габаритные огни передние",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 1,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 7,
              "name" => "Указатели поворотов передние",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 1,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 8,
              "name" => "Противотуманные фары",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2],
                ["value" => "Отсутствует в комплектации", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#0070c0", "id" => 3]
              ]),
              "parent_id" => 1,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 9,
              "name" => "Парктроник передний",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2],
                ["value" => "Отсутствует в комплектации", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#0070c0", "id" => 3]
              ]),
              "parent_id" => 1,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 10,
              "name" => "Омыватель фар",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2],
                ["value" => "Отсутствует в комплектации", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#0070c0", "id" => 3]
              ]),
              "parent_id" => 1,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 11,
              "name" => "Стеклоотчиститель лобового стекла",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 1,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 12,
              "name" => "Стеклоомыватель лобового стекла",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 1,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 13,
              "name" => "Стеклоотчиститель заднего стекла",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 1,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 14,
              "name" => "Стеклоомыватель заднего стекла",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 1,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 15,
              "name" => "Звуковой сигнал",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 1,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 16,
              "name" => "Аварийка",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправна", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправна", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 1,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 17,
              "name" => "Стоп сигнал, задние габаритные огни, подсветка номера, задние противотуманные фонари, указатели поворотов, задний ход, камера заднего вида, задний парктроник.",
              "section" => 3.1,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Имеющиеся в данном автомобиле функции исправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправно", "showPhoto" => false, "showComments" => false, "showSubfields" => true, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 18,
              "name" => "Стоп сигнал",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 17,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 19,
              "name" => "Габаритные огни задние",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 17,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 20,
              "name" => "Подсветка номерного знака",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправна", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправна", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 17,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 21,
              "name" => "Задние противотуманные фонари",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 17,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 22,
              "name" => "Указатели поворотов задние",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 17,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 23,
              "name" => "Фонари заднего хода",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 17,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 24,
              "name" => "Камера заднего вида",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправна", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправна", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 17,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 25,
              "name" => "Парктроник задний",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 17,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 26,
              "name" => "Освещение салона, стеклоподъёмники, регулировка боковых зеркал, сидений, руля, обогревы заднего стекла, лобового стекла, руля, открытие/закрытие двери багажника, люка, работа мультимедии, работа кондиционера.",
              "section" => 3.1,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Имеющиеся в данном автомобиле функции исправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправно", "showPhoto" => false, "showComments" => false, "showSubfields" => true, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 27,
              "name" => "Освещение салона",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправно", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправно", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 26,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 28,
              "name" => "Стеклоподъемники",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 26,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 29,
              "name" => "Регулировка боковых зеркал",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправна", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправна", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 26,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 30,
              "name" => "Регулировка сидений",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправна", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправна", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 26,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 31,
              "name" => "Регулировка руля",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправна", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправна", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2],
                ["value" => "Отсутствует в комплектации", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#0070c0", "id" => 3]
              ]),
              "parent_id" => 26,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 32,
              "name" => "Обогрев заднего стекла",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 26,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 33,
              "name" => "Обогрев лобового стекла",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2],
                ["value" => "Отсутствует в комплектации", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#0070c0", "id" => 3]
              ]),
              "parent_id" => 26,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 34,
              "name" => "Обогрев руля",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2],
                ["value" => "Отсутствует в комплектации", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#0070c0", "id" => 3]
              ]),
              "parent_id" => 26,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 35,
              "name" => "Открытие/закрытие двери багажника",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправно", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправно", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2],
                ["value" => "Отсутствует в комплектации", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#0070c0", "id" => 3]
              ]),
              "parent_id" => 26,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 36,
              "name" => "Открытие/закрытие люка",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправно", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправно", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2],
                ["value" => "Отсутствует в комплектации", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#0070c0", "id" => 3]
              ]),
              "parent_id" => 26,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 37,
              "name" => "Работа мультимедии",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправна", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправна", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2],
                ["value" => "Отсутствует в комплектации", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#0070c0", "id" => 3]
              ]),
              "parent_id" => 26,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 38,
              "name" => "Работа кондиционера",
              "section" => 3.1,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2],
                ["value" => "Отсутствует в комплектации", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#0070c0", "id" => 3]
              ]),
              "parent_id" => 26,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 39,
              "name" => "Заводская маркировка на ремнях безопасности.",
              "section" => 3.1,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Присутствует", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 1],
                ["value" => "Отсутствует", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#0070c0", "id" => 2]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 40,
              "name" => "Визуальные признаки срабатывания подушек безопасности.",
              "section" => 3.1,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Присутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 41,
              "name" => "Сканирование кодов неисправностей системы управления двигателем, Airbag, ABS и т.д.",
              "section" => 3.1,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Системы сканируются нормально, ошибки отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Системы сканируются нормально, присутствуют ошибки в истории", "showPhoto" => true, "showComments" => true, "showSubfields" => false, "color" => "#008000", "id" => 2],
                ["value" => "Другое", "showPhoto" => true, "showComments" => true, "showSubfields" => false, "color" => "#000000", "id" => 3]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 42,
              "name" => "Подтверждение пробега через записи в блоках управления электронных систем.",
              "section" => 3.1,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Пробег подтвержден", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Подтверждение отсутствует", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#0070c0", "id" => 2]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 43,
              "name" => "Капот обратная сторона. Чашки левая и правая. Крылья левое и правое. Фронтальная панель/телевизор.",
              "section" => 3.2,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправно", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Следы ремонта", "showPhoto" => true, "showComments" => true, "showSubfields" => false, "color" => "#ff0000", "id" => 2],
                ["value" => "Повреждения", "showPhoto" => true, "showComments" => true, "showSubfields" => false, "color" => "#ff0000", "id" => 3],
                ["value" => "Коррозия", "showPhoto" => true, "showComments" => true, "showSubfields" => false, "color" => "#ff0000", "id" => 4]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 44,
              "name" => "Крепление фар и корпус фар левой и правой.",
              "section" => 3.2,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправно", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Следы ремонта", "showPhoto" => true, "showComments" => true, "showSubfields" => false, "color" => "#ff0000", "id" => 2],
                ["value" => "Повреждения", "showPhoto" => true, "showComments" => true, "showSubfields" => false, "color" => "#ff0000", "id" => 3],
                ["value" => "Коррозия", "showPhoto" => true, "showComments" => true, "showSubfields" => false, "color" => "#ff0000", "id" => 4]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 45,
              "name" => "Наличие нештатного оборудования и деталей (нештатные провода, нештатная укладка проводов, нештатная маркировка на деталях, нештатное оборудование)",
              "section" => 3.2,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствует", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Присутствует", "showPhoto" => true, "showComments" => true, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 46,
              "name" => "Уровень и состояние масла ДВС, тормозной, охлаждающей и жидкости ГУРа.",
              "section" => 3.2,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "В норме", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Не в норме", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 47,
              "name" => "Состояние крышки маслозаливной горловины двигателя.",
              "section" => 3.2,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => 'Без следов эмульсии и "гудрона"', "showPhoto" => true, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Отклонение от нормы", "showPhoto" => true, "showComments" => true, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 48,
              "name" => "Состояние АКБ",
              "section" => 3.2,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отличное", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => " Хорошее", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 2],
                ["value" => "Удовлетворительное", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 3],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 4]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 49,
              "name" => "Состояние приводных ремней.",
              "section" => 3.2,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Необходима проверка на следующем ТО", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 50,
              "name" => "Состояние воздушного фильтра двигателя.",
              "section" => 3.2,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "В норме", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 51,
              "name" => "Течи: клапанная крышка, прокладка ГБЦ, передняя крышка ДВС, турбина, соединения системы кондиционирования, охлаждения, ГУРа, топливной системы, радиаторов охлаждения ДВС, кондиционера, трансмиссии, ГУРа.",
              "section" => 3.2,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => true, "color" => "#ffcc00", "id" => 2],
                ["value" => "Обильная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => true, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 52,
              "name" => "Течь клапанной крышки",
              "section" => 3.2,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Обильная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 51,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 53,
              "name" => "Течь прокладки ГБЦ",
              "section" => 3.2,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Обильная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 51,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 54,
              "name" => "Течь передней крышки ДВС",
              "section" => 3.2,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Обильная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 51,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 55,
              "name" => "Течь турбины",
              "section" => 3.2,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Обильная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3],
                ["value" => "Отсутствует в комплектации", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#0070c0", "id" => 4]
              ]),
              "parent_id" => 51,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 56,
              "name" => "Течь соединений системы кондиционирования",
              "section" => 3.2,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Обильная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3],
                ["value" => "Отсутствует в комплектации", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#0070c0", "id" => 4]
              ]),
              "parent_id" => 51,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 57,
              "name" => "Течь соединений систем охлаждения",
              "section" => 3.2,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Обильная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 51,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 58,
              "name" => "Течь соединений ГУРа",
              "section" => 3.2,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Обильная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3],
                ["value" => "Отсутствует в комплектации", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#0070c0", "id" => 4]
              ]),
              "parent_id" => 51,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 59,
              "name" => "Течь топливной системы",
              "section" => 3.2,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Обильная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 51,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 60,
              "name" => "Течь радиатора охлаждения ДВС",
              "section" => 3.2,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Обильная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 51,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 61,
              "name" => "Течь радиатора кондиционера",
              "section" => 3.2,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Обильная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3],
                ["value" => "Отсутствует в комплектации", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#0070c0", "id" => 4]
              ]),
              "parent_id" => 51,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 62,
              "name" => "Течь радиатора трансмиссии",
              "section" => 3.2,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Обильная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3],
                ["value" => "Отсутствует в комплектации", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#0070c0", "id" => 4]
              ]),
              "parent_id" => 51,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 63,
              "name" => "Течь радиатора ГУРа",
              "section" => 3.2,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Обильная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3],
                ["value" => "Отсутствует в комплектации", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#0070c0", "id" => 4]
              ]),
              "parent_id" => 51,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 64,
              "name" => "Номер двигателя (не читаем).",
              "section" => 3.2,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Читаем", "showPhoto" => true, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Не читаем", "showPhoto" => true, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 65,
              "name" => "Катушки/провода/свечи зажигания.",
              "section" => 3.2,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Заменить на следующем ТО", "showPhoto" => false, "showComments" => false, "showSubfields" => true, "color" => "#ffcc00", "id" => 2],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => false, "showSubfields" => true, "color" => "#ff0000", "id" => 3],
                ["value" => "Отсутствуют в комплектации", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#0070c0", "id" => 4]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 66,
              "name" => "Катушки зажигания",
              "section" => 3.2,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 65,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 67,
              "name" => "Высоковольтные провода зажигания",
              "section" => 3.2,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2],
                ["value" => "Отсутствуют в комплектации", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#0070c0", "id" => 3]
              ]),
              "parent_id" => 65,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 68,
              "name" => "Свечи зажигания",
              "section" => 3.2,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Заменить на следующем ТО", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 65,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 69,
              "name" => "Состояние цилиндров. Эндоскопия.",
              "section" => 3.2,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Осмотр будет произведен позже", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#0070c0", "id" => 1],
                ["value" => "Отличное", "showPhoto" => true, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 2],
                ["value" => "Хорошее", "showPhoto" => true, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 3],
                ["value" => "Удовлетворительное", "showPhoto" => true, "showComments" => true, "showSubfields" => false, "color" => "#ffcc00", "id" => 4],
                ["value" => "Рекомендуется ремонт", "showPhoto" => true, "showComments" => true, "showSubfields" => false, "color" => "#ff0000", "id" => 5]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 70,
              "name" => "Работа двигателя на холостых, средних и выше средних оборотах (посторонние шумы, неустойчивая работа).",
              "section" => 3.2,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Осмотр будет произведен позже", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#0070c0", "id" => 1],
                ["value" => "В норме", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 2],
                ["value" => "Посторонние шумы", "showPhoto" => false, "showComments" => true, "showSubfields" => false, "color" => "#ff0000", "id" => 3],
                ["value" => "Неустойчивая работа", "showPhoto" => false, "showComments" => true, "showSubfields" => false, "color" => "#ff0000", "id" => 4]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 71,
              "name" => "Подшипники ступичные передних колес. Рулевые тяги и рулевые наконечники правые и левые. Передние тормозные шланги.",
              "section" => 3.3,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Незначительные отклонения", "showPhoto" => false, "showComments" => false, "showSubfields" => true, "color" => "#ffcc00", "id" => 2],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => false, "showSubfields" => true, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 72,
              "name" => "Подшипник ступичный переднего правого колеса",
              "section" => 3.3,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Незначительные отклонения", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 71,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 73,
              "name" => "Тормозной шланг переднего правого колеса",
              "section" => 3.3,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Незначительные трещины", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 71,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 74,
              "name" => "Рулевая тяга правая",
              "section" => 3.3,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправна", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Незначительные отклонения", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 71,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 75,
              "name" => "Рулевой наконечник правый",
              "section" => 3.3,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Незначительные отклонения", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 71,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 76,
              "name" => "Рулевая тяга левая",
              "section" => 3.3,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправна", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Незначительные отклонения", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 71,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 77,
              "name" => "Рулевой наконечник левый",
              "section" => 3.3,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Незначительные отклонения", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 71,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 78,
              "name" => "Тормозной шланг переднего левого колеса",
              "section" => 3.3,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Незначительные трещины", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 71,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 79,
              "name" => "Подшипник ступичный переднего левого колеса",
              "section" => 3.3,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Незначительные отклонения", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 71,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 80,
              "name" => "Передние тормозные колодки.",
              "section" => 3.3,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "В норме", "showPhoto" => false, "showComments" => true, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => true, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 81,
              "name" => "Передние тормозные диски.",
              "section" => 3.3,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "В норме", "showPhoto" => false, "showComments" => true, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => true, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 82,
              "name" => "Подшипники ступичные задних колес. Задние тормозные шланги.",
              "section" => 3.3,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "В норме", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => false, "showSubfields" => true, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 83,
              "name" => "Подшипник ступичный заднего правого колеса",
              "section" => 3.3,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Незначительные отклонения", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 82,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 84,
              "name" => "Тормозной шланг заднего правого колеса",
              "section" => 3.3,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Незначительные трещины", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 82,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 85,
              "name" => "Подшипник ступичный заднего левого колеса",
              "section" => 3.3,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Незначительные трещины", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 82,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 86,
              "name" => "Тормозной шланг заднего левого колеса",
              "section" => 3.3,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Незначительные трещины", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 82,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 87,
              "name" => "Задние тормозные колодки",
              "section" => 3.3,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "В норме", "showPhoto" => false, "showComments" => true, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => true, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 88,
              "name" => "Задние тормозные диски",
              "section" => 3.3,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "В норме", "showPhoto" => false, "showComments" => true, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Необходима замена", "showPhoto" => false, "showComments" => true, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 89,
              "name" => "Снятие защиты двигателя.",
              "section" => 3.4,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Выполнено", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
              ]),
              "parent_id" => NULL,
              "required" => 0,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 90,
              "name" => "Лонжероны левый и правый, передняя панель, радиаторы систем охлаждения двигателя, ГУРа, трансмиссии, радиатор кондиционера, опоры ДВС и КПП.",
              "section" => 3.4,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Следы ремонта", "showPhoto" => true, "showComments" => true, "showSubfields" => false, "color" => "#ff0000", "id" => 2],
                ["value" => "Повреждения", "showPhoto" => true, "showComments" => true, "showSubfields" => false, "color" => "#ff0000", "id" => 3],
                ["value" => "Коррозия", "showPhoto" => true, "showComments" => true, "showSubfields" => false, "color" => "#ff0000", "id" => 4]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 91,
              "name" => "Течи: Соединения систем охлаждения, ГУРа, топливной. Соединения передней крышки ДВС, турбины, переднего редуктора, КПП, заднего редуктора.",
              "section" => 3.4,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => true, "color" => "#ffcc00", "id" => 2],
                ["value" => "Обильная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => true, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 92,
              "name" => "Течь соединений системы охлаждения",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Обильная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 91,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 93,
              "name" => "Течь соединений системы ГУРа",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Обильная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 91,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 94,
              "name" => "Течь соединений топливной системы",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Обильная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 91,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 95,
              "name" => "Течь соединений передней крышки ДВС",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Обильная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 91,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 96,
              "name" => "Течь соединений турбины",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Обильная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 91,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 97,
              "name" => "Течь соединений переднего редуктора",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Обильная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 91,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 98,
              "name" => "Течь соединений КПП",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Обильная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 91,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 99,
              "name" => "Течь соединений заднего редуктора",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Отсутствуют", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Запотевание или незначительная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Обильная течь", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 91,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 100,
              "name" => "Передний левый амортизатор, пружина, отбойник, шаровая(ые) опора(ы) и сайлетблоки переднего левого рычага. ШРУС передний левый наружный и внутренний. Состояние передней левой шины и колесного диска.",
              "section" => 3.4,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Есть отклонения", "showPhoto" => false, "showComments" => false, "showSubfields" => true, "color" => "#ffcc00", "id" => 2],
                ["value" => "Неисправны", "showPhoto" => false, "showComments" => false, "showSubfields" => true, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => NULL,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 101,
              "name" => "Амортизатор переднего левого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Есть отклонения", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Неисправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 100,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 102,
              "name" => "Пружина переднего левого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправна", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Неисправна", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 2]
              ]),
              "parent_id" => 100,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 103,
              "name" => "Отбойник переднего левого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Есть отклонения", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Неисправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 100,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 104,
              "name" => "Шаровая(ые) опора(ы) переднего левого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправна", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Есть отклонения", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Неисправна", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 100,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 105,
              "name" => "Сайлентблоки рычага переднего левого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Есть отклонения", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Неисправны", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 100,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 106,
              "name" => "Наружный ШРУС переднего левого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Есть отклонения", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Неисправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 100,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 107,
              "name" => "Внутренний ШРУС переднего левого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Есть отклонения", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Неисправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 100,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 108,
              "name" => "Диск колесный передний левый",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Есть отклонения", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Неисправен", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 100,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
            [
              "id" => 109,
              "name" => "Шина переднего левого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Исправна", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
                ["value" => "Есть отклонения", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ffcc00", "id" => 2],
                ["value" => "Неисправна", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#ff0000", "id" => 3]
              ]),
              "parent_id" => 100,
              "required" => 1,
              "created_at" => Carbon::now(),
              "updated_at" => Carbon::now()
            ],
          ];
      $data2 = [
            [
              "id" => 110,
              "name" => "Втулки и стойки переднего стабилизатора. Рулевая рейка и рулевой вал. Сайлентблоки переднего подрамника.",
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
              "parent_id" => null,
              "required" => 1
           ],
           [
              "id" => 111,
              "name" => "Втулки переднего стабилизатора",
              "section" => 3.4,
              "type" => "subfield",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправны",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 110,
              "required" => 1
           ],
           [
              "id" => 112,
              "name" => "Стойка стабилизатора передняя левая",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправна",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправна",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 110,
              "required" => 1
           ],
           [
              "id" => 113,
              "name" => "Стойка стабилизатора передняя правая",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправна",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправна",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 110,
              "required" => 1
           ],
           [
              "id" => 114,
              "name" => "Рулевая рейка",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправна",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправна",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 110,
              "required" => 1
           ],
           [
              "id" => 115,
              "name" => "Рулевой вал",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправен",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправен",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 110,
              "required" => 1
           ],
           [
              "id" => 116,
              "name" => "Сайлентблоки переднего подрамника",
              "section" => 3.4,
              "type" => "subfield",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправны",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 110,
              "required" => 1
           ],
           [
              "id" => 117,
              "name" => "Передний правый амортизатор, пружина, отбойник, шаровая(ые) опора(ы) и сайлетблоки переднего левого рычага. ШРУС передний правый наружный и внутренний. Состояние передней правой шины и колесного диска.",
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
                    "value" => "Неиспаравны",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => true,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => null,
              "required" => 1
           ],
           [
              "id" => 118,
              "name" => "Амортизатор переднего правого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправен",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправен",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 117,
              "required" => 1
           ],
           [
              "id" => 119,
              "name" => "Пружина переднего правого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправна",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#008000",
                    "id" => 1
                 ],
                 [
                    "value" => "Неисправна",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 2
                 ]
              ]),
              "parent_id" => 117,
              "required" => 1
           ],
           [
              "id" => 120,
              "name" => "Отбойник переднего правого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправен",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправен",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 117,
              "required" => 1
           ],
           [
              "id" => 121,
              "name" => "Шаровая(ые) опора(ы) переднего правого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправна",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправна",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 117,
              "required" => 1
           ],
           [
              "id" => 122,
              "name" => "Сайлентблоки рычага переднего правого колеса",
              "section" => 3.4,
              "type" => "subfield",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправны",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 117,
              "required" => 1
           ],
           [
              "id" => 123,
              "name" => "Наружный ШРУС переднего правого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправен",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправен",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 117,
              "required" => 1
           ],
           [
              "id" => 124,
              "name" => "Внутренний ШРУС переднего правого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправен",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправен",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 117,
              "required" => 1
           ],
           [
              "id" => 125,
              "name" => "Диск колесный передний правый",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправен",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправен",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 117,
              "required" => 1
           ],
           [
              "id" => 126,
              "name" => "Шина переднего правого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправна",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправна",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 117,
              "required" => 1
           ],
           [
              "id" => 127,
              "name" => "Карданный вал, подвесной подшипник, выхлопная система.",
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
                    "value" => "Есть отклонения",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => true,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => null,
              "required" => 1
           ],
           [
              "id" => 128,
              "name" => "Карданный вал",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                [
                   "value" => "Исправен",
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
                   "showSubfields" => false,
                   "color" => "#ffcc00",
                   "id" => 2
                ],
                [
                   "value" => "Неисправен",
                   "showPhoto" => false,
                   "showComments" => false,
                   "showSubfields" => false,
                   "color" => "#ff0000",
                   "id" => 3
                ]
              ]),
              "parent_id" => 127,
              "required" => 1
           ],
           [
              "id" => 129,
              "name" => "Подвесной подшипник",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                [
                   "value" => "Исправен",
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
                   "showSubfields" => false,
                   "color" => "#ffcc00",
                   "id" => 2
                ],
                [
                   "value" => "Неисправен",
                   "showPhoto" => false,
                   "showComments" => false,
                   "showSubfields" => false,
                   "color" => "#ff0000",
                   "id" => 3
                ]
              ]),
              "parent_id" => 127,
              "required" => 1
           ],
           [
              "id" => 130,
              "name" => "Выхлопная система",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                [
                   "value" => "Исправна",
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
                   "showSubfields" => false,
                   "color" => "#ffcc00",
                   "id" => 2
                ],
                [
                   "value" => "Неисправна",
                   "showPhoto" => false,
                   "showComments" => false,
                   "showSubfields" => false,
                   "color" => "#ff0000",
                   "id" => 3
                ]
              ]),
              "parent_id" => 127,
              "required" => 1
           ],
           [
              "id" => 131,
              "name" => "Задний левый амортизатор, пружина, отбойник, шарниры и сайлентблоки заднего левого рычага. ШРУС задний левый наружный и внутренний. Состояние задней левой шины и колесного диска.",
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
                    "value" => "Есть отклонения",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => true,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => null,
              "required" => 1
           ],
           [
              "id" => 132,
              "name" => "Амортизатор заднего левого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправен",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправен",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 131,
              "required" => 1
           ],
           [
              "id" => 133,
              "name" => "Пружина заднего левого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправна",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#008000",
                    "id" => 1
                 ],
                 [
                    "value" => "Неисправна",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 2
                 ]
              ]),
              "parent_id" => 131,
              "required" => 1
           ],
           [
              "id" => 134,
              "name" => "Отбойник заднего левого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправен",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправен",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 131,
              "required" => 1
           ],
           [
              "id" => 135,
              "name" => "Наружный ШРУС заднего левого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправен",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправен",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 131,
              "required" => 1
           ],
           [
              "id" => 136,
              "name" => "Внутренний ШРУС заднего левого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправен",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправен",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 131,
              "required" => 1
           ],
           [
              "id" => 137,
              "name" => "Диск колесный задний левый",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправен",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправен",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 131,
              "required" => 1
           ],
           [
              "id" => 138,
              "name" => "Шина заднего левого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправна",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправна",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 131,
              "required" => 1
           ],
           [
              "id" => 139,
              "name" => "Задний правый амортизатор, пружина, отбойник, шарниры и сайлентблоки заднего правого рычага. ШРУС задний правый наружный и внутренний. Состояние задней правой шины и колесного диска.",
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
                    "value" => "Есть отклонения",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => true,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => null,
              "required" => 1
           ],
           [
              "id" => 140,
              "name" => "Амортизатор заднего правого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправен",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#008000",
                    "id" => 2
                 ],
                 [
                    "value" => "Есть отклонения",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправен",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 139,
              "required" => 1
           ],
           [
              "id" => 141,
              "name" => "Пружина заднего правого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправна",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#008000",
                    "id" => 1
                 ],
                 [
                    "value" => "Неисправна",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 2
                 ]
              ]),
              "parent_id" => 139,
              "required" => 1
           ],
           [
              "id" => 142,
              "name" => "Отбойник заднего правого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправен",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправен",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 139,
              "required" => 1
           ],
           [
              "id" => 143,
              "name" => "Наружный ШРУС заднего правого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправен",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправен",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 139,
              "required" => 1
           ],
           [
              "id" => 144,
              "name" => "Внутренний ШРУС заднего правого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправен",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправен",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 139,
              "required" => 1
           ],
           [
              "id" => 145,
              "name" => "Диск колесный задний правый",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправен",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправен",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 139,
              "required" => 1
           ],
           [
              "id" => 146,
              "name" => "Шина заднего правого колеса",
              "section" => 3.4,
              "type" => "subfield",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Исправна",
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
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 2
                 ],
                 [
                    "value" => "Неисправна",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => 139,
              "required" => 1
           ],
           [
              "id" => 147,
              "name" => "Установка защиты двигателя",
              "section" => 3.4,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Выполнено", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
              ]),
              "parent_id" => null,
              "required" => 0
           ],
           [
              "id" => 148,
              "name" => "Состояние цилиндров. Эндоскопия.",
              "section" => 3.5,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "Отличное",
                    "showPhoto" => true,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#008000",
                    "id" => 1
                 ],
                 [
                    "value" => "Хорошее",
                    "showPhoto" => true,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#008000",
                    "id" => 2
                 ],
                 [
                    "value" => "Удовлетворительное",
                    "showPhoto" => true,
                    "showComments" => true,
                    "showSubfields" => false,
                    "color" => "#ffcc00",
                    "id" => 3
                 ],
                 [
                    "value" => "Рекомендуется ремонт",
                    "showPhoto" => true,
                    "showComments" => true,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 4
                 ]
              ]),
              "parent_id" => null,
              "required" => 1
           ],
           [
              "id" => 149,
              "name" => "Установка свечей зажигания",
              "section" => 3.5,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                ["value" => "Выполнено", "showPhoto" => false, "showComments" => false, "showSubfields" => false, "color" => "#008000", "id" => 1],
              ]),
              "parent_id" => null,
              "required" => 0
           ],
           [
              "id" => 150,
              "name" => "Работа двигателя на холостых, средних и выше средних оборотах (посторонние шумы, неустойчивая работа).",
              "section" => 3.5,
              "type" => "field",
              "input" => "select",
              "values" => json_encode([
                 [
                    "value" => "В норме",
                    "showPhoto" => false,
                    "showComments" => false,
                    "showSubfields" => false,
                    "color" => "#008000",
                    "id" => 1
                 ],
                 [
                    "value" => "Посторонние шумы",
                    "showPhoto" => false,
                    "showComments" => true,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 2
                 ],
                 [
                    "value" => "Неустойчивая работа",
                    "showPhoto" => false,
                    "showComments" => true,
                    "showSubfields" => false,
                    "color" => "#ff0000",
                    "id" => 3
                 ]
              ]),
              "parent_id" => null,
              "required" => 1
           ]
            
            
          ];
          

        DB::table('service_fields')->insert($data);
        DB::table('service_fields')->insert($data2);
        
    }
}

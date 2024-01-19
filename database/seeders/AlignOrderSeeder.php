<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlignOrderSeeder extends Seeder
{
    public function run()
    {
        // Обрабатываем поля (type = field)
        $fields = DB::table('service_fields')->where('type', 'field')->orderBy('section')->orderBy('order')->get();
        $this->alignOrder($fields, true);

        // Обрабатываем подполя (type = subfield)
        $subfields = DB::table('service_fields')->where('type', 'subfield')->orderBy('parent_id')->orderBy('order')->get();
        $this->alignOrder($subfields, false);
    }

    private function alignOrder($fields, $full)
    {
        $currentSectionOrParentId = null;
        $newOrder = 1;
        $tracking = null;

        foreach ($fields as $field) {
            $tracking = $field->parent_id;
            if($full){
                $tracking = $field->section;
            }
            
            if ($tracking !== $currentSectionOrParentId) {
                $currentSectionOrParentId = $tracking;
                $newOrder = 1;
            }

            $this->updateOrder($field->id, $newOrder);

            $newOrder++;
        }
    }

    private function updateOrder($id, $order)
    {
        DB::table('service_fields')->where('id', $id)->update(['order' => $order]);
    }
}

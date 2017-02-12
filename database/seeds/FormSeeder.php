<?php


use App\Models\Forms;
use App\Models\InputGroup;
use App\Models\InputType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('forms')->delete();
        DB::table('forms')->insert(['id' => 1, 'name' => 'Форма описание квартиры', 'active' => true, 'created_at' => Carbon::now()]);

        DB::table('input_types')->delete();
        DB::table('input_types')->insert([
            ['code' => 'string', 'name' => 'Строка', 'created_at' => Carbon::now()],
            ['code' => 'list', 'name' => 'Список', 'created_at' => Carbon::now()],
            ['code' => 'checkbox', 'name' => 'Флажки', 'created_at' => Carbon::now()],
            ['code' => 'number', 'name' => 'число', 'created_at' => Carbon::now()],
            ['code' => 'radio', 'name' => 'Радиокнопки', 'created_at' => Carbon::now()],
        ]);

        DB::table('input_groups')->delete();
        InputGroup::create([
            'id' => 1,
            'name' => 'Информация о здании',
        ]);

        InputGroup::create([
            'id' => 2,
            'name' => 'Технические данные объекта',
            'children' => [
                [
                    'id' => 3,
                    'name' => 'Отделка пола',
                ],
                [
                    'id' => 4,
                    'name' => 'Отделка стен',
                ],
                [
                    'id' => 5,
                    'name' => 'Отделка потолков',
                ]
            ],
        ]);

        DB::table('group_options')->delete();
        DB::table('group_options')->insert([
            ['id' => 1, 'name' => 'Материал отделки', 'created_at' => Carbon::now()],
            ['id' => 2, 'name' => 'Вид отопления', 'created_at' => Carbon::now()],
        ]);

        DB::table('options')->delete();
        DB::table('options')->insert([
            ['name' => 'Гибсокартон', 'value' => 'gibs_carton','group_option_id' => 1],
            ['name' => 'Бетон', 'value' => 'beton', 'group_option_id' => 1],
            ['name' => 'Гипс', 'value' => 'gibs', 'group_option_id' => 1],

            ['name' => 'Центральное', 'value' => 'gibs_carton','group_option_id' => 2],
            ['name' => 'Индивидуальное', 'value' => 'beton', 'group_option_id' => 2],
        ]);

        DB::table('inputs')->delete();
        DB::table('inputs')->insert([
            ['name' => 'year_build', 'label' => 'Год постройки', 'input_group_id' => 2, 'group_option_id' => 1, 'input_type_code' => 'string', 'created_at' => Carbon::now()],
            ['name' => 'flat_count_build','label' => 'Этажность здания', 'input_group_id' => 2, 'group_option_id' => 1, 'input_type_code' => 'string', 'created_at' => Carbon::now()],
            ['name' => 'height','label' => 'Высота потолков помщения, см', 'input_group_id' => 2, 'group_option_id' => 1, 'input_type_code' => 'string', 'created_at' => Carbon::now()],
            ['name' => 'flat_building','label' => 'Этаж помещения', 'input_group_id' => 2, 'group_option_id' => 1, 'input_type_code' => 'string', 'created_at' => Carbon::now()],
            ['name' => 'typ_heart','label' => 'Вид отопления', 'input_group_id' => 2, 'group_option_id' => 2, 'input_type_code' => 'list', 'created_at' => Carbon::now()],
            ['name' => 'typ_heart2','label' => 'Тест чекбокс', 'input_group_id' => 2, 'group_option_id' => 2, 'input_type_code' => 'checkbox', 'created_at' => Carbon::now()],
            ['name' => 'typ_heart4','label' => 'Тест чекбокс2', 'input_group_id' => 3, 'group_option_id' => 2, 'input_type_code' => 'checkbox', 'created_at' => Carbon::now()],
        ]);

        DB::table('forms_has_input_groups')->delete();
        DB::table('forms_has_input_groups')->insert([
            ['forms_id' => 1, 'input_group_id' => 1],
            ['forms_id' => 1, 'input_group_id' => 2],
        ]);
    }
}

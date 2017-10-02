<?php
namespace Wbe\Crud\seeds;

use Illuminate\Database\Seeder;

class CreateContentTypeDescriptionTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        \DB::table('content_type_fields')->truncate();

//        \DB::table('content_type_fields')->insert(array(

        $data = array(
            0 =>
                array(
                    //'id' => '-1',
                    'content_type_id' => '-2',
                    'sort' => '9999',
                    'name' => '_default',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
//                    //'form_attributes' => '',
                    
                ),
            1 =>
                array(
                    //'id' => '36',
                    'content_type_id' => '1',
                    'sort' => '6',
                    'name' => 'is_system',
                    'type' => 'checkbox',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'integer',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    
                ),
            2 =>
                array(
                    //'id' => '3',
                    'content_type_id' => '1',
                    'sort' => '2',
                    'name' => 'model',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'max:255|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    
                ),
            3 =>
                array(
                    //'id' => '5',
                    'content_type_id' => '1',
                    'sort' => '4',
                    'name' => 'name',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'max:255|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            4 =>
                array(
                    //'id' => '4',
                    'content_type_id' => '1',
                    'sort' => '3',
                    'name' => 'sort',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'integer|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            5 =>
                array(
                    //'id' => '34',
                    'content_type_id' => '1',
                    'sort' => '0',
                    'name' => 'id',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'integer|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            6 =>
                array(
                    //'id' => '2',
                    'content_type_id' => '1',
                    'sort' => '1',
                    'name' => 'table',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'max:255|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
//            7 =>
//                array(
//                    //'id' => '18',
//                    'content_type_id' => '2',
//                    'sort' => '12',
//                    'name' => 'grid_attributes',
//                    'type' => 'text',
//                    'display_column' => '',
//                    'search_columns' => '',
//                    'relation' => '',
//                    'validators' => 'max:512|required',
//                    'grid_show' => '1',
//                    'grid_filter' => '1',
//                    'grid_custom_display' => '',
//                    //'grid_attributes' => '',
//                    'form_show' => '1',
//                    //'form_attributes' => '',
//                    //'show' => '1',
//                ),
            8 =>
                array(
                    //'id' => '15',
                    'content_type_id' => '2',
                    'sort' => '9',
                    'name' => 'grid_show',
                    'type' => 'checkbox',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'integer|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            9 =>
                array(
                    //'id' => '16',
                    'content_type_id' => '2',
                    'sort' => '10',
                    'name' => 'grid_filter',
                    'type' => 'checkbox',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'integer|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            10 =>
                array(
                    //'id' => '14',
                    'content_type_id' => '2',
                    'sort' => '8',
                    'name' => 'validators',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'max:512|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            11 =>
                array(
                    //'id' => '17',
                    'content_type_id' => '2',
                    'sort' => '11',
                    'name' => 'grid_custom_display',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'max:512|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            12 =>
                array(
                    //'id' => '19',
                    'content_type_id' => '2',
                    'sort' => '13',
                    'name' => 'form_show',
                    'type' => 'checkbox',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'integer|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
//            13 =>
//                array(
//                    //'id' => '20',
//                    'content_type_id' => '2',
//                    'sort' => '14',
//                    'name' => 'form_attributes',
//                    'type' => 'text',
//                    'display_column' => '',
//                    'search_columns' => '',
//                    'relation' => '',
//                    'validators' => 'max:512|required',
//                    'grid_show' => '1',
//                    'grid_filter' => '1',
//                    'grid_custom_display' => '',
//                    //'grid_attributes' => '',
//                    'form_show' => '1',
//                    //'form_attributes' => '',
//                    //'show' => '1',
//                ),
//            14 =>
//                array(
//                    //'id' => '21',
//                    'content_type_id' => '2',
//                    'sort' => '15',
//                    'name' => 'show',
//                    'type' => 'checkbox',
//                    'display_column' => '',
//                    'search_columns' => '',
//                    'relation' => '',
//                    'validators' => 'integer|required',
//                    'grid_show' => '1',
//                    'grid_filter' => '1',
//                    'grid_custom_display' => '',
//                    //'grid_attributes' => '',
//                    'form_show' => '1',
//                    //'form_attributes' => '',
//                    //'show' => '1',
//                ),
            15 =>
                array(
                    //'id' => '22',
                    'content_type_id' => '2',
                    'sort' => '16',
                    'name' => 'title',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'max:255|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),

            16 =>
                array(
                    //'id' => '6',
                    'content_type_id' => '2',
                    'sort' => '0',
                    'name' => 'id',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'integer|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            17 =>
                array(
                    //'id' => '7',
                    'content_type_id' => '2',
                    'sort' => '1',
                    'name' => 'content_type_id',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'integer|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            18 =>
                array(
                    //'id' => '8',
                    'content_type_id' => '2',
                    'sort' => '2',
                    'name' => 'sort',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'integer|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            19 =>
                array(
                    //'id' => '9',
                    'content_type_id' => '2',
                    'sort' => '3',
                    'name' => 'name',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'max:255|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            20 =>
                array(
                    //'id' => '10',
                    'content_type_id' => '2',
                    'sort' => '4',
                    'name' => 'type',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'max:255|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            21 =>
                array(
                    //'id' => '11',
                    'content_type_id' => '2',
                    'sort' => '5',
                    'name' => 'display_column',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'max:255|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            22 =>
                array(
                    //'id' => '12',
                    'content_type_id' => '2',
                    'sort' => '6',
                    'name' => 'search_columns',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'max:255|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            23 =>
                array(
                    //'id' => '13',
                    'content_type_id' => '2',
                    'sort' => '7',
                    'name' => 'relation',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'max:255|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            24 =>
                array(
                    //'id' => '28',
                    'content_type_id' => '3',
                    'sort' => '5',
                    'name' => 'updated_at',
                    'type' => 'date',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'date',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            25 =>
                array(
                    //'id' => '29',
                    'content_type_id' => '3',
                    'sort' => '6',
                    'name' => 'deleted_at',
                    'type' => 'date',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'date',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            26 =>
                array(
                    //'id' => '30',
                    'content_type_id' => '3',
                    'sort' => '7',
                    'name' => 'created_at',
                    'type' => 'date',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'date',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            27 =>
                array(
                //    //'id' => '37',
                    'content_type_id' => '3',
                    'sort' => '6',
                    'name' => 'role_id',
                    'type' => 'select',
                    'display_column' => 'name',
                    'search_columns' => '',
                    'relation' => 'role',
                    'validators' => '',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => 'role.name',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),

            28 =>
                array(
                  //  'id' => '23',
                    'content_type_id' => '3',
                    'sort' => '0',
                    'name' => 'id',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'integer|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            29 =>
                array(
//                    'id' => '24',
                    'content_type_id' => '3',
                    'sort' => '1',
                    'name' => 'email',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'max:255',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),

            30 =>
                array(
//                    'id' => '25',
                    'content_type_id' => '3',
                    'sort' => '2',
                    'name' => 'name',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'max:255|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            31 =>
                array(
//                    'id' => '26',
                    'content_type_id' => '3',
                    'sort' => '3',
                    'name' => 'password',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'max:255|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            32 =>
                array(
//                    'id' => '27',
                    'content_type_id' => '3',
                    'sort' => '4',
                    'name' => 'remember_token',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'max:255',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    
                ),
            33 =>
                array(
//                    'id' => '31',
                    'content_type_id' => '4',
                    'sort' => '0',
                    'name' => 'id',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'integer|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            34 =>
                array(
//                    'id' => '32',
                    'content_type_id' => '4',
                    'sort' => '1',
                    'name' => 'name',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'max:255|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            35 =>
                array(
//                    'id' => '33',
                    'content_type_id' => '4',
                    'sort' => '2',
                    'name' => 'code',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'max:2|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            36 =>
                array(
//                    'id' => '35',
                    'content_type_id' => '4',
                    'sort' => '3',
                    'name' => 'sort',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => 'integer|required',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            37 =>
                array(
//                    'id' => '38',
                    'content_type_id' => '5',
                    'sort' => '17',
                    'name' => 'id',
                    'type' => '',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => '',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
            38 =>
                array(
//                    'id' => '39',
                    'content_type_id' => '5',
                    'sort' => '18',
                    'name' => 'name',
                    'type' => 'text',
                    'display_column' => '',
                    'search_columns' => '',
                    'relation' => '',
                    'validators' => '',
                    'grid_show' => '1',
                    'grid_filter' => '1',
                    'grid_custom_display' => '',
                    //'grid_attributes' => '',
                    'form_show' => '1',
                    //'form_attributes' => '',
                    //'show' => '1',
                ),
        );
        /// $max_cont_id получаем максимальный контент на данный момент
        /// $cont_type_id  получаем id которые больше $max_cont_id  - получем количество и id контента которые добавили
        ///
        $max_cont_id  = \DB::table('content_type_fields')->max('content_type_id');
        if(!is_null($max_cont_id)) {
            $cont_type_id = \DB::table('content_type')->where('id', '>', $max_cont_id)->get(['id']);
            if (empty($cont_type_id)) {
                \DB::table('content_type_fields')->insert($data);
            } else { // меняем значения id
                $collect = collect($data)->groupBy('content_type_id');
                $data = $collect->slice($collect->count() - count($cont_type_id));
                $data->all();
                $i = 0;
                foreach ($data as $data_temp_key => $data_temp_value) {
                    foreach ($data_temp_value as $row_value) {
                        $row_value['content_type_id'] = $cont_type_id[$i]->id;
                        \DB::table('content_type_fields')->insert($row_value);
                    }
                    $i++;
                }
            }
        }
        else{
            \DB::table('content_type_fields')->insert($data);
        }
    }
}
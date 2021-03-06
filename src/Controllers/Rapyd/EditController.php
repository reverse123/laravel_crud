<?php

namespace Wbe\Crud\Controllers\Rapyd;

use App\Models\Relation;
use Mockery\Exception;
use Wbe\Crud\Controllers\MenuTreeController;
use Wbe\Crud\Controllers\Roles\RolesController;
use Wbe\Crud\Models\ModelGenerator;
use Wbe\Crud\Models\Rapyd\FieldsProcessor;

use App\Models\ContentTypes\Markets;
use App\Models\ContentTypes\News;

use App\Models\ContentTypes\Outcome;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Wbe\Crud\Models\ContentTypes\Languages;
use Wbe\Crud\Models\ContentTypes\ContentType;
use Wbe\Crud\Models\ContentTypes\ContentTypeFields;

use Illuminate\Support\Facades\Input;

use Zofe\Rapyd\DataFilter\DataFilter;
use Zofe\Rapyd\DataGrid\DataGrid;
use Zofe\Rapyd\DataEdit\DataEdit;
use Zofe\Rapyd\DataForm\DataForm;
use Zofe\Rapyd\Rapyd;
use Validator;
use Wbe\Crud\CustomClasses\MetaSettings;

class EditController extends Controller
{
    static public $request;
    /**
     * Форма редагування запису поточного типу контенту, його видалення
     * @param Request $r
     * @param $content_type
     * @param int $lang_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|string
     */
    public function index(Request $r, $content_type, $lang_id = 0)
    {
        if($r->exists('update'))
        {
            $r->set('modify',$r->get('update'));
        }

        EditController::$request = $r;
        if ($r->exists('modify') || $r->exists('insert')||$r->exists('show')) {
            $content = ContentType::find($content_type);
            if (!$content)
                die('content type with id ' . $content_type . ' not found');

            $content_id = $r->exists('modify') ? $r->input('modify') : false;

            if($r->exists('show'))
            $content_id = $r->input('show');

            $content->rec_id = $content_id;

            if (!$content) abort('403', 'Content type #' . $content_type . ' not found!');
           $content_model = $content::getCTModel($content->model);
            if (!$content_model)
                die('model not found: ' . $content->model);

            if ($r->exists('modify') || $r->exists('content')||$r->exists('show')) {
                if(\Schema::hasColumn($content->table, 'id')) {
                    $new_content_model = $content_model::where('id', $content_id)->first();

                } else {
                    $new_content_model = $content_model::where(\Schema::getColumnListing($content->table)[0], $content_id)->first();
                  }
                if (!$new_content_model)
                    $new_content_model = new $content_model;
            } else {
                $new_content_model = (new $content_model);
            }
            $desc_table = $content->table . '_description';
            $desc_table_exists = \Schema::hasTable($desc_table);
            try {
                $new_content_model::saved(function ($row) use ($content, $content_id, $desc_table, $desc_table_exists) {
                    $this_contentFilds = ContentTypeFields::getFieldsFromDB($content->id, [['form_show', 1]]);
                    foreach ($this_contentFilds as $filds) {
                        if ($filds->type == 'Wbe\Crud\Models\Rapyd\Fields\Relation') {
                            $languages = Languages::all()->pluck('name', 'id');
                            $contentTypeId = ContentType::where('table', $filds->name)->pluck('id')->first();
                            $desc_table = $filds->name . '_description';
                            $contentFieldsDescription = \Schema::getColumnListing($filds->desc_table);
                            $tableFieldsType = ContentTypeFields::getFieldsFromDB($contentTypeId, [['form_show', '=', 1]]);
                            /// наш новый тип достаем поля типа делаем новые обекты модельки
                            $contentFields = \Schema::getColumnListing($filds->name);
                            $tableName = $filds->name;
                            $all_id = \DB::table('ct_to_relations')
                                ->where([
                                    ['ct_to_relations_id', '=', $row->id],
                                    ['ct_to_relations_type', '=', get_class($row)]])
                                ->pluck('relations_id')->toArray();
                            if (isset($_POST[$tableName])) {
                                foreach (Input::get($tableName) as $key_rel => $item) {
                                    $update = false;
                                    foreach ($row->$tableName()->get() as $rel) {
                                        /// видаляемо id з массиву які є на сторінці , інші вважаємо видаленими
                                        if (isset($item['id']) && $rel->id == (int)$item['id']) {
                                            $search_id = array_search($rel->id, $all_id);
                                            unset($all_id[$search_id]);
                                            $update = true;
                                            $item = $this->fillmodel($item, $contentFields, $tableFieldsType, $tableName);
                                            if ($item['id'] < 0) {
                                                $item['id'] = null;
                                            }
                                            $rel->fill($item);
                                            $rel->save();
                                        }
                                    }
                                    $desc = null;
                                    if (!$update) {
                                        /// create new
                                        $item = $this->fillmodel($item, $contentFields, $tableFieldsType, $tableName);
                                        if ($item['id'] < 0) {
                                            $item['id'] = null;
                                        }
                                        $newInstance = $row->$tableName()->create($item);
                                        $new_typeInstance['id'] = $newInstance->id;
                                        $newInstance->save();
                                    }
                                    $desc_table_cont = $tableName . '_description';
                                    $desc_table_cont_exists_rel = \Schema::hasTable($desc_table);
                                    /// save ower type description
                                   /// content id

                                    if (!isset($new_typeInstance)) {
                                        $key = $key_rel;
                                    } else {
                                        $key = $new_typeInstance['id'];
                                    }
                                    $desc = Input::get($tableName . '_description')[$key_rel];
                                    if (!is_null($desc)) {
                                        if ($desc_table_cont_exists_rel && isset($_POST[$desc_table_cont])) {

                                            $lang_records = $desc;
                                            foreach ($desc as $post_lang_id => $post_lang) {

                                                if (!isset($new_typeInstance)) {
                                                    $lang_records[$post_lang_id]['content_id'] = $key_rel;
                                                } else {
                                                    $lang_records[$post_lang_id]['content_id'] = $new_typeInstance['id'];
                                                }

                                                $lang_records[$post_lang_id]['lang_id'] = $post_lang_id;
                                            }
                                            foreach ($lang_records as $post_lang_id => $post_lang) {
                                                $this->createAlias($post_lang);
                                                \DB::table($desc_table_cont)->updateOrInsert(['content_id' => $key, 'lang_id' => $post_lang_id], $post_lang);
                                            }
                                        }
                                    }
                                }
                            }/// relation взагалі ніякого нема  /// remova relations
                            foreach ($all_id as $id) {
                                \DB::table($filds->name)->where('id', '=', $id)->delete();
                            }
                            ////  remove description end relations table
                            foreach ($all_id as $value) {
                                \DB::table($filds->name . '_description')->where('content_id', '=', $value)->delete();

                                \DB::table('ct_to_relations')->where([
                                    ['relations_id', '=', $value],
                                    ['ct_to_relations_type', '=', get_class($row)]])->delete();
                            }
                        }
                    }
                    /////// generate meta for data
//                    dd($row);
                    $row = MetaSettings::GenerateMeta($content,$row,null);
//                    dd($row);
//                    /////// end generate meta for data
//                    ///
//                    /// need save new meta
//                    /// save new meta for data
                    $this->save_meta_data($content,$row);
                    /// end save new meta for data

                    $desc_table = $content->table . '_description';
                    // сохранение description для модели
                    if ($desc_table_exists && isset($_POST[$desc_table])) {
                        $lang_records = \Request::all()[$desc_table];
//                        dd($lang_records);
                        foreach ($lang_records as $post_lang_id => $post_lang) {
                            $lang_records[$post_lang_id]['content_id'] = $row->id;
                            $lang_records[$post_lang_id]['lang_id'] = $post_lang_id;
                        }
                        foreach ($lang_records as $post_lang_id => $post_lang) {
                            try{
                                $this->createAlias($post_lang);
                                ////// generate Meta description if need
                      $post_lang = MetaSettings::GenerateMeta($content,$row,$post_lang_id,$post_lang);
                                ////// end generate
                                \DB::table($desc_table)->updateOrInsert(['content_id' => $content_id, 'lang_id' => $post_lang_id], $post_lang);
                            }catch (\Exception $ex){
                                EditController::$request->session()->flash('message.level', 'danger');
                                EditController::$request->session()->flash('message.content', 'Error!'.$ex->getMessage());
                            }
                        }
                    }
                });
            }catch (\Exception $ex){
                EditController::$request->session()->flash('message.level', 'danger');
                EditController::$request->session()->flash('message.content', 'Error!'.$ex->getMessage());
            }
            $edit = DataForm::source($new_content_model);
            $show = false;
            if($r->exists('show')){
                $edit->status = 'show';
                $edit->link(\URL::previous(),'back',"TR");
                $edit->link(\URL::previous(),'back',"BR");
                $show = true;
            }

            $edit->attributes(array("class" => "table table-striped"));
            // method lable
            $lable_name_method ='';
            if($r->exists('insert')){
                $lable_name_method =     trans('crud::common.content_add');
            }
            elseif($r->exists('modify'))
            {
                $lable_name_method = trans('crud::common.content_edit');
            }elseif($r->exists('show'))
            {
                $lable_name_method = trans('crud::common.content_show');
            }
            $edit->label($content->name . ' > ' .  $lable_name_method);
            FieldsProcessor::addFields($content, $edit, 'form',$show);
            /// $tab  - for description tabs
            $tab = FieldsProcessor::$needTab;

            /// $cont_tab - for content tube $key is id content like data description or relation value is boot
            $cont_tab = FieldsProcessor::$cont_tabs;
            ksort($cont_tab);
            if(!$r->exists('show')) {
                $edit->link(url('admin/crud/grid/' . $content_type . '/'), trans('crud::common.cancel'), "TR");
                $edit->submit('Save', 'TR');
            }
            $edit->saved(function () use ($edit, $content_type, $lang_id) {
                if (\Request::has('to'))
                    $back_url = \Request::input('to');
                else{
                    if($content_type == 1){//// redirect to field descriptor regenerate menu and permissions
                        //// regenerate menu
                        $this->regen_menu_permission();
                        $back_url = url('admin/fields_descriptor/content/'.$edit->model->id);
                    }else{
                        if(config('crud.edit_redirect')==1){
                            $back_url = url('admin/crud/edit/' . $content_type . '?modify='.$edit->model->id);
                        }else{
                            $back_url = url('admin/crud/grid/' . $content_type . '/');
                        }
                    }
                }
                header('Location: ' . $back_url);
                die();
            });
            $edit->build();
            return view('crud::crud.form', compact('edit', 'lang_id','tab','cont_tab'));

        } elseif ($r->exists('delete')) {
            $content = ContentType::find($content_type);
            $content_model = /*'App\Models\\' .*/ $content->model;
            $new_content_model = $content_model::where('id', $r->input('delete'))->first();
            if (!$new_content_model)
                return 'content type does not exists';
            $desc_table_cont = $content->name. '_description';
            $desc_table_cont_exists_rel = \Schema::hasTable($desc_table_cont);
            if($desc_table_cont_exists_rel )
            {
                \DB::table($new_content_model['table'].'_description')->where('content_id','=',$r->input('delete'))->delete();
            }
            $new_content_model->delete();
            if($content_type==1){
                $this->regen_menu_permission();
            }
            return redirect(url('admin/crud/grid/' . $content_type . '/'));
        } else abort(404, 'Action not found');
    }



    /**
     * regenerate permissions and menu
     *
     */
    public function regen_menu_permission()
    {
        $menu = new MenuTreeController();
        $menu->tree_generate(false, false);
        //// regenerate permissions
        $roles = new RolesController();
        $roles->generatePermissions();
        $roles->AddAdminPermissions();
    }
    /**
     * Generate alias
     * @param $post_lang *_description some lang
     */
    function createAlias(&$post_lang){

        if(array_key_exists('alias',$post_lang)) {
            if (empty($post_lang['alias'])) {
                $post_lang['alias'] = str_slug($post_lang['title'], '-');
            }
        }
    }


    // for saved
    public function fillmodel($item ,$contentFilds,$contentFildsType,$modelName){
        // наполняем контент
        $newItem = [];
        foreach ($contentFilds as $content_key =>$content_value){
            $newItem[$content_value] = $this->getValue($item,$content_value,$modelName,$contentFildsType[$content_value]->type);
        }

        return $newItem;
    }

    public function getValue($item,$content_value,$modelName,$type){
        if($type!= 'image'){
            if(is_array($item[$content_value])){
                return  implode('|', $item[$content_value]);
            }else{
                return $item[$content_value];
            }
        }
        else{
            $id = $item['id'];
            // картинка може бути завантажена тільки що
            if(isset(EditController::$request->file([$modelName])[$id][$content_value]['val'])){
                $file =  EditController::$request->file([$modelName])[$id][$content_value]['val'];
                return '/files/' . $modelName. '/'.$file->getClientOriginalName();
            }
            // значення в нас знаходиться в назві поля old_img
            return $item[$content_value]['old_img'];
        }
    }

    private function save_meta_data($content,$data){
        if(MetaSettings::NeedMeta($content->id)) {
            if (!MetaSettings::is_description_table($content->table)) {
                dd('not description');
                if ($content->is_system == 0) {
                    foreach (MetaSettings::$columns as $col) {
                        \DB::table($content->table)->where('id', '=', $data->id)->update([$col => $data[$col]]);
                    }
                }
            }
        }
    }
}

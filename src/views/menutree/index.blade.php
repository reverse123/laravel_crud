@extends('crud::layout')
@section('title', 'CRUD')
@section('header', 'CRUD')

@section('content')
<link rel="stylesheet" type="text/css" href="/packages/wbe/crud/assets/admin_lte/libs/AdminLTE/plugins/select2/select2.css">
<style>
     .datatree-item{
        padding-bottom: 5px;
         padding-top: 5px;
    }
    .datatree-item > button{
        margin: 6px 0px;
    }
     .select2-wrapper {
    width: 300px;
}
/* Optional styling to the right */ 
 .select2-results {
    position: relative;
    line-height: 20px;
}
</style>
    <h4>{!! __("crud::common.menu_add_node") !!}</h4>
    <div class="container-fluid" style="border-bottom: 1px solid grey; margin-bottom: 30px; padding-bottom: 10px;">
    <form method="post" action="{!! route('menu.addCustomNode') !!}" class="form" id="new_node">
        {{ csrf_field() }}
        @foreach($langs as $lang_id=>$lang_name)
            <div class="col-md-3">
                <div class="form-group">
                    <label for="title">{{$lang_name}}</label>
                    <input type="text" class="form-control" name="title[{{$lang_id}}][title]" id="title">
                    <input type="hidden"  name="title[{{$lang_id}}][lang_id]" value="{!! $lang_id!!}" >
                </div>
            </div>
        @endforeach
        <div class="col-md-6 ">
            <label for="icon">{!! __("crud::common.menu_icon") !!}</label>
            {{--<input type="text" name="icon" class="form-control">--}}
            <select name="icon" class="form-control select2 select2-hidden-accessible" id="icons">
                @include("crud::menutree.icons")
            </select>
        </div>
        <div class="col-md-6" style="margin-bottom: 10px;">
            <label for="type">{!! __("crud::common.menu_type") !!}</label>
            <select name="type" class="form-control">
                <option value="1">{!! __("crud::common.menu_item") !!}</option>
                <option value="12">{!! __("crud::common.menu_label") !!}</option>
            </select>
        </div>
		 <div class="col-md-12 ">
            <label for="href">{!! __("crud::common.href") !!}</label>
            <input type="text" name="href" class="form-control">
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary col-md-4 col-xs-4">{!! __("crud::common.menu_add_node") !!}</button>
        </div>
    </form>
<div class="col-md-6">
    <a class="btn btn-danger  pull-right col-md-4 col-xs-4" href="{!! route('menu.generate') !!}">{!! __("crud::common.menu_regenerate") !!}</a>
</div>
    </div>
<div class="container-fluid" >
    {!! $tree !!}
</div>
@endsection
@section('scripts')
<script src="/packages/wbe/crud/assets/admin_lte/libs/AdminLTE/plugins/select2/select2.full.js"></script>
<script type="text/javascript">
    function formatState (state) {
          if (!state.id) {
            return state.text;
          }
          var $state = $(
            '<span class="'+state.element.value+'">   ' +  state.text + '</span>'
          );
          return $state;
        };
    function format(icon) {
        if(!icon.disabled&&icon.text!=""){
                return  $('<span class="'+icon.id+'">   ' + icon.text+'</span>');
        }
    }
    $("#icons").select2({
        width:"100%",
        templateSelection: formatState,
        templateResult: format,
    });

</script>

@endsection
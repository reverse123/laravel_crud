@extends('crud::layout')
@section('title', 'CRUD')
@section('header', 'CRUD')

@section('content')
    <style>
        .controll{
        margin: 5px;
        }
    </style>
    @if(isset($edit))
        {{--{!! dd($edit) !!}--}}
        <form method="post" class="form" id="new_node">
            {{ csrf_field() }}
            @foreach($edit['description'] as $edit_val)
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="title">{{$langs[$edit_val['lang_id']]}}</label>
                        <input type="text" class="form-control" name="title[{{$edit_val['lang_id']}}][title]" value="{{$edit_val['title']}}" id="title">
                        <input type="hidden"  name="title[{{$edit_val['lang_id']}}][lang_id]" value="{{$edit_val['lang_id']}}" >
                    </div>
                </div>
            @endforeach
            <div class="col-md-6 ">
                <label for="icon">{!! __("crud::common.menu_icon") !!}</label>
                <span class="{{$edit->icon}} col-md-1"  aria-hidden="true"></span><input type="text" name="icon" value="{!! $edit->icon !!}" class="form-control">
            </div>
            <div class="col-md-6 ">
                <label for="type">{!! __("crud::common.menu_type") !!}</label>
                <select name="type" class="form-control">
                    <option value="1" @if($edit->item_type==1){{"selected"}}@endif >{!! __("crud::common.menu_item") !!}</option>
                    <option value="12" @if($edit->item_type==12){{"selected"}}@endif>{!! __("crud::common.menu_label") !!}</option>
				</select>
            </div>
            <div class="col-md-12 controll">
                <button type="submit" class="btn btn-primary col-md-4 col-xs-4">{!! __("crud::common.menu_edit_node") !!}</button>
                <a href="{{route('Menu Edit')}}" class="btn btn-default col-md-4 col-xs-4 pull-right">{!! __("crud::common.back") !!}</a>
            </div>
        </form>
    @else
        <div class="col-md-6 col-md-offset-3">
           <h1>
               {!! __("crud::common.menu_delete_node_message") !!}
           </h1>
        </div>
        <button onclick="location.href='{{route('Menu Edit')}}'" class="btn btn-default col-md-4 col-xs-4">{!! __("crud::common.cancel") !!}</button>
        <form method="post" class="form"  >
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary col-md-4 col-xs-4 pull-right">{!! __("crud::common.delete") !!}</button>
        </form>

    @endif
@endsection
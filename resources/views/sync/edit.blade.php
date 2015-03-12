@extends('layout')

@section('title', 'Edit Sync')

@section('actions')
<a class="unlink button">
  <i class="fa fa-unlink"></i>
  {{ trans('Unlink') }}
</a>
<a class="button" href="{{ action('ProductController@show', $sync->product_id) }}">
  <i class="fa fa-link"></i>
  {{ trans('Product') }}
</a>
<a class="save button">
  <i class="fa fa-check"></i>
  {{ trans('Save') }}
</a>
@stop


@section('js')
$(document).ready(function() {
    $("#actions .save.button").click(function(){
      $("#save-form").submit()
    })
    $("#actions .unlink.button").click(function(){
      if(confirm("{{ trans('Are you sure? No backsies.') }}"))
        $("#delete-form").submit()
    })
})
@stop

@section('body')
  {!! Form::model($sync->model, [
    'url' => action('SyncController@update', $actionData),
    'method' => 'put',
    'id' => 'save-form'
    ]) !!}
    @yield('form')
  {!! Form::close() !!}

  {!! Form::open([
    'url' => action('SyncController@destroy', $actionData),
    'method' => 'delete',
    'id' => 'delete-form'
    ]) !!}
  {!! Form::close() !!}
@stop
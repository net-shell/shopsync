@extends('layout')

@section('title', 'Edit Sync')

@section('actions')
<a class="button" href="{{ action('ProductController@show', $sync->product_id) }}">
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
    $(".save.button").click(function(){
      submitForm()
    })
})
@stop

@section('body')
{!! Form::model($sync->model, ['url' => action('SyncController@update', $sync->id), 'method' => 'put']) !!}
<h2>Details</h2>
<div class="panel">
  <div class="row">
    <div class="medium-12 columns">
      <label>Name
        {!! Form::text('name', null, ['required']) !!}
      </label>
    </div>
  </div>
  <div class="row">
    <div class="large-12 columns">
      <label>
        Description
        <textarea name="description" rows="5" placeholder="Not required">{{ $sync->description }}</textarea>
      </label>
    </div>
  </div>
</div>
{!! Form::close() !!}
@stop
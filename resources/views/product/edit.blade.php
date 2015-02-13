@extends('layout')

@section('title', 'Edit Product')


@section('body')

{!! Form::model($data, ['url' => action('ProductController@update', $data->product_id), 'method' => 'put']) !!}

  <div class="panel">
    <div class="clearfix">
      <h2 class="left">Details</h2>
      <button type="submit" class="right button">
        <i class="fa fa-check"></i>
        {{ trans('Save') }}
      </button>
    </div>
  
    <div class="row">
      <div class="large-9 columns">
        <label>Name
          {!! Form::text('name', null, ['required']) !!}
        </label>
      </div>
      <div class="large-3 columns">
        <div class="row collapse">
          <label>Price</label>
          <div class="small-9 columns">
            {!! Form::text('price') !!}
          </div>
          <div class="small-3 columns">
            <span class="postfix">&euro;</span>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="large-12 columns">
        <label>Description
          <textarea rows="5" placeholder="Not required"></textarea>
        </label>
      </div>
    </div>
  </div>
{!! Form::close() !!}
@stop
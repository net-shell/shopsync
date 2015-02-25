@extends('layout')

@section('title', 'Edit Product')

@section('js')
$(document).ready(function() {
    $("#categories").tokenInput("{{ url('api/v1/categories') }}", {
      theme: 'facebook', preventDuplicates: true,
      prePopulate: {!! $product->categories->toJson() !!},
      onAdd: function(c){ $.ajax("{{ url('api/v1/products/'.$product->id.'/attach') }}/"+c.id) },
      onDelete: function(c){ $.ajax("{{ url('api/v1/products/'.$product->id.'/detach') }}/"+c.id) },
      resultsFormatter: function(c){ return "<li><img src='/images/icon-"+c.driver+".png' />"+"<div style='display:inline-block;padding-left:10px;'>"+c.name+"</div></li>" },
      tokenFormatter: function(c){ return "<li><p><img src='/images/icon-"+c.driver+".png' /> "+c.name+"</p></li>" }
    });
});
@stop

@section('body')
  <div class="panel">
{!! Form::model($product, ['url' => action('ProductController@update', $product->id), 'method' => 'put']) !!}
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
        <label>
          Categories
          <input id="categories" />
        </label>
      </div>
    </div>
    <div class="row">
      <div class="large-12 columns">
        <label>
          Description
          <textarea rows="5" placeholder="Not required"></textarea>
        </label>
      </div>
    </div>
{!! Form::close() !!}
  </div>
@stop
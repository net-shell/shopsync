@extends('layout')

@include('shit.price-field')

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
    })

    $(".save.button").click(function(){
      submitForm({ prices: model("prices") })
    })
})
@stop

@section('css')
#sync .button {
  display: block;
}
@stop

@section('actions')
<a class="button" href="{{ action('SyncController@create', ['products' => $product->id]) }}">
  <i class="fa fa-link"></i>
  {{ trans('Sync') }}
</a>
<a class="save button">
  <i class="fa fa-check"></i>
  {{ trans('Save') }}
</a>
@stop

@section('body')
<div class="row">
  <div class="large-8 columns">
    {!! Form::model($product, ['url' => action('ProductController@update', $product->id), 'method' => 'put']) !!}
    <h2>Details</h2>
    <div class="panel">
      <div class="row">
        <div class="medium-9 columns">
          <label>Name
            {!! Form::text('name', null, ['required']) !!}
          </label>
        </div>
        <div class="medium-3 columns">
            <label>Price</label>
            @yield('price-field')
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
            <textarea name="description" rows="5" placeholder="Not required">{{ $product->description }}</textarea>
          </label>
        </div>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
  <div class="large-4 columns">
    <h2>Synced With</h2>
    <div id="sync">
      @foreach($synced as $sync)
      <a href="{{ action('SyncController@show', ['products' => $product->id, 'driver' => $sync->driver]) }}"
        class="button">
        {{ $sync->driver }}
      </a>
      @endforeach
    </div>
  </div>
</div>
@stop
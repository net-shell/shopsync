@extends('layout')

@section('title', 'Create Product')

@section('actions')
{!! Form::open(['url' => action('ProductController@store'), 'method'=>'post']) !!}
	<ul class="button-group">
		<li><button type="submit" class="success button">
			<i class="fa fa-check"></i>
			{{ trans('Save') }}
		</button></li>
		<li>
			<a href="{{ action('ProductController@index') }}" class="secondary button">{{ trans('Cancel') }}</a>
		</li>
	</ul>
@stop

@section('body')
  <div class="row">
    <div class="large-10 columns">
      <label>Name
        <input name="name" type="text" required />
      </label>
    </div>
    <div class="large-2 columns">
      <div class="row collapse">
        <label>Price</label>
        <div class="small-9 columns">
          <input name="price" type="text" placeholder="0.00" required />
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
{!! Form::close() !!}
@stop
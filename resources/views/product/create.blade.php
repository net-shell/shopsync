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
    <div class="large-9 columns">
      <label>Name
        <input name="name" type="text" required />
      </label>
    </div>
    <div class="large-3 columns">
      <label>Listing
        {!! Form::select('listing_id', $listings) !!}
      </label>
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
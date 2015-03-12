@extends('layout')

@section('title', "Sync &bdquo;$product->name&ldquo; with:")

@section('actions')
<a class="button" href="{{ URL::previous() }}">
	{{ trans('Cancel') }}
</a>
@stop

@section('actions')
$(document).ready(function() {
	$("#driver-choice .button").click(function(){
		submitForm({ driver: model("prices") })
	})
})
@stop

@section('body')
@foreach($drivers as $driver)
<div>
	<a class="button" href="{{ action('SyncController@show', ['products' => $product->id, 'driver' => $driver]) }}">
		{{ $driver }}
	</a>
</div>
@endforeach
@stop
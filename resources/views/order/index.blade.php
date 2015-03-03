@extends('layout')

@include('shit.datagrid')

@section('title', 'Orders')

@section('body')
<div class="datagrid">
	<div class="disabled header row">
		<div class="small-8 columns">Product</div>
		<div class="small-4 columns">Ordered</div>
	</div>
	@foreach($orders as $order)
	<div class="row" data-href="{{ action('OrderController@show', $order->id) }}">
		<div class="small-8 columns">
			{{ $order->product->name }}
		</div>
		<div class="small-4 columns">
			{{ $order->created_at->diffForHumans() }}
		</div>
	</div>
	@endforeach
</div>
@stop
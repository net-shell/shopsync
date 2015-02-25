@extends('layout')

@section('title', 'Orders')

@section('body')
<table width="100%">
<thead>
	<tr>
		<td>Product</td>
		<td>Created</td>
	</tr>
</thead>
@foreach($orders as $order)
	<tr>
		<td>
			<a href="{{ action('ProductController@show', $order->product->id) }}">
				{{ $order->product->id }}
			</a>
		</td>
		<td>
			<a href="{{ action('OrderController@show', $order->id) }}">
				{{ $order->created_at->diffForHumans() }}
			</a>
		</td>
	</tr>
@endforeach
</table>
@stop
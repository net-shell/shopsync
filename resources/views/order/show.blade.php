@extends('layout')

@section('title', 'Order')

@section('body')
<div>
	Created:
	<span class="label">
		{{ $order->created_at->diffForHumans() }}
	</span>
	{{ $order->created_at }}
</div>
<div>
	Updated:
	<span class="label">
		{{ $order->updated_at->diffForHumans() }}
	</span>
	{{ $order->updated_at }}
</div>
@stop
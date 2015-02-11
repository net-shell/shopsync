@extends('layout')

@section('title', 'Products Index')

@section('body')

@foreach($products as $product)
<li>
	{{ $product->name }}
 	(mw: {{ count($product->microwebers) }})
 	(ebay: {{ count($product->ebays) }})
 </li>
@endforeach

@stop
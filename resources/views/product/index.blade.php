@extends('layout')

@section('title', 'Products')

@section('actions')
	<ul class="button-group">
		<li><a href="{{ action('ProductController@create') }}" class="success button">
			<i class="fa fa-plus"></i>
			Create
		</a></li>
	</ul>
@stop

@section('body')
	<table width="100%">
		<thead>
			<tr>
				<th>Name</th>
				<th width="150">Price</th>
				<th width="150">Microweber</th>
				<th width="150">Ebay</th>
			</tr>
		</thead>
		<tbody>
	@foreach($products as $product)
		<tr onclick="window.document.location='{{ action('ProductController@edit', $product->id) }}';">
			<td>
				<a href="{{ action('ProductController@edit', $product->id) }}">
					{{ $product->data->name or "Product #$product->id" }}
				</a>
			</td>
			<td>{{ $product->data->price or '-' }}</td>
	 		<td>{{ count($product->microwebers) }}</td>
	 		<td>{{ count($product->ebays) }}</td>
	 	</tr>
	@endforeach
		</tbody>
	</table>
	<div class="pagination-centered">
		<ul class="pagination">
			<li class="arrow unavailable"><a href="">&laquo;</a></li>
			<li class="current"><a href="">1</a></li>
			<li><a href="">2</a></li>
			<li><a href="">3</a></li>
			<li><a href="">4</a></li>
			<li class="arrow"><a href="">&raquo;</a></li>
		</ul>
	</div>
@stop
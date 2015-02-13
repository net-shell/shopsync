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
	<?php dd(ShopSync::products('ebay')); ?>
	<table width="100%">
		<thead>
			<tr>
				<th>Microweber</th>
				<th>Ebay</th>
			</tr>
		</thead>
		<tbody>
	@foreach($products as $product)
		<tr>
			<td>{{ $product->synced('microweber')['name'] }}</td>
	 		<td>{{ $product->synced('ebay')['name'] }}</td>
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
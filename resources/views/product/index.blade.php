@extends('layout')

@section('title', 'Products')

@section('actions')
	<button href="#" data-dropdown="drop1" aria-controls="drop1" aria-expanded="false" class="button dropdown">
		<i class="fa fa-plus"></i>
		Add New
	</button>
	<br>
	<ul id="drop1" data-dropdown-content class="f-dropdown" aria-hidden="true" tabindex="-1">
	  <li><a href="{{ action('ProductController@create') }}">Microweber</a></li>
	  <li><a href="{{ action('ProductController@create') }}">Ebay</a></li>
	</ul>
@stop

@section('body')
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
			<td>{{ var_dump($product) }}</td>
	 		<td>{{ $product->get('id') }}</td>
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
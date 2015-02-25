@extends('layout')

@section('title', 'Categories')

@section('body')

	<table width="100%">
	@if(isset($category) and $category->id>1)
		<thead>
			<tr>
				<td>
					<a href="{{ action('CategoryController@show', $category->parent_id) }}">
						<i class="fa fa-3x fa-chevron-circle-left"></i>
					</a>
				</td>
				<td>
					<h2 style="margin:0">{{ $category->name }}</h2>
				</td>
			</tr>
		</thead>
	@endif
	@foreach($categories as $category)
		<tr>
			<td style="text-align:center; width:60px">
		      	<input id="cb{{ $category->id }}" type="checkbox">
			</td>
			<td>
		      	<label for="cb{{ $category->id }}">
					@if(count($category->children))
					<a href="{{ action('CategoryController@show', $category->id) }}">
						{{ $category->name }}
					</a>
					@else
						{{ $category->name }}
					@endif
		      	</label>
			</td>
		</tr>
	@endforeach
	</table>

	{!! $categories->render() !!}
@stop
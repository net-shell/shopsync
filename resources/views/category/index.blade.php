@extends('layout')

@include('shit.datagrid')

@section('title', 'Categories')

@section('body')

@if(isset($category) and $category->id>1)
<a href="{{ action('CategoryController@show', $category->parent_id) }}">
	<i class="fa fa-3x fa-chevron-circle-left"></i>
</a>
<h2 style="margin:0">{{ $category->name }}</h2>
@endif
<div class="datagrid">
	<div class="disabled header row">
		<div class="small-8 columns"></div>
		<div class="small-2 columns">Driver</div>
		<div class="small-2 columns">Products</div>
	</div>
	@foreach($categories as $category)
	<div class="row" data-href="{{ action('CategoryController@show', $category->id) }}">
		<div class="small-8 columns">
			<i class="check fa fa-square-o fa-fw"></i>
			@if(count($category->children))
				{{ $category->name }}
			@else
				<i>{{ $category->name }}</i>
			@endif
		</div>
		<div class="small-2 columns">
			<img src="{{ asset("/images/icon-$category->driver.png") }}" />
		</div>
		<div class="small-2 columns">
			{{ count($category->products) }}
		</div>
 	</div>
	@endforeach
</div>

{!! $categories->render() !!}
@stop
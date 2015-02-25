@extends('layout')

@include('shit.datagrid')

@section('title', 'Product Listings')

@section('actions')
<a class="select edit disabled button">
	<i class="fa fa-pencil"></i>
</a>
<a href="#" class="select delete disabled button">
	<i class="fa fa-trash"></i>
</a>
<a href="{{ action('ProductController@create') }}" class="button">
	<i class="fa fa-plus"></i>
	{{ trans('Product') }}
</a>
@stop

@section('js')
$(".datagrid").on("selected", function(){
	var s=$(this).find(".row.selected").length
	$("#actions>.select").addClass("disabled")
	if(s) {
		if(s==1) $("#actions>.select.edit").removeClass("disabled")
		$("#actions>.select.delete").removeClass("disabled")
	}
})
$("#actions>.select.edit").click(function(){
	document.location = $(".datagrid .row.selected").data("href")
})
@stop

@section('body')

@foreach($listings as $listing)
<h2>{{ $listing->name }}</h2>
<div class="datagrid">
	<div class="disabled header row">
		<div class="small-4 columns"></div>
		<div class="small-2 columns">Status</div>
		<div class="small-2 columns">
			Price
			({{ app()['config']['shopsync.currencyDefault'] }})
		</div>
		<div class="small-2 columns">Modified</div>
		<div class="small-2 columns">Created</div>
	</div>
@foreach($listing->products as $product)
	<div class="row" data-href="{{ action('ProductController@show', $product->id) }}">
		<div class="small-4 columns">
			<i class="check fa fa-square-o fa-fw"></i>
			{{ $product->name }}
		</div>
		<div class="small-2 columns">
			@if($product->id % 2)
			<i class="fa fa-exclamation-circle fa-fw"></i>
			@endif
		</div>
		<div class="small-2 columns">
			{{ $product->defaultPrice }}
		</div>
		<div class="small-2 columns">
			{{ $product->updated_at->diffForHumans() }}
		</div>
		<div class="small-2 columns">
			{{ $product->created_at->diffForHumans() }}
		</div>
 	</div>
@endforeach
</div>
@endforeach
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
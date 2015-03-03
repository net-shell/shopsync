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

<dl class="sub-nav">
	<dt>{{ trans('Filter') }}:</dt>
	<dd class="active">
		<a href="#">All</a>
	</dd>
	<dd>
		<a href="#"><i class="fa fa-link"></i> Synced</a>
	</dd>
	<dd>
		<a href="#"><i class="fa fa-unlink"></i> Not Synced</a>
	</dd>
	<dd>
		<a href="#"><i class="fa fa-trash"></i> Trashed</a>
	</dd>
</dl>

@foreach($listings as $listing)
<h2>{{ $listing->name }} ({{ count($listing->products) }})</h2>
<div class="datagrid">
	<div class="disabled header row">
		<div class="small-5 columns"></div>
		<div class="small-1 columns" style="text-align: center">
			<i class="fa fa-link"></i>
		</div>
		<div class="small-2 columns">
			Price
			({{ app()['config']['shopsync.currencyDefault'] }})
		</div>
		<div class="small-2 columns">Modified</div>
		<div class="small-2 columns">Created</div>
	</div>
@foreach($listing->products as $product)
	<div class="row" data-href="{{ action('ProductController@show', $product->id) }}">
		<div class="small-5 columns">
			<i class="check fa fa-square-o fa-fw"></i>
			{{ $product->name }}
		</div>
		<div class="small-1 columns">
			@if($product->id % 2)
			<a href="#" class="button">2</a>
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
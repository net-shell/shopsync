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
<a href="#" class="button">
	<i class="fa fa-plus"></i>
	{{ trans('Listing') }}
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
$("#actions .select.edit").click(function(){
	if(!$(this).is(".disabled"))
		document.location = $(".datagrid .row.selected").data("href")
})
$("#actions .select.delete").click(function(){
	if(!$(this).is(".disabled")) {
		if(confirm("{{ trans('You think this is a motherfucking game?') }}"))
		var ids = $(".datagrid .row.selected").map(function() {
			return $(this).data("id")
		})
		console.log(ids)
	}
})
@stop

@section('body')

{!! Form::open(['url' => action('FilterController@set'), 'method' => 'post']) !!}
<dl class="sub-nav">
	<dt>{{ trans('Filter') }}:</dt>
	<dd {!! !session('products') ? 'class="active"' : '' !!}>
		<a onclick="SS.submitForm({'products': null})">All</a>
	</dd>
	<dd {!! session('products') == 'synced' ? 'class="active"' : '' !!}>
		<a onclick="SS.submitForm({'products': 'synced'})">
			<i class="fa fa-link"></i> Synced
		</a>
	</dd>
	<dd {!! session('products') == 'not_synced' ? 'class="active"' : '' !!}>
		<a onclick="SS.submitForm({'products': 'not_synced'})">
			<i class="fa fa-unlink"></i> Not Synced
		</a>
	</dd>
	<dd {!! session('products') == 'trashed' ? 'class="active"' : '' !!}>
		<a onclick="SS.submitForm({'products': 'trashed'})">
			<i class="fa fa-trash"></i> Trashed
		</a>
	</dd>
</dl>
{!! Form::close() !!}

@foreach($listings as $listing)
<h2>{{ $listing->name }} ({{ count($listing->products) }})</h2>
<div class="datagrid">
	<div class="disabled header row">
		<div class="small-5 columns">
			<a class="datagrid-select-all">
				<i class="fa fa-fw fa-check-square-o"></i>
				{{ trans('Select All') }}
			</a> /
			<a class="datagrid-unselect-all">
				{{ trans('None') }}
			</a>
		</div>
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
	
	@foreach($listing->products()->filtered()->get() as $product)
	<div class="row" data-href="{{ action('ProductController@show', $product->id) }}"
		data-id="{{ $product->id }}">
		<div class="small-5 columns">
			<i class="check fa fa-square-o fa-fw"></i>
			{{ $product->name }}
		</div>
		<div class="small-1 columns" style="text-align: center">
			@if(!$product->sync_status)
			<i class="fa fa-warning"></i>
			@endif
			{{ ShopSync::countProductLinks($product) }}
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

@stop
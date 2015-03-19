@extends('me')

@include('shit.datagrid')

@section('title', trans('My Shops'))

@section('actions')
	<a class="button" href="#">
		<i class="fa fa-arrow-up"></i>
		{{ trans('Upgrade') }}
	</a>
	<a class="button" href="{{ action('ShopController@create') }}">
		<i class="fa fa-plus"></i>
		{{ trans('Add Shop') }}
	</a>
@stop

@section('me-body')
	@if(empty($shopConfigs))
		<i>{{ trans('No shops to show') }}</i>
	@else
	<div class="datagrid">
		<div class="disabled header row">
			<div class="small-5 columns">{{ trans('Name') }}</div>
			<div class="small-3 columns">{{ trans('Currency') }}</div>
			<div class="small-2 columns">{{ trans('Modified') }}</div>
			<div class="small-2 columns">{{ trans('Created') }}</div>
		</div>
		
		@foreach ($shopConfigs as $shopConfig)
		<div class="row"> 
			<div class="small-5 columns"> 
				{{ $shopConfig->shop->name }}
			</div>
			<div class="small-3 columns"> 
				{{ $shopConfig->config }}
			</div>
			<div class="small-2 columns"> 
				{{ $shopConfig->updated_at->diffForHumans() }}
			</div>
			<div class="small-2 columns"> 
				{{ $shopConfig->created_at->diffForHumans() }}
			</div>
		</div>
		@endforeach
	</div>
	@endif
@stop
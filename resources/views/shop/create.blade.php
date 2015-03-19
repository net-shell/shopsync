@extends('me')

@section('title', trans('Add Shop'))

@section('js')
$("#drivers").find("a[data-id]").click(function(){
	$("input[name='id']").val($(this).data("id"))
	SS.submitForm()
})
@stop

@section('me-body')
{!! Form::open(['url' => action('ShopController@store'), 'method' => 'post']) !!}
	<input type="hidden" name="id" />
	<ul class="small-block-grid-2 medium-block-grid-4" id="drivers">
		@foreach($shops as $shop)
		<li>
			<a class="button" data-id="{{ $shop->id }}" style="width: 100%">
			{{ $shop->name }}
			</a>
		</li>
		@endforeach
	</ul>
{!! Form::close() !!}
@stop
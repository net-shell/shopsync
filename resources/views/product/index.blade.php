@extends('layout')

@section('title', 'Products')

@section('actions')
<a href="#" class="select edit disabled button">
	<i class="fa fa-pencil"></i>
</a>
<a href="#" class="select delete disabled button">
	<i class="fa fa-trash"></i>
</a>
<a href="#" class="button">
	<i class="fa fa-plus"></i>
	{{ trans('Create') }}
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
	console.log($(".datagrid .row.selected").data("href"))
})
@stop

@section('body')
<div class="datagrid">
@foreach($products as $product)
	<div class="row" data-href="12">
		<div class="small-8 columns">
			<i class="fa fa-square-o fa-fw"></i>
			{{ $product->get('id') }}
		</div>
		<div class="small-4 columns">
		@foreach($product->rays as $ray)
		{{ $ray->driver }}
		@endforeach
		</div>
 	</div>
@endforeach
</div>
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
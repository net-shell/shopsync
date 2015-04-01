<?php
$links = [
	'Stats|line-chart|home',
	'Products|book|products',
//	'Categories|folder-open|categories',
	'Orders|shopping-cart|orders'
]; ?>
<div class="icon-bar vertical">
	@foreach($links as $item)
	<?php $item = explode('|', $item); ?>
	<a href="{{ url('/'.$item[2]) }}"
		class="item {{ Request::is("$item[2]", "$item[2]/*") ?'active':'' }}" tabindex="0">
		<i class="fa fa-{{ $item[1] }}"></i>
		<label>{{ $item[0] }}</label>
	</a>
	@endforeach
	<a href="{{ url('/me') }}"
		class="item {{ Request::is("me", "me/*") ?'active':'' }}" tabindex="0">
		<i class="fa fa-user"></i>
		<label>{{ Auth::user()->name }}</label>
	</a>
</div>

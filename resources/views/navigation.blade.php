<div class="icon-bar five-up">
	@foreach(['Stats|line-chart|home',
		'Products|book|products',
		'Categories|folder-open|categories',
		'Orders|shopping-cart|orders',
		'Preferences|toggle-on|preferences'] as $item)
	<?php $item = explode('|', $item); ?>
	<a href="{{ url('/'.$item[2]) }}"
		class="item {{ Request::is("$item[2]", "$item[2]/*") ?'active':'' }}" tabindex="0">
		<i class="fa fa-{{ $item[1] }} fa-fw"></i>
		<label>{{ $item[0] }}</label>
	</a>
	@endforeach
</div>
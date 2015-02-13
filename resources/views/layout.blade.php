<!DOCTYPE html>
<html>
<head>
	<title>ShopSync - @yield('title')</title>
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Alegreya+Sans:100,400,700" />
	<link rel="stylesheet" href="{{ asset('css/foundation.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/app.css') }}" />
	<style>@yield('css')</style>
</head>
<body>

<div class="icon-bar vertical left fixed" style="z-index:100">
	@foreach(['|bar-chart|home', 'products|book|product', 'orders|shopping-cart|order', 'settings|cog|settings'] as $item)
	<?php $item = explode('|', $item); ?>
	<a href="{{ url('/'.$item[2]) }}"
		class="item {{ Request::is("$item[2]", "$item[2]/*") ?'active':'' }}" tabindex="0">
		<i class="fa fa-{{ $item[1] }} fa-fw"></i>
		<label>{{ ucfirst($item[0]) }}</label>
	</a>
	@endforeach
</div>

<div class="fixed">
	<div class="layout header">
		<h1>ShopSync</h1>
		<div class="row clear">
			<h2 class="left">@yield('title')</h2>
			<div class="right">
				@yield('actions')
			</div>
		</div>
	</div>
	<div class="row">
		@yield('body')
	</div>
</div>
</body>
</html>
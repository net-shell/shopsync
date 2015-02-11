<!DOCTYPE html>
<html>
<head>
	<title>ShopSync - @yield('title')</title>
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Alegreya+Sans:100,400,700" />
	<link rel="stylesheet" href="{{ asset('css/foundation.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>
<body>

<div class="icon-bar vertical left">
	<a class="item" tabindex="0">
		<i class="fa fa-home fa-fw"></i>
		<label>Home</label>
	</a>
	<a class="item" tabindex="0">
		<i class="fa fa-book fa-fw"></i>
		<label>Products</label>
	</a>
	<a class="item" tabindex="0">
		<i class="fa fa-cog fa-fw"></i>
		<label>Settings</label>
	</a>
</div>

<div class="fixed" style="left:96px">
	<div class="layout header">
		<h1>ShopSync</h1>
	</div>
	<div>
		@yield('body')
	</div>
</div>
</body>
</html>
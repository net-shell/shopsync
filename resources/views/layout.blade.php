<!DOCTYPE html>
<html>
<head>
	<title>@yield('title') - ShopSync</title>
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Alegreya+Sans:100,400,700" />
	<link rel="stylesheet" href="{{ asset('css/foundation.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/token-input-facebook.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/app.css') }}" />
	<style>@yield('css')</style>
</head>
<body>
<div id="site-title">
	<div class="row">
      	<div class="small-6 columns">
			<h1>
				<a href="{{ url('/') }}">
					Sh<i class="fa fa-circle-o-notch"></i>pSync
				</a>
			</h1>
      	</div>
      	<div class="small-6 columns">
			<a href="" class="user">
				<img src="{{ Auth::user()->avatar }}" />
				<div class="name">{{ Auth::user()->name }}</div>
			</a>
		</div>
      </div>
</div>
<div id="nav">
	<div class="row">@include('navigation')</div>
</div>
<div id="header">
	<div class="row">
		<div class="small-4 columns">
			<h2>@yield('title')</h2>
		</div>
		<div class="small-8 columns" id="actions">
			@yield('actions')
		</div>
	</div>
</div>
<div id="body">
	<div class="row">
      	<div class="small-12 columns">@yield('body')</div>
	</div>
</div>
<div id="footer">
	<hr />
	<a href="//github.com/netshell-ltd/shopsync/issues" target="_blank">
		<i class="fa fa-support fa-fw"></i>
		{{ trans('Support') }}
	</a>
</div>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery.tokeninput.js') }}"></script>
<script src="{{ asset('js/foundation.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>@yield('js')</script>
</body>
</html>
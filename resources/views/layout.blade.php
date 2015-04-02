<!DOCTYPE html>
<html>
<head>
	<title>@yield('title') - ShopSync</title>
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Alegreya+Sans:100,400,700" /><link rel="stylesheet" href="{{ asset('css/foundation.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/token-input-facebook.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/app.css') }}" />
	@yield('stylesheets')
	<style>@yield('css')</style>
</head>
<body>
		
<div id="header">
	<div id="title_wrap">
		<div class="row">
			<div class="medium-6 columns">
				<div id="site-title">
					<h1>
						<a href="{{ url('/') }}" class="left-off-canvas-toggle">
							<i class="fa fa-menu"></i>
							ShopSync
						</a>
					</h1>
				</div>
				<h2 id="page-title">/ @yield('title')</h2>
			</div>
			<div class="medium-6 columns">
				<div id="nav">
					<div class="row">@include('navigation')</div>
				</div>
			</div>
		</div>
	</div>
	<div id="actions_wrap" data-magellan-expedition="fixed">
		<div class="row">
			<div class="small-12 columns">
				<div id="actions">
					@yield('actions')
				</div>
			</div>
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
	<div class="row">
      	<div class="small-12 columns">
      		<ul class="small-block-grid-3 medium-block-grid-6">
      			<li>
					<a href="//netshell.biz">NetShell</a> ShitSync
				</li>
				<li>
					<a href="#">{{ trans('Developers') }}</a>
				</li>
				<li>
					<a href="#">{{ trans('Partners') }}</a>
				</li>
				<li>
					<a href="#">{{ trans('Affiliates') }}</a>
				</li>
				<li>
					<a href="#">{{ trans('Terms of Use') }}</a>
				</li>
				<li>
					<a href="//github.com/netshell-ltd/shopsync/issues" target="_blank">
						{{ trans('Support') }}
					</a>
				</li>
			</ul>
		</div>
	</div>	
</div>

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery.tokeninput.js') }}"></script>
<script src="{{ asset('js/modernizr.js') }}"></script>
<script src="{{ asset('js/foundation.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
<script>
$(document).foundation()
@yield('js')
</script>
</body>
</html>
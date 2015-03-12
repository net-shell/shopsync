<html>
	<head>
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Alegreya+Sans:100,400,700" />
		<link rel="stylesheet" href="{{ asset('css/foundation.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #666;
				display: table;
				font-family: 'Alegreya Sans';
			}
			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}
			.title {
				font-size: 72px;
				font-weight: 100;
				cursor: default;
			}
			.quote { font-size: 24px; }
		</style>
	</head>
	<body>
		<div class="container">
			<div class="title">ShopSync</div>
			<div class="quote">
				<ul class="button-group">
					<li>
						<a class="button" href="{{ url('/auth') }}">
							<i class="fa fa-arrow-right fa-fw"></i>
							Sign In
						</a>
					</li>
					<li>
						<a class="secondary button" target="_blank" 
							href="//facebook.com/pages/ShopSync/1552839424991984">
							<i class="fa fa-facebook fa-fw"></i>
							Like Us
						</a>
					</li>
				</ul>
			</div>
		</div>
	</body>
</html>

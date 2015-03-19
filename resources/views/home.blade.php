@extends('layout')

@section('title', 'Statistics')

@section('scripts')
<script src="{{ asset('js/chart.min.js') }}"></script>
@stop

@section('js')
var dataSales = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 80, 81, 56, 55, 40]
        },
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 86, 27, 90]
        }
    ]
};
var dataSync = {
    labels: ["eBay 4", "Amazon 6", "Microweber 1", "Microweber 2", "Amazon 3", "Amazon 1"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 90, 81, 56, 13]
        },
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 96, 103]
        }
    ]
};
$(window).bind("load resize", function(){
	$("canvas").each(function(){
		var pr = window.devicePixelRatio || 1;
		var w = $(this).parent().width() / pr
		$(this).width( w )
	})

	var ctx = $("#chart-sales")[0].getContext("2d");
	new Chart(ctx).Line(dataSales);
	
	ctx = $("#chart-sync")[0].getContext("2d");
	new Chart(ctx).Radar(dataSync);
})
@stop

@section('actions')
<a class="button">
	<i class="fa fa-refresh"></i>
	Update
</a>
@stop

@section('body')

<dl class="sub-nav">
	<dd class="active">
		<a href="#">This Month</a>
	</dd>
	<dd>
		<a href="#">Last Month</a>
	</dd>
	<dd>
		<a href="#">Custom Stats</a>
	</dd>
</dl>

<div class="row metric heading">
	<div class="medium-5 columns">
		<div class="content">
			<span class="accent">1036 &euro;</span> revenue
		</div>
	</div>
	<div class="medium-3 columns">
		<a href="#">
			<span class="accent">23</span> syncs
		</a>
	</div>
	<div class="medium-4 columns">
		<a href="#">
			<span class="accent">72 &euro;</span> charges
		</a>
	</div>
</div>

<div class="row secondary metric heading">
	<div class="medium-3 columns">
		<a href="#">
			<span class="accent">17</span> new orders
		</a>
	</div>
	<div class="medium-3 columns">
		<a href="#">
			<span class="accent">6</span> new comments
		</a>
	</div>
	<div class="medium-3 columns">
		<a href="#">
			<span class="accent">14</span> unsynced
		</a>
	</div>
	<div class="medium-3 columns">
		<a href="#">
			<span class="accent">53 </span> active
		</a>
	</div>
</div>

<div class="row">
	<div class="medium-6 columns">
		<h2>Sales</h2>
		<div class="panel">
			<canvas id="chart-sales" height="200"></canvas>
		</div>
	</div>
	<div class="medium-6 columns">
		<h2>Syncs</h2>
		<div class="panel">
			<canvas id="chart-sync" height="200"></canvas>
		</div>
	</div>
</div>
@endsection

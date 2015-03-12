@extends('layout')

@section('title', 'Dashboard')

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
	<div class="medium-7 columns">
		<div class="panel">Sales Stats</div>
	</div>
	<div class="medium-5 columns">
		<div class="panel">Sync Stats</div>
	</div>
</div>
@endsection

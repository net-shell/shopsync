@extends('layout')

@section('body')
<div class="row">
	<div class="panel">
		<h2>
			Hi
			<b>{{ $user->name }}</b>,
		</h2>
		<p>
			By using this service you agree to give us all your cash and sacrifice your firstborn pet in ShopSync's name.
		</p>
		<a class="success button" href="{{ url('/auth/logout') }}">
			<i class="fa fa-check"></i>
			I'm fine with that
		</a>
	</div>
</div>
@endsection

@extends('layout')

@section('title', $user->name)

@section('actions')
	<a class="button" href="{{ url('/auth/logout') }}">
		Sign Out
	</a>
@stop

@section('body')
<h2 class="heading">
	Hi <b>{{ $user->name }}</b>
</h2>
@stop
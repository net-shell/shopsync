@extends('layout')

@section('title', $user->name)

@section('body')
<div class="row">
	<dl class="sub-nav">
		<dd {!! Request::is('me') ? 'class="active"' : '' !!}>
			<a href="{{ url('me') }}">{{ trans('Account') }}</a>
		</dd>
		<dd {!! Request::is('me/shops') ? 'class="active"' : '' !!}>
			<a href="{{ url('me/shops') }}">{{ trans('Shops') }}</a>
		</dd>
		<dd {!! Request::is('me/team') ? 'class="active"' : '' !!}>
			<a href="{{ url('me/team') }}">{{ trans('Team') }}</a>
		</dd>
		<dd {!! Request::is('me/payments') ? 'class="active"' : '' !!}>
			<a href="{{ url('me/payments') }}">{{ trans('Payments') }}</a>
		</dd>
	</dl>
	<div class="small-12 columns">
		@yield('me-body')
	</div>
</div>
@stop

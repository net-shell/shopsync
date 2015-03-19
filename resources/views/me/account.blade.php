@extends('me')

@section('title', trans('My Account'))

@section('actions')
	<a class="button" href="{{ url('/auth/logout') }}">
		<i class="fa fa-sign-out"></i>
		{{ trans('Sign Out') }}
	</a>
@stop

@section('me-body')
{!! Form::model($user) !!}
	
	<ul class="small-block-grid-2">
		<li>
			{!! Form::label(trans('Full Name')) !!}
			<div class="row collapse">
				<div class="small-9 columns">
					{!! Form::text('name') !!}
				</div>
				<div class="small-3 columns">
					<a onclick="SS.submitForm()" class="button postfix">
						<i class="fa fa-check"></i>
						{{ trans('Change') }}
					</a>
				</div>
			</div>
		</li>
		<li>
			{!! Form::label(trans('E-mail')) !!}
			<p>
				<span data-tooltip title="{{ trans('E-mail Verified') }}">
					<i class="fa fa-check-circle"></i>
				</span>
				{{ $user->email }}
			</p>
		</li>
		<li>
			{!! Form::label(trans('Last Modified')) !!}
			<p>{{ $user->updated_at->diffForHumans() }}</p>
		</li>
		<li>
			{!! Form::label(trans('Signed Up')) !!}
			<p>{{ $user->created_at->diffForHumans() }}</p>
		</li>
	</ul>
{!! Form::close() !!}
@stop

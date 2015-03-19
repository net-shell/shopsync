<?php namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class MeController extends Controller {

	private $auth;

	public function __construct(Guard $auth)
	{
		$this->middleware('auth');
		$this->auth = $auth;
	}

	public function account()
	{
		return view('me.account')->withUser($this->auth->user());
	}
	
	public function editAccount(Request $request)
	{
		$user = $this->auth->user();
		$user->name = $request->input('name');
		$user->save();

		return redirect(action('MeController@account'));
	}
	
	public function team()
	{
		return view('me.team')->withUser($this->auth->user());
	}
	
}

<?php namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;

class PaymentController extends Controller {

	private $auth;

	public function __construct(Guard $auth)
	{
		$this->middleware('auth');
		$this->auth = $auth;
	}

	public function index()
	{
		return view('payment.index')->withUser($this->auth->user());
	}
	
}

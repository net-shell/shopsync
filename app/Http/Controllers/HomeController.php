<?php namespace App\Http\Controllers;

use ShopSync;
use Illuminate\Contracts\Auth\Guard;

class HomeController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Guard $auth, ShopSync $shopsync)
	{
		return view('home');
	}

}

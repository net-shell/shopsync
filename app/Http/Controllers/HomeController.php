<?php namespace App\Http\Controllers;

use ShopSync;

class HomeController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(ShopSync $shopsync)
	{
		dd($shopsync);
		return view('home');
	}

}

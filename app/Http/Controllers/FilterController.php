<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use URL;
use Illuminate\Session\SessionManager;

class FilterController extends Controller
{

	public function set(Request $request)
	{
		foreach($request->except('_token') as $filter => $value) {
			if($value == 'null') $value = null;
			session([$filter => $value]);
		}
		return Redirect(URL::previous());
	}

}
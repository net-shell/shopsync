<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Netshell\ShopSync\Models\Product;
use ShopSync;

class SyncController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Product $product)
	{
		return redirect(action('ProductController@show', $product->id));
	}

	public function create(Product $product)
	{
		return view('sync.create')
			->withDrivers(ShopSync::drivers())
			->withProduct($product);
	}

	public function show($driver, Product $product)
	{
		$ray = ShopSync::ray($product->id, $driver);
		return view("drivers.$driver")
			->withSync($ray);
	}

}
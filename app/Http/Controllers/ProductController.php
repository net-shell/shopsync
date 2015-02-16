<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Netshell\ShopSync\Models\Product;
use Netshell\ShopSync\Models\ProductData;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

use ShopSync;

class ProductController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$products = ShopSync::products();
		dd($products);
		return view('product.index')->withProducts($products);
	}

	public function create()
	{
		return view('product.create');
	}

	public function show($id)
	{
	}

	public function destroy($id)
	{
	}

}

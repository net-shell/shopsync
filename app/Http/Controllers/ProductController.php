<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Netshell\ShopSync\Models\Product;
use Netshell\ShopSync\Models\ProductData;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class ProductController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		return view('product.index')->withProducts(Product::all());
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

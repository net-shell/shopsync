<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Netshell\ShopSync\Models\Product;
use ShopSync;

class ProductController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$products = ShopSync::products();
		//dd($products);
		return view('product.index')->withProducts($products);
	}

	public function edit(Product $product) {
		return view('product.edit')->withProduct($product);
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

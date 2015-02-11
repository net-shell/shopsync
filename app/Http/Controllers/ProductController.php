<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Netshell\ShopSync\Models\Product;
use Netshell\ShopSync\Models\MicroweberProduct;
use Netshell\ShopSync\Models\EbayProduct;

use Illuminate\Http\Request;

class ProductController extends Controller {

	public function index()
	{
		return view('product.index')->withProducts(Product::all());
	}

	public function create()
	{
		//
	}

	public function store()
	{
		//
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}

}

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

	public function store(Request $request, Guard $auth)
	{
		$product = new Product(['user_id' => $auth->user()->id]);
		$product->save();
		$data = $request->only('name', 'price');
		$product->data()->save(new ProductData($data));
		return redirect(action('ProductController@index'));
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		return view('product.edit')->withData(Product::find($id)->data);
	}

	public function update($id, Request $request)
	{
		$data = Product::find($id)->data;
		$data->fill($request->only('name', 'price'));
		$data->save();
		return redirect(action('ProductController@index'));
	}

	public function destroy($id)
	{
		//
	}

}

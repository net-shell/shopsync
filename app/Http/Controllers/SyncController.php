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

	public function update(Product $product, $driver, Request $request)
	{
		$sync = ShopSync::ray($product->id, $driver);
		$input = $request->only('name', 'description');
		$sync->model->fill($input);
		$sync->model->save();
		return redirect(action('ProductController@show', $product->id));
	}

	public function show(Product $product, $driver)
	{
		$sync = ShopSync::rayEnsure($product->id, $driver);
  		$actionData = [
  			'products' => $sync->product->id,
  			'driver' => $sync->driver
  		];
		return view("sync.drivers.$driver")->with(compact('sync', 'actionData'));
	}

	public function destroy(Product $product, $driver)
	{
		$sync = ShopSync::ray($product->id, $driver);
		$sync->model->delete();
		return redirect(action('ProductController@show', $product->id));
	}
}
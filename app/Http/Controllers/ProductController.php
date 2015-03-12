<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Netshell\ShopSync\Models\Listing;
use Netshell\ShopSync\Models\Product;
use Netshell\ShopSync\Models\Price;
use Netshell\ShopSync\Models\Quantity;
use ShopSync;

class ProductController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		return view('product.index')
			->withListings(Listing::with('products')->get());
	}

	public function show(Product $product)
	{
		$synced = ShopSync::rays($product->id);
		$hasSynced = 0 < count($synced);
		return view('product.edit')
			->with(compact('product', 'hasSynced', 'synced'));
	}

	public function create()
	{
		$listings = Listing::all()->lists('name','id');
		return view('product.create')
			->withListings($listings);
	}

	public function store(Product $product)
	{
		$product->autofill()->save();
		return redirect(action('ProductController@show', $product->id));
	}

	public function update(Product $product, Request $request)
	{
		$product->autofill()->save();
		$newPrices = json_decode($request->get('prices'));
		foreach ($newPrices as $currency => $value) {
			$price = $product->prices()
				->whereCurrency($currency)
				->first();
			if(is_null($price) && !($value > 0)) {
				continue;
			}
			if(is_null($price)) {
				$price = new Price(['currency' => $currency, 'value' => $value]);
				$price->product()->associate($product)->save();
			}
			else {
				if($value > 0) {
					$price->value = $value;
					$price->save();
				} else {
					$price->delete();
				}
			}
		}
		return redirect(action('ProductController@index'));
	}

	public function destroy(Product $product)
	{
		$product->delete();
	}

}

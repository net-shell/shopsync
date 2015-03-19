<?php namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Netshell\ShopSync\Models\Shop;
use Netshell\ShopSync\Models\ShopConfig;

class ShopController extends Controller {

	private $auth;

	public function __construct(Guard $auth)
	{
		$this->middleware('auth');
		$this->auth = $auth;
	}

	public function index()
	{
		$user = $this->auth->user();
		$shopConfigs = ShopConfig::all();
		return view('shop.index')->with(compact('user', 'shopConfigs'));
	}

	public function create()
	{
		$user = $this->auth->user();
		$shops = Shop::all();
		return view('shop.create')->with(compact('user', 'shops'));
	}

	public function store(Request $request)
	{
		$shopId = $request->input('id');
		$shop = Shop::find($shopId);
		$config = new ShopConfig([
			'shop_id' => $shop->id,
			'user_id' => $this->auth->user()->id,
			'config' => $shop->default_config
			]);
		$config->save();
		return redirect(action('ShopController@index'));
	}
}
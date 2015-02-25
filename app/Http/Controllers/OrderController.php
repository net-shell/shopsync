<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Netshell\ShopSync\Models\Order;
use ShopSync;

class OrderController extends Controller {

	public function __construct(Order $order) {
		$this->middleware('auth');
		$this->order = $order;
	}

	public function index() {
		return view('order.index')
			->withOrders($this->order->all());
	}

	public function show(Order $order) {
		return view('order.show')
			->withOrder($order);
	}

	public function destroy(Order $order) {
	}

}

<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Netshell\ShopSync\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function getIndex(Request $request) {
		$q = $request->get('q');
		if(strlen($q)) {
			$categories = Category::where('name', 'LIKE', "%$q%")
				->select('id', 'name', 'driver')
				->take(4)
				->get();
			return $categories->toJson();
		}
		return [];
	}

}

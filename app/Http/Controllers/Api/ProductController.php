<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Netshell\ShopSync\Models\Product;
use Netshell\ShopSync\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function attachCategory(Product $product, Category $category) {
		$product->categories()->attach($category);
	}
	
	public function detachCategory(Product $product, Category $category) {
		$product->categories()->detach($category);
	}

}

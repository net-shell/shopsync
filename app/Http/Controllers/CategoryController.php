<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Netshell\ShopSync\Models\Category;

use ShopSync;

class CategoryController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$categories = Category::whereParentId(1)->paginate(8);
		return view('category.index')->withCategories($categories);
	}

	public function show($parent=1)
	{
		$categories = ShopSync::categories($parent);
		return view('category.index')
			->withCategories($categories)
			->withCategory(Category::find($parent));
	}
}

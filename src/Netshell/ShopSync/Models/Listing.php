<?php namespace Netshell\ShopSync\Models;

use Auth;
use Exception;

class Listing extends Model {

	public $timestamps = false;
	protected $guarded = ['id'];

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function products() {
		return $this->hasMany('Netshell\ShopSync\Models\Product');
	}

	public function newQuery($excludeDeleted = true) {
		$isAuth = Auth::check();
		$isCli = app()->runningInConsole();
		if(!$isAuth and !$isCli) {
			throw new Exception('Unauthorized query!');
		}
		if($isCli or 1 == Auth::user()->id) {
			return parent::newQuery($excludeDeleted);
		}
		return parent::newQuery($excludeDeleted)
			->where('user_id', '=', Auth::user()->id);
    }

}
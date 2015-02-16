<?php namespace Netshell\ShopSync\Models;

use Auth;
use ShopSync;
use Exception;

class Product extends Model {

	public $timestamps = false;
	protected $fillable = ['user_id'];

    public function user() {
        return $this->belongsTo('App\User');
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
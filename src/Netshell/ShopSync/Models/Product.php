<?php namespace Netshell\ShopSync\Models;

use Auth;
use Exception;

class Product extends Model {

	public $timestamps = false;
	protected $fillable = ['user_id'];

    public function user() {
        return $this->belongsTo('App\User');
    }

	public function newQuery($excludeDeleted = true) {
		$isAuth = Auth::check();
		if(!$isAuth) {
			throw new Exception('Unauthorized query!');
		}
		if(1 == Auth::user()->id) {
			return parent::newQuery($excludeDeleted);
		}
		return parent::newQuery($excludeDeleted)
			->where('user_id', '=', Auth::user()->id);
    }

}
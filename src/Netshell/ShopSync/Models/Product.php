<?php namespace Netshell\ShopSync\Models;

class Product extends Model {

	public $timestamps = false;

	public function ebays() {
		return $this->hasMany('Netshell\ShopSync\Models\EbayProduct');
	}

	public function microwebers() {
		return $this->hasMany('Netshell\ShopSync\Models\MicroweberProduct');
	}

    public function user() {
        return $this->belongsTo('App\User');
    }

    function getNameAttribute() {
    	return 'placeholder';
    }

}
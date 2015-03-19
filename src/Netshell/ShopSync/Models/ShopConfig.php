<?php namespace Netshell\ShopSync\Models;

class ShopConfig extends Model {

	public $guarded = [];

	public function shop() {
		return $this->belongsTo('Netshell\ShopSync\Models\Shop');
	}

}
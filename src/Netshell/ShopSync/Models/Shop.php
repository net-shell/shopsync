<?php namespace Netshell\ShopSync\Models;

class Shop extends Model {

	public $timestamps = false;
	public $guarded = [];

	public function configs() {
		return $this->hasMany('Netshell\ShopSync\Models\ShopConfig');
	}

}
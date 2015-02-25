<?php namespace Netshell\ShopSync\Models;

class Order extends Model {

	public function product() {
		return $this->belongsTo('Netshell\ShopSync\Models\Product');
	}

}
<?php namespace Netshell\ShopSync\Models;

class Syncable extends Model {

	public function product() {
		return $this->belongsTo('Netshell\ShopSync\Models\Product');
	}

}
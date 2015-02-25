<?php namespace Netshell\ShopSync\Models;

class MicroweberProduct extends Model {

	protected $table = 'products_microweber';

	function product() {
		return $this->belongsTo('Netshell\ShopSync\Models\Product');
	}

}
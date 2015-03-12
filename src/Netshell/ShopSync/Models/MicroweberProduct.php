<?php namespace Netshell\ShopSync\Models;

class MicroweberProduct extends Model {

	protected $table = 'products_microweber';
	protected $fillable = ['name', 'description'];

	function product() {
		return $this->belongsTo('Netshell\ShopSync\Models\Product');
	}

}
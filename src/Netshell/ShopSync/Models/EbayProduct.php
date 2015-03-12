<?php namespace Netshell\ShopSync\Models;

class EbayProduct extends Model {

	protected $table = 'products_ebay';
	protected $fillable = ['name', 'description'];

	function product() {
		return $this->belongsTo('Netshell\ShopSync\Models\Product');
	}

}
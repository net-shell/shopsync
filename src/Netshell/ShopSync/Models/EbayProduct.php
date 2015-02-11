<?php namespace Netshell\ShopSync\Models;

class EbayProduct extends Model {

	protected $table = 'products_ebay';

	function product()
	{
		return $this->belongsTo('Netshell\ShopSync\Models\Product');
	}

}
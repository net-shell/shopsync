<?php namespace Netshell\ShopSync;

class EbayProduct extends Model {

	function product()
	{
		return $this->morphToMany('Netshell\ShopSync\Models\Product', 'syncable');
	}

}
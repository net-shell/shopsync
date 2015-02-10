<?php namespace Netshell\ShopSync;

class MicroweberProduct extends Model {

	function product()
	{
		return $this->morphToMany('Netshell\ShopSync\Models\Product', 'syncable');
	}

}
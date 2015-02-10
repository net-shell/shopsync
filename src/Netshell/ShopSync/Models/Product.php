<?php namespace Netshell\ShopSync;

class Product extends Model {

	function products($driverModel)
	{
		return $this->morphedByMany($driverModel, 'syncable');
	}

}
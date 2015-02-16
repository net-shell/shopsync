<?php namespace Netshell\ShopSync\Drivers;

use Netshell\ShopSync\Contracts\Driver;

class Ebay extends AbstractDriver implements Driver {

	public function getState()
	{
		return parent::getState(['name', 'updated_at']);
	}

	public function sync() {
		return 'much api calls. very wow.';
	}

}
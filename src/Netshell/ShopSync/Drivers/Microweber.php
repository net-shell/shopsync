<?php namespace Netshell\ShopSync\Drivers;

use Netshell\ShopSync\Contracts\Driver;

class Microweber extends AbstractDriver implements Driver {

	public function sync() {
		return 'custom module api endpoint calls';
	}

}
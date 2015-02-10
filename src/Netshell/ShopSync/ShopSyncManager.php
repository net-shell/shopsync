<?php namespace Netshell\ShopSync;

use Netshell\ShopSync\Contracts\Driver;
use Illuminate\Support\Manager;
use Exception;

class ShopSyncManager extends Manager {

	public function getDefaultDriver() {
		throw new Exception('No ShopSync driver was specified.');
	}

	protected function createMicroweberDriver()
	{
		return $this->buildDriver('Netshell\ShopSync\Drivers\Microweber', 'microweber');
	}

	protected function createEbayDriver()
	{
		return $this->buildDriver('Netshell\ShopSync\Drivers\Ebay', 'ebay');
	}

	public function buildDriver($driver, $config)
	{
		$config = $this->app['config']['services.'.$config];
		if(is_null($config)) {
			throw new Exception('No service configuration found for driver '.$driver);
		}
		return new $driver($config);
	}

}
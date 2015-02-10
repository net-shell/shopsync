<?php namespace Netshell\ShopSync;

use Netshell\ShopSync\Contracts\Driver;
use Illuminate\Support\Manager;

class ProductManager extends Manager {

	public function __construct($app)
	{
		parent::__construct($app);

	}

	public function getDefaultDriver() {
		throw new InvalidArgumentException('No ShopSync driver was specified.');
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
		return new $driver($config);
	}

}
<?php namespace Netshell\Sync;

use Netshell\Sync\Contracts\Driver;
use Illuminate\Support\Manager;
use Exception;

class SyncManager extends Manager {

	public function getDefaultDriver() {
		throw new Exception('No Sync driver was specified.');
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
<?php namespace Netshell\Sync;

use Netshell\Sync\Contracts\Driver;
use Illuminate\Support\Manager;
use Exception;

class SyncManager extends Manager {

	// Observers

	public function observe()
	{
    	foreach ($this->driverModels as $driver => $model) {
    		$model::observe(new ModelObserver);
		}
	}

	// Star

	public function centers()
	{
		$class = $this->centerModel;
		$result = Star\Center::fromCollection($class::all());
		foreach ($result as $center) {
			$center->rays = $this->rays($center->get('id'));
		}
		return collect($result);
	}

	public function rays($centerId, $driver = null)
	{
		if(!is_null($driver)) {
	    	return $this->ray($centerId, $driver);
    	}
    	$result = array();
    	foreach ($this->driverModels as $driver => $model) {
    		$result[] = $this->ray($centerId, $driver);
    	}
    	return collect($result);
	}

	public function ray($centerId, $driver)
	{
		if(!array_key_exists($driver, $this->driverModels)) {
			return null;
		}
		$model = $this->getDriverModel($driver)
    		->where($this->centerForeign, $centerId)
    		->first();
		$ray = new Star\Ray($model);
		$ray->driver = $driver;
		return $ray;
	}


	// Drivers

	protected $centerModel;
	protected $centerForeign;
	protected $syncFields;
	protected $driverModels;

	public function getDriverModel($driver)
	{
		$class = $this->driverModels[$driver];
		return new $class;
	}

	public function getModelDriver($model)
	{
		foreach ($this->driverModels as $driver => $modelClass) {
			if(is_a($model, $modelClass)) {
				return $driver;
			}
		}
	}

	public function getDefaultDriver() {
		throw new Exception('No Sync driver was specified.');
	}

	public function buildDriver($driver, $config = null)
	{
		if(!is_null($config)) {
			$config = $this->app['config']['services.'.$config];
			if(is_null($config)) {
				throw new Exception('No service configuration found for driver '.$driver);
			}
		}
		return new $driver($config);
	}

}
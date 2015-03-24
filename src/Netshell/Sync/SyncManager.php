<?php namespace Netshell\Sync;

use Netshell\Sync\Contracts\Driver;
use Illuminate\Support\Manager;
use Exception;

class SyncManager extends Manager {

	// Star

	public function center($rayModel)
	{
		$class = $this->centerModel;
		$key = $this->centerForeign;
		$centerModel = $class::find($rayModel->$key);
		return new Star\Center($centerModel);
	}
	
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
	    		$ray = $this->ray($centerId, $driver);
	    		if(!is_null($ray)) {
	    			$result[] = $ray;
	    		}
	    	}
	    	return collect($result);
	}

	public function ray($centerId, $driver)
	{
		$model = $this->getDriverModel($driver)
    		->where($this->centerForeign, $centerId)
    		->first();
    		if(is_null($model)) {
    			return null;
    		}
		$ray = new Star\Ray($model, $driver);
		return $ray;
	}

	public function rayEnsure($centerId, $driver)
	{
		$ray = $this->ray($centerId, $driver);
		if(!is_null($ray)) {
			return $ray;
		}

		$model = $this->getDriverModel($driver);
		$fk = $this->centerForeign;
    		$model->$fk = $centerId;
    		$model->save();

    		$ray = new Star\Ray($model, $driver);
		return $ray;
	}


	// Drivers

	protected $centerModel;
	protected $centerForeign;
	protected $syncFields;
	protected $driverModels;
	protected $sourceDriver;

	public function getDriverModel($driver)
	{
		if(!array_key_exists($driver, $this->driverModels)) {
			return null;
		}

		$class = $this->driverModels[$driver];
		return new $class;
	}
	
	public function drivers()
	{
		return array_keys($this->driverModels);
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
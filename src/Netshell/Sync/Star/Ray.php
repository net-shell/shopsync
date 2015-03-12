<?php namespace Netshell\Sync\Star;

use Netshell\Sync\ModelContainer;

class Ray extends ModelContainer {

	public $driver;

	function __construct($model, $driver = null) {
		parent::__construct($model);
		$this->driver = $driver;
	}

	public function getHash()
	{
		
	}

}
<?php namespace Netshell\Sync\Drivers;

use Netshell\Sync\Contracts\Driver;

abstract class AbstractDriver implements Driver {

	protected $config;

	public function __construct($config = null) {
		$this->config = $config;
	}

	abstract public function sync();

}
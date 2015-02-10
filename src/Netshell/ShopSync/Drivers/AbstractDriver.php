<?php namespace Netshell\ShopSync\Drivers;

use Netshell\ShopSync\Contracts\Driver;

abstract class AbstractDriver implements Driver {

	protected $config;

	public function __construct(Array $config) {
		$this->config = $config;
	}

	abstract public function sync();

}
<?php namespace Netshell\ShopSync\Drivers;

use Netshell\ShopSync\Contracts;

class Microweber implements Driver {
	
	public $modelClass = 'Netshell\ShopSync\Models\MicroweberProduct';
	protected $config;

	public function __construct($config) {
		$this->config = $config;
	}

	public function create($model) {}
	public function get($id) {}
	public function search($model) {}
	public function update($model) {}
	public function delete($model) {}

}
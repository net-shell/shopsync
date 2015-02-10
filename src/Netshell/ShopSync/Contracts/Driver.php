<?php namespace Netshell\ShopSync\Contracts;

interface Driver {

	public $modelClass;

	public function __construct(Array $config);
	public function create($model);
	public function get($id);
	public function search($model);
	public function update($model);
	public function delete($model);

}
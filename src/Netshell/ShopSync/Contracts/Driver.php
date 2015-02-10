<?php namespace Netshell\ShopSync\Contracts;

interface Driver {

	public function __construct(Array $config);
	public function sync();

}
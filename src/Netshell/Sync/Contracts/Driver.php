<?php namespace Netshell\Sync\Contracts;

interface Driver {

	public function __construct($config);
	public function sync();

}
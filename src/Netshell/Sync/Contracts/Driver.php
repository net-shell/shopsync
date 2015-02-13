<?php namespace Netshell\Sync\Contracts;

interface Driver {

	public function __construct(Array $config);
	public function sync();

}
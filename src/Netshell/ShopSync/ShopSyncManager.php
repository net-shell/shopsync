<?php namespace Netshell\ShopSync;

use Netshell\Sync\SyncManager;

class ShopSyncManager extends SyncManager {

	protected function createMicroweberDriver()
	{
		return $this->buildDriver('Netshell\ShopSync\Drivers\Microweber', 'microweber');
	}

	protected function createEbayDriver()
	{
		return $this->buildDriver('Netshell\ShopSync\Drivers\Ebay', 'ebay');
	}

}
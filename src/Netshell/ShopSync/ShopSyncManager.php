<?php namespace Netshell\ShopSync;

use Netshell\Sync\SyncManager;

class ShopSyncManager extends SyncManager {

	//

	public function products($driver) {
		return (new $this->lync)->hasOne($this->driverModels[$driver]);//->first();
	}


	// Drivers

	protected $lync = 'Netshell\ShopSync\Models\Product';
	protected $driverModels = [
		'ebay'		  => 'Netshell\ShopSync\Models\EbayProduct',
		'microweber'  => 'Netshell\ShopSync\Models\MicroweberProduct'
	];

	protected function createMicroweberDriver()
	{
		return $this->buildDriver('Netshell\ShopSync\Drivers\Microweber', 'microweber');
	}

	protected function createEbayDriver()
	{
		return $this->buildDriver('Netshell\ShopSync\Drivers\Ebay', 'ebay');
	}

}
<?php
namespace Netshell\ShopSync;

use Netshell\Sync\SyncManager;
use Netshell\ShopSync\Models\Category;

class ShopSyncManager extends SyncManager
{
    
    public function categories($parent=1) {
    	return Category::whereParentId($parent)->get();
    }
    
    // Shortcuts
    public function products() {
        return $this->centers();
    }
    
    // Drivers
    protected $centerModel = 'Netshell\ShopSync\Models\Product';
    protected $centerForeign = 'product_id';
    protected $syncFields = ['name'];
    protected $driverModels = ['ebay' => 'Netshell\ShopSync\Models\EbayProduct', 'microweber' => 'Netshell\ShopSync\Models\MicroweberProduct'];
    protected $sourceDriver = 'microweber';
    
    // Built-in drivers
    protected function createMicroweberDriver() {
        return $this->buildDriver('Netshell\ShopSync\Drivers\Microweber', 'microweber');
    }
    
    protected function createEbayDriver() {
        return $this->buildDriver('Netshell\ShopSync\Drivers\Ebay', 'ebay');
    }
}

<?php
namespace Netshell\ShopSync\Drivers;

use Netshell\Sync\Contracts\Driver;
use Netshell\Sync\Drivers\AbstractDriver;
use Netshell\ShopSync\Models\Category;

use DTS\eBaySDK\Constants;
use DTS\eBaySDK\Trading\Services;
use DTS\eBaySDK\Trading\Types;

class Ebay extends AbstractDriver implements Driver
{
    
    public function getState() {
        return parent::getState(['name', 'updated_at']);
    }
    
    public function sync() {
        return 'much api calls. very wow.';
    }
    
    public function seedCategories() {
        $service = new Services\TradingService(['apiVersion' => $this->config['tradingApiVersion'], 'siteId' => Constants\SiteIds::US, 'sandbox' => true]);
        $request = new Types\GetCategoriesRequestType();
        $request->RequesterCredentials = new Types\CustomSecurityHeaderType();
        $request->RequesterCredentials->eBayAuthToken = $this->config['sandbox']['userToken'];
        $request->DetailLevel = ['ReturnAll'];
        $request->OutputSelector = ['CategoryArray.Category.CategoryID', 'CategoryArray.Category.CategoryName', 'CategoryArray.Category.CategoryParentID'];
        
        $response = $service->getCategories($request);
        
        if ($response->Ack !== 'Success') {
            if (isset($response->Errors)) {
                foreach ($response->Errors as $error) {
                    var_dump($error);
                }
            }
        }
        foreach ($response->CategoryArray->Category as $category) {
            (new Category([
                'category_id' => $category->CategoryID,
                'name' => $category->CategoryName,
                'driver' => 'ebay',
                'parent_id' => $category->CategoryParentID[0]
            ]))->save();
        }
    }
}

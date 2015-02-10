<?php namespace Netshell\ShopSync;

use Illuminate\Support\ServiceProvider;

class ShopSyncServiceProvider extends ServiceProvider {

	public function boot()
	{
		//
	}

	public function register(ProductManager $productManager)
	{
		$this->app->bind('SyncProduct', 'Netshell\ShopSync\ProductManager');
	}
}

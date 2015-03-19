<?php namespace Netshell\ShopSync;

use Illuminate\Support\ServiceProvider;

class ShopSyncServiceProvider extends ServiceProvider {

	public function boot()
	{
		$this->app['shopsync']->observe();
	}

	public function register()
	{
		$this->app->singleton('shopsync', function() {
			return new ShopSyncManager($this->app);
		});
	}
}

# ShopSync

ShopSync is a Sync implementation. It allows you to synchronize your e-commerce products with 3rd party services like eBay!

Simply load the `Netshell\ShopSync\ShopSyncServiceProvider`. You can use the built-in drivers or easily extend your own. Currently ShopSync provides drivers for:
* Microweber
* eBay


# Netshell Sync

Sync provides features for working with star-connected synchronised content.
There are two entity types in such connection:
* The `Center` of the star
* `Rays` connected to the same center

Each Ray has a different model type that has to be supported by a driver.
Your implementation of `SyncManager` must define and bind drivers for each model you're syncing.

## Schema
Each ray's table must contain a foreign key relating them to their Center's primary key (e.g. `center_id`). It should have a `unique` key in order to prevent duplicate entries for the same driver.

The table holding Centers only needs a primary key but you may have any metadata columns as well.

## Drivers

Extend the SyncManager class.
Make a `create` function for your driver:
```
protected function createMyDriver() {
	return $this->buildDriver('MyDriverClass', 'mydriver');
}
```
The second parameter is the service configuration key for your driver. It's optional but usually you'll want to consume 3rd party services so it kinda makes sense.

In case you pass the second arg don't forget to check if there's a config entry with the name specified, otherwise you'll be thrown an ugly-ass exception.
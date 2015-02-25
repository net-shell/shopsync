<?php namespace Netshell\ShopSync\Models;

class Product extends Model {

	protected $fillable = ['name', 'description'];

	public function listing() {
		return $this->belongsTo('Netshell\ShopSync\Models\Listing');
	}

	public function categories() {
		return $this->belongsToMany('Netshell\ShopSync\Models\Category');
	}

	public function orders() {
		return $this->hasMany('Netshell\ShopSync\Models\Order');
	}

	public function prices() {
		return $this->hasMany('Netshell\ShopSync\Models\Price');
	}
	
	public function quantities() {
		return $this->hasMany('Netshell\ShopSync\Models\Quantity');
	}
	
	public function getDefaultPriceAttribute() {
		$default = app()['config']['shopsync.currencyDefault'];
		$price = $this->prices()->whereCurrency($default)->first();
		if(is_null($price)) {
			return null;
		}
		return $price->value;
	}
}
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

	public function quantities() {
		return $this->hasMany('Netshell\ShopSync\Models\Quantity');
	}

	public function prices() {
		return $this->hasMany('Netshell\ShopSync\Models\Price');
	}

	public function scopeFiltered($query)
	{
		switch (session('products')) {
			case 'synced':
				return $query->where('sync_status', true);
			case 'synced':
				return $query->where('sync_status', false);
		}
		return $query;
	}

	public function getPricesJsonAttribute()
	{
		$prices = array();
		foreach($this->prices as $price) {
			$prices[$price['currency']] = $price['value'];
		}
		return count($prices) ? json_encode($prices) : '{}';	
	}

	public function getCurrencyAttribute() {
		if(isset($this->attributes['currency'])) {
			return $this->attributes['currency'];
		}
		 return app()['config']['shopsync.currencyDefault'];
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
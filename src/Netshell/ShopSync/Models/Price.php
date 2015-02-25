<?php namespace Netshell\ShopSync\Models;

class Price extends Model {

	public $timestamps = false;
	protected $touches = ['product'];
	protected $fillable = ['value', 'currency'];
	
	public function product() {
		return $this->belongsTo('Netshell\ShopSync\Models\Product');
	}

}
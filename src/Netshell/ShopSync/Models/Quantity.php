<?php namespace Netshell\ShopSync\Models;

class Quantity extends Model {

	public $timestamps = false;
	protected $touches = ['product'];
	protected $fillable = ['value', 'unit', 'storage'];
	
	public function product() {
		return $this->belongsTo('Netshell\ShopSync\Models\Product');
	}

}
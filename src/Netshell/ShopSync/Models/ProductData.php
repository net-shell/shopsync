<?php namespace Netshell\ShopSync\Models;

use Auth;
use Exception;

class ProductData extends Model {

	public $timestamps = false;
	public $table = 'product_data';
	protected $guarded = ['id'];

    public function product() {
        return $this->belongsTo('Netshell\ShopSync\Models\Product');
    }

}
<?php namespace Netshell\ShopSync\Models;

class Category extends Model {
	
	public $timestamps = false;
	public $guarded = [];

	public function products() {
		return $this->belongsToMany('Netshell\ShopSync\Models\Product');
	}
	
	public function children() {
		return $this->hasMany('Netshell\ShopSync\Models\Category', 'parent_id');
	}

	public function parent() {
		return $this->belongsTo('Netshell\ShopSync\Models\Category', 'parent_id');
	}

}
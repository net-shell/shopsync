<?php namespace Netshell\ShopSync;

use ShopSync;

class ModelObserver {

	function updating($model) {
		
		$center = ShopSync::center($model);
		$center->sync_status = false;
		$center->model->save();

	}

}
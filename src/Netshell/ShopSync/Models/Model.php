<?php namespace Netshell\ShopSync\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent {

	public function autofill() {
		$request = app()->make('request');
		$this->fill(count($this->fillable)
			? $request->only($this->fillable)
			: $request->input());
		return $this;
	}

}
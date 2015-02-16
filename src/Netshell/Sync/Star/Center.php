<?php namespace Netshell\Sync\Star;

class Center {

	protected $model;

	function __construct($model) {
		$this->model = $model;
	}

	function get($property) {
		return $this->model->$property;
	}

	function set($property, $value) {
		$this->model->$property = $value;
	}

	static function fromCollection($centers) {
		$result = array();
		foreach ($centers as $center) {
			$result[] = new Center($center);
		}
		return collect($result);
	}

}
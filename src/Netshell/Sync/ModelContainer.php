<?php namespace Netshell\Sync;

class ModelContainer {

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

}
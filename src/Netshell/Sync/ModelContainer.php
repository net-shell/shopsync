<?php namespace Netshell\Sync;

class ModelContainer {

	public $model;

	function __construct($model)
	{
		$this->model = $model;
	}

	function __get($property)
	{
		return $this->model->$property;
	}

	function __set($property, $value)
	{
		$this->model->$property = $value;
	}

}
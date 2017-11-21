<?php

class Homepage extends Controller
{
	public $design;

	function __construct($action = "index")
	{
		parent::__construct();
		$this->design->template = "index";
		if(method_exists(__CLASS__, $action))
			$this->$action();
	}

	private function index()
	{
		$object = new Event();
		$this->design->data['events'] = $object->index();

		$object = new News();
		$this->design->data['news'] = $object->index();
	}
}
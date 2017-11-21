<?php

class Projects extends Controller
{
	public $design;
	protected $dbh;

	function __construct($action = "index")
	{
		parent::__construct();
		$this->design->template = "projects";
		if(method_exists(__CLASS__, $action))
			$this->$action();
	}

	public function index()
	{ 
		$object = new Project();
		$this->design->data['projects'] = $object->index();
	}
}
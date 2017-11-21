<?php

class Acceptions extends Controller
{
	public $design;
	protected $dbh;

	function __construct($action = "index")
	{
		parent::__construct();
		$this->design->template = "acception";
		if(method_exists(__CLASS__, $action))
			$this->$action();
	}

	public function index()
	{ 
		$object = new Acception();
		$this->design->data['acceptions'] = $object->index();
	}
}
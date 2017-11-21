<?php

class Teachers extends Controller
{
	public $design;
	protected $dbh;

	function __construct($action)
	{
		parent::__construct();
		$this->design->template = "teachers";
		if(method_exists(__CLASS__, $action))
			$this->$action();
	}

	public function index()
	{ 
		$object = new Teacher();
		$this->design->data['teachers'] = $object->index();
	}
}
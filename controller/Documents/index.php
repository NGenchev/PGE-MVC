<?php

class Documents extends Controller
{
	public $design;
	protected $dbh;

	function __construct($action = "index")
	{
		parent::__construct();
		$this->design->template = "document";
		if(method_exists(__CLASS__, $action))
			$this->$action();
	}

	public function index()
	{ 
		$object = new Document();

		if($object->index()==0)
			$this->design->data['error'] = 404;
		else
			$this->design->data['document'] = $object;
	}
}
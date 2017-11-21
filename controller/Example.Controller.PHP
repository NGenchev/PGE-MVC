<?php
## EXAMPLE ##
/*
	$this->design->template = "Name";
	$this->design->data[];
*/

class Name extends Controller
{
	public $design;
	protected $dbh;

	function __construct($action)
	{
		parent::__construct();
		$this->design->template = <TEMPLATE_NAME>;
		if(method_exists(__CLASS__, $action))
			$this->$action();
	}

	public function index()
	{ 
		//$object = new <MODEL>();
	}

	public function add()
	{ 
		
	}

	public function edit()
	{ 
		
	}

	public function delete()
	{ 
		
	}
}
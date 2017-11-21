<?php
class Regulations extends Controller
{
	public $design;
	protected $dbh;

	function __construct($action)
	{
		parent::__construct();
		$this->design->template = "regulations";
		if(method_exists(__CLASS__, $action))
			$this->$action();
	}

	public function index()
	{ 
		$object = new Regulation();
		$this->design->data['regulations'] = $object->index();
	}
}
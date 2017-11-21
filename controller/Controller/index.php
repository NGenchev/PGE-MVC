<?php
abstract class Controller
{
	public $design;
	protected $dbh;

	function __construct()
	{
		$this->dbh = (new DBConnection())->pdo_conn();
		$this->design = new Design();

		$object = new Basic();
		$this->design->data['meta'] = $object->meta();
		$this->design->data['content'] = $object->get_content();
	}
}
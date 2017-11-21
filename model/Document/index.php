<?php

class Document
{
	public $id = null;
	public $fName;
	public $directory;
	public $added;
	public $updated;
	public $doc;
	private $dbh;

	function __construct() 
	{
		$this->dbh = (new DBConnection())->pdo_conn();
	}

	public function index()
	{
		$name = $_GET['name'];
		$name = (new Functions)->check_var($name, 1);
		$name = "../public/files/regulations/". $name .".png";
		$sql = "SELECT * FROM static_docs WHERE `doc_directory` = '$name' LIMIT 1";

		try
		{
			$search = $this->dbh->prepare($sql);
			$search->execute();
		}
		catch(PDOException $e) 
		{
			print "Проблем със свързването към sql!: " . $e->getMessage() . "<br/>".$sql;
			die();
		}

		if($search->rowCount()==1)
		{
			$doc = $search->fetchAll()[0];
			$this->id = $doc['doc_id'];
			$this->fName = $doc['doc_fName'];
			$this->directory = $doc['doc_directory'];
			$this->added = $doc['doc_added'];
			$this->updated = $doc['doc_updated'];
		}
			
		return get_object_vars($this);
	}

	// add, edit, delete
}
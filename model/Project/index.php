<?php
class Project
{
	private $dbh;
	public $type;

	function __construct() 
	{
		$this->dbh = (new DBConnection())->pdo_conn();
	}

	public function index()
	{
		$type = $_GET['type'] ?? "school";
		$type = (new Functions())->check_var($type, 1);
		
		switch($type)
		{
			case "school":
				$this->type = 1;
				break;
			case "national":
				$this->type = 2;
				break;
			case "international":
				$this->type = 3;
				break;
			default:
				$this->type = 1;
				break;
		}

		$sql = "SELECT * FROM projects WHERE project_type = ". $this->type ." ORDER BY project_duration DESC";
		$get_projects = $this->dbh->prepare($sql);
		$get_projects->execute();
		
		$getProjects = $get_projects->fetchAll();
		
		foreach($getProjects as $project)
		{
			$projects[] = array(
			"name" 		=> $project['project_name'],
			"duration" 	=> $project['project_duration'],
			"directory" => $project['project_document'],
			"type"		=> (new Functions())->get_type_from_dir($project['project_document'])
			);
		}

		return $projects;
	}
}
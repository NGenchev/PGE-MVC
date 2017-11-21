<?php
class Acception
{
	private $dbh;

	function __construct() 
	{
		$this->dbh = (new DBConnection())->pdo_conn();
	}

	public function index()
	{
		$grade = $_GET['grade'] ?? 7;
		$grade = ( (int)$grade == 7  || (int)$grade == 8 ) && is_numeric((int)$grade) ? (int)$grade : 7;
	
		$sql = "SELECT * FROM courses WHERE course_grade = ". $grade ." ORDER BY course_name ASC";
		$get_courses = $this->dbh->prepare($sql);
		$get_courses->execute();
		$bs_cl = array("primary", "warning", "danger", "success");
		
		$numbers = range(0, 3);
		shuffle($numbers);
		array_slice($numbers, 0, 4);
		$i=0;

		$acceptions = array();

		while($row = $get_courses->fetch())
		{
			$acceptions[] = array(
				"id" 	=> $row['course_id'],
				"name" 	=> $row['course_name'],
				"title" => $row['course_title'],
				"desc" 	=> implode("<br>", explode(";", $row['course_basics'])),
				"bscl"	=> $bs_cl[$numbers[$i]]
			);	

			$i++;
		}

		return $acceptions;
	}
}
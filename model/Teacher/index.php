<?php
class Teacher
{
	private $dbh;
	public $type;

	function __construct() 
	{
		$this->dbh = (new DBConnection())->pdo_conn();
	}

	public function index()
	{
		$sql = "select * from teachers order by teacher_id";
		$get = $this->dbh->prepare($sql);
		$get->execute();

		while($row = $get->fetch())
		{
			$row = (array)$row; // 11-ти 'б' клас
			extract($row);
			$grade = explode("-", $teacher_class);
            $teachers[] = array(
            	"id" => $teacher_id,
            	"name" => $teacher_name,
            	"email" => $teacher_email,
            	"grade" => $grade[0],
            	"class" => $grade[1]
            );
		}

		return $teachers;
	}
}
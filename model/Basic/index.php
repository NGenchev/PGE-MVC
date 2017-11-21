<?php

class Basic
{
	public $config;
	protected $dbh;
	public $content;
	
	function __construct()
	{
		$this->dbh = (new DBConnection())->pdo_conn();
	}

	public function get_content()
	{
		$content = array(
				"projects" 		=> $this->projects(),
				"clubs" 		=> $this->clubs(),
				"specialties" 	=> $this->specialties(),
				"poll"			=> $this->poll()
			);

		return $content;
	}

	public function meta()
	{
		$sql = "SELECT * FROM site_config";
		$row = $this->dbh->prepare($sql);
		$row->execute();
		$row = $row->fetch();
		$this->config = array(
			"title" 		=> $row['site_title'],
			"description" 	=> $row['site_description'],
			"keywords" 		=> $row['site_keywords'],
			"logo" 			=> $row['site_logo'],
			"cURL" 			=> (new Functions())->c_URL(),
			"newsLimit"		=> $row['site_newsLimit']
		);

		return $this->config;
	}

	public function poll()
	{
		$poll = array();
		$ip = (new Functions())->get_IPAddress();

		$sql = "SELECT * FROM polls WHERE poll_active = 1 LIMIT 1";
		$get_poll = $this->dbh->prepare($sql);
		$get_poll->execute();
		$row = $get_poll->fetch();

		$pID = $row['poll_id'];
		$answers = explode("@ans@", $row['poll_answers'], -1);
		$realAnsCnt = count($answers);
		$question = $row['poll_question'];

		$sql = "SELECT * FROM polls_votes WHERE vote_ip = '$ip' AND vote_pID = '$pID'";
		$check_voted = $this->dbh->prepare($sql);
		$check_voted->execute();
		$voted = $check_voted->rowCount()!=0 ? true : false;

		$poll['id']			= $pID;
		$poll['question'] 	= $question;
		$poll['voted']	  	= $voted;
		$poll['answers'] 	= $answers;

		return $poll;
	}

	public function specialties()
	{
		$specialties = array();
		$get_courses = "SELECT * FROM courses WHERE course_grade = 7 ORDER BY course_name ASC LIMIT 5";
		$get = $this->dbh->prepare($get_courses);
		$get->execute();
		while($row = $get->fetch())
		{
			$id = $row['course_id'];
			$name = $row['course_name'];
			$specialties[] = array($id, $name);
		}

		return $specialties;
	}

	public function clubs()
	{
		$clubs = array();
		$get_clubs = "SELECT * FROM clubs ORDER BY club_name ASC LIMIT 5";
		$get = $this->dbh->prepare($get_clubs);
		$get->execute();
		while($row = $get->fetch())
		{
			$id = $row['club_id'];
			$name = $row['club_name'];
			$clubs[] = array($id, $name);
		}

		return $clubs;
	}

	public function projects()
	{
		$projects = array();

		$get_projects = "SELECT * FROM projects ORDER BY project_duration DESC LIMIT 5";
		$get = $this->dbh->prepare($get_projects);
		$get->execute();
		while($row = $get->fetch())
		{
			$id = $row['project_id'];
			$name = $row['project_name'];
			$type = $row['project_type'];
			$projects[] = array($id, $name, $type);
		}

		return $projects;
	}
}
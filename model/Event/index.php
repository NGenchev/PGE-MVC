<?php
class Event
{
	private $dbh;

	function __construct()
	{
		$this->dbh = (new DBConnection())->pdo_conn();
	}

	public function index()
	{
		$events = array();

		$sql = "SELECT * FROM events WHERE event_time >= DATE_SUB(NOW(),INTERVAL 2 YEAR) ORDER BY event_time DESC LIMIT 11";
		$get_events = $this->dbh->prepare($sql);
		$get_events->execute();
		while($row = $get_events->fetch())
		{
			$desc = $row['event_description'];
			$date = (new Functions())->timeToAgo($row['event_time']);
			$events[] = array($desc, $date);
		}

		return $events;
	}

	// add, edit, delete...
}
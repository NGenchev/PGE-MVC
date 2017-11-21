<?php
require_once ("/home/elec4qif/public_html/pge_mvc/model/DBConnection/index.php");
require_once ("/home/elec4qif/public_html/pge_mvc/controller/Functions/index.php");
class Responses
{
	private $postData;

	function __construct($data)
	{
		$this->postData = $data;
	}

	public function pollVote()
	{
		extract($this->postData); //ans
		$dbh = (new DBConnection())->pdo_conn();
		
		$sql = "SELECT * FROM polls WHERE poll_active = 1 LIMIT 1";
		$getID = $dbh->prepare($sql);
		$getID->execute();
		$pollID = $getID->fetch();
		$pollID = $pollID['poll_id'];
		
		$ip = (new Functions())->get_IPAddress();
		$sql = "SELECT * FROM polls_votes WHERE vote_pID = '$pollID' AND vote_ip = '$ip'";
		$check = $dbh->prepare($sql);
		$check->execute();
		if($check->rowCount()==1)
		{
			$message = "Вече сте гласували!";
			$error = 1;
		}
		else
		{
			$sql = "INSERT INTO polls_votes (`vote_ip`, `vote_pID`, `vote_answer`) VALUES ('$ip', '$pollID', '$answer')";
			$vote = $dbh->prepare($sql);
			if($vote->execute()) 
			{
				$message = "Успешно гласувахте";
				$error = 0;
			}
			else
			{
				$message = "Проблем със сървъра! Вашият глас не е зачетен! $sql";
				$error = 2;
			}
		}
		
		$json = array(
			"message" => $message,
			"error" => $error
		);

		return $json;
	}
}

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') :
	$response = new Responses($_POST);
	$json = $response->pollVote();

	echo json_encode($json);
endif;
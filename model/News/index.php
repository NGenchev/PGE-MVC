<?php 

class News
{
	private $dbh;
	
	function __construct() 
	{
		$this->dbh = (new DBConnection())->pdo_conn();
	}

	public function get_limit_of_news()
	{
		$sql = "SELECT * FROM site_config";
		$limit = $this->dbh->prepare($sql);
		$limit->execute();
		$limit = $limit->fetch();

		return $limit['site_newsLimit'];
	}

	public function get_number_of_news()
	{
		$sql = "SELECT * FROM news";
		$count = $this->dbh->prepare($sql);
		$count->execute();

		return $count->rowCount();
	}

	public function index()
	{
		$newsArr = array();
		$newsContent = array();

		$limit = $this->get_limit_of_news();
		$number = $this->get_number_of_news();
		$page = $_GET['newsPage'] ?? 1;
		$page = (int)$page > 0 && is_numeric((int)$page) ? (int)$page : 1;
		
		$total = ceil($number/$limit);
		if($page > $total) $page = $total;

		$start = ($page * $limit) - $limit;
		$sql = "SELECT * FROM news ORDER BY news_added DESC LIMIT $start, $limit";
		//$sql = "SELECT * FROM news ORDER BY news_added DESC LIMIT 50000";
		$get_news = $this->dbh->prepare($sql);
		$get_news->execute();
		$news = $get_news->fetchAll();

		foreach($news as $new)
		{
			$newsContent[] = array(
					"title" 	=> $new['news_title'],
					"content" 	=> $new['news_content'],
					"fileName" 	=> $new['news_fileName'],
					"file" 		=> $new['news_file']
				);
		}
						
		////////////////
		// pagination //
		////////////////
		$loop = $total <= 5 ? $total : 5;	
		$html = null;

		if($page > 2)
		{
			if($page < $total) 
			{ 
				$start = $page-1;
				$stop = $page+1;
			}
			else
			{
				$start = $page-2;
				$stop  = $total;
			}
		}
		else
		{
			$start = 1;
			$stop = $total < 3 ? $total : 3;
		}


		if($page > 1)
		{
			$prev = $page - 1;
		 	$html .= "<li><a href='?newsPage=1'>&lt;&lt;</a>";
		 	$html .= "<a href='?newsPage=$prev'>&lt;</a></li>";
		}

		for($i = $start; $i<=$stop; $i++)
		{
			if($i == $page)
				$html .= "<li class='active'><a href='#'>$i <span class='sr-only'>(current)</span></a></li>";
			else
				$html .= "<li><a href='?newsPage=$i'>$i</a></li>";
		}

		if($total > $page)
		{
			$next = $page + 1;
		 	$html .= "<li><a href='?newsPage=$next'>&gt;</a>";
		 	$html .= "<a href='?newsPage=$total'>&gt;&gt;</a></li>";
		}

		$newsArr = array(
			"content"	=> $newsContent,
			"pagination"=> $html
		);

		return $newsArr;
	}
}
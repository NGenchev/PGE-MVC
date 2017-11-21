<?php
# Basic functions
class Functions
{
	/* update...
	function __construct($func = "")
	{

	}
	*/

	public function _int($num)
	{
		$num = (int)$num;

		return filter_var($num, FILTER_VALIDATE_INT) && is_int($num)===true && ($num+$num)>1 ? $num : 1;
	}

	public function c_URL() 
	{
		$this->protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === FALSE ? 'http' : 'https';
		$this->host     = $_SERVER['HTTP_HOST'];
		$this->script   = $_SERVER['SCRIPT_NAME']; 
		$this->params   = $_SERVER['QUERY_STRING'];
		$this->currentUrl = $this->protocol . '://' . $this->host . $this->script;
		if($this->params && !empty($this->params)) 
			$this->currentUrl = $this->currentURL . '?' . $this->params;
		else
			$this->currentURL .= "/";
		$this->currentUrl = str_replace('view.php?tagTitle=', 'view::', $this->currentUrl);
		return $this->currentUrl;
	}
	
	public function get_IPAddress()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP']))
			$this->ip = $_SERVER['HTTP_CLIENT_IP'];
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
			$this->ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else
			$this->ip = $_SERVER['REMOTE_ADDR'];
				
		return $this->ip;
	}
	
	public function check_var($var, $hard = 0)
	{
		$var = strip_tags($var);
		$var = htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
		$var = addslashes($var);
		$var = trim($var);
		if($hard) 
		{
			$var = preg_quote($var);
			$var = escapeshellcmd($var);
			$var = filter_var($var, FILTER_SANITIZE_STRIPPED);
		}
		$var = str_replace("'", "", $var);
		return $var;
	}
	
	public function timeToAgo($date)
	{
		if(empty($date))
			return "Невалидна дата..";
	  
		$lengths         = array("60","60","24","7","4.35","12","10");
	 
		$now             = time();
		$unix_date        = strtotime($date);
	 
		if(empty($unix_date))
			return "Невалидна дата..";
	 
		if($now > $unix_date) 
		{    
			$difference     = $now - $unix_date;
			$tense         = "преди ";
	 
		} 
		elseif($now < $unix_date)
		{
			$difference    = $unix_date - $now;
			$tense         = "след ";
		}
		else 
		{
			$difference     = $unix_date - $now;
			$tense         = "точно сега";
		}
	 
		for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++)
			$difference /= $lengths[$j];
	 
		$difference = round($difference);
		if($difference >= 2)
			$periods = array("секунди", "минути", "часа", "дена", "седмици", "месеца", "години", "века");
		else
			$periods = array("секунда", "минута", "час", "ден", "седмица", "месец", "година", "век");
	 
		return "{$tense} $difference $periods[$j]";
	}

	public function get_type_from_dir($dir)
	{
		if(substr($dir, -4)=="docx" || 
			substr($dir, -3)=="doc" || 
			 substr($dir, -3)=="xls" || 
			 substr($dir, -4)=="xlsx" || 

			 substr($dir, -3)=="pdf")
				return "document";
		elseif(substr($dir, -3)=="jpg" ||
			substr($dir, -3)=="png" ||
			 substr($dir, -3)=="gif" ||
			  substr($dir, -3)=="bmp" ||
			   substr($dir, -4)=="jpeg")
				return "image";
		else
			return 0;
	}
}
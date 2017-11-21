<?php
class Design
{
	public $template = "index";
	public $data;

	public function display()
	{
		if(file_exists('public/templates/'.$this->template.'.tpl.php'))
		{
			ob_start();
			include 'public/templates/begin.tpl.php';
			include 'public/templates/'.$this->template.'.tpl.php';
			include 'public/templates/ending.tpl.php';
			$content = ob_get_clean();

			echo $this->htmlMinify($content);
		}
		else 
			include 'public/errorPage.tpl.php';
	}

	public function htmlMinify($buffer) 
	{
	    $search = array(
	        '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
	        '/[^\S ]+\</s',     // strip whitespaces before tags, except space
	        '/(\s)+/s',         // shorten multiple whitespace sequences
	        '/<!--(.|\s)*?-->/', // Remove HTML comments
	        '/> +</',
	        '/ {2,}/',
		    '/<!--.*?-->|\t|(?:\r?\n[ \t]*)+/s'
	    );

	    $replace = array(
	        '>',
	        '<',
	        '\\1',
	        '',
	        '><',
	         ' ',
		     ''
	    );

	    $buffer = preg_replace($search, $replace, $buffer);

	    return $buffer;
	}
}
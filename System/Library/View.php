<?php
	
/**
* 
*/
class View
{
	
	function __construct()
	{
		echo 'this is the view<br/>';
	}

	public function render($name = false)
	{
		if($name != false) {
			$file = SYS_PATH.'View/'.$name.'.php';
			if(file_exists($file)) {
				require $file;
				return true;
			} else {
				$file = APP_PATH.'View/'.$name.'.php';
				if(file_exists($file)) {
					require $file;
					return true;
				} else
					return false;
			}
		} else
			return false;
	}
}
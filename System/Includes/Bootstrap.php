<?php

/**
* File loader
*/
class Bootrstrap extends Sakura
{

	public $ERORS;
	private $err_file;

	function __construct()
	{
		$this->err_file = SYS_PATH . '/Controller/Error.php';
	}

	public function error()
	{
		require_once $this->err_file;
		$err = new Error();
	}

	function autoload()
	{
		$autoload = self::$settings['autoload'];
		
		foreach($autoload as $key => $value) {
			foreach($value as $k => $library) {
				$file = $key . '/'.$library.'.php';
				
				if(file_exists(SYS_PATH.$file)) {
					require_once SYS_PATH.$file;
				} else if(file_exists(APP_PATH.$file)) {
					require_once APP_PATH .$file;
				} else {
					echo 'The follow '.$key.' <strong>'.$library.'</strong> cant be found';
				}
			}
		}
	}

	function loadController()
	{
		$url = self::$uri;

		if($url[0] != null OR $url[0] != false) {

			$file = APP_PATH . '/Controller/' . $url[0] .'.php';

			if(file_exists($file)) {
				require_once $file;
			} else {
				$file = SYS_PATH . '/Controller/' . $url[0] .'.php';
				if(file_exists($file))
					require_once $file;
				else {
					$this->error();
					return false;
				}
			}
		} else {
			require_once SYS_PATH . '/Controller/Error.php';
			$err = new Error();
			return false;
		}

		$controller = new $url[0];

		if(isset($url[2])) {
			call_user_func_array(array($controller, $url[1]), array_slice($url, 2));
		} else {
			if(isset($url[1])) {
				$controller->{$url[1]}('test');
			} else {
				$controller->index();
			}
		}
	}
}

$boot = new Bootrstrap();
$boot->autoload();
$boot->loadController();
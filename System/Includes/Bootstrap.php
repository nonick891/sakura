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
					echo 'The follow <i>'.$key.'</i> <strong>'.$library.'</strong> cant be found.<br/>';
				}
			}
		}
	}

	function loadController()
	{
		$url = self::$uri;

		if($url[0] == false OR $url[0] == null OR $url[0] == '') {
			$controller = self::$settings['config']['default_controller'];
		} else {
			$controller = $url[0];
		}

		$file = APP_PATH . 'Controller/' . $controller .'.php';

		if(file_exists($file)) {
			require_once $file;
		} else {
			$file = SYS_PATH . 'Controller/' . $controller .'.php';
			
			if(file_exists($file))
				require_once $file;
			else {
				$this->error();
				return false;
			}
		}

		$controller = new $controller;

		if(isset($url[2])) {
			if(method_exists($controller, $url[1]))
				call_user_func_array(array($controller, $url[1]), array_slice($url, 2));
			else
				$this->error();
		} else {
			if(isset($url[1])) {
				if(method_exists($controller, $url[1]))
					call_user_func(array($controller, $url[1]));
				else
					$this->error();
			} else if(method_exists($controller, 'index'))
				call_user_func(array($controller, 'index'));
		}
	}
}

$boot = new Bootrstrap();
$boot->autoload();
$boot->loadController();
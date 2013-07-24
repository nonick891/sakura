<?php

/**
* 
*/
class Sakura
{
	
	public static $singleton;

	public static $objects = array();

	public static $settings = array('config' => array(), 'autoload' => array());

	public static $uri = array();

	public static function Start($config, $autoload)
	{
		if(is_null(self::$singleton)) {
			self::$singleton = new Sakura();
			self::$settings = array(
					'config' => $config,
					'autoload' => $autoload
			);
			echo 'Sakura is started <br>';
			require_once 'Bootstrap.php';
		}

		return self::$singleton;
	}

	private function __construct()
	{
		self::$uri = explode('/', rtrim($_GET['url'], '/'));
	}
}
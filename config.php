<?php

	/**
	 * Constants, don't remove
	 * if you not change system
	 * paths
	 **/
	define('BASE_PATH', realpath(''));
	define('SYS_PATH', BASE_PATH . '/System/');
	define('APP_PATH', BASE_PATH . '/Application/');
	define('INC_PATH', SYS_PATH . 'Includes/');

	/**
	 * Autoloaded classes or lybraries
	 **/
	$autoload['Library'] = array('S_Controller', 'Database', 'Mylibrary');

	/**
	 * Custumized configuration
	 **/
	$config = array();
	$config['test'] = 'test';
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
	$autoload['Library'] = array('View', 'S_Controller', 'Database', 'Mylibrary', 'S_Model');
	$autoload['Model'] = array('help_model');

	/**
	 * Default controller
	 **/
	$config = array();
	$config['default_controller'] = 'welcome';

	/**
	 * Default url
	 **/
	$config['url'] = 'http://sakura.loc/';

	/**
	 * 
	 */
	$config['database']['dbtype']	= 'mysql';
	$config['database']['dbhost']	= 'localhost';
	$config['database']['dbname']	= '';
	$config['database']['dbuser']	= 'root';
	$config['database']['dbpass']	= '';
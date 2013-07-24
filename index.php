<?php
	
	$sakura=dirname(__FILE__).'/System/Includes/sakura.php';
	require_once $sakura;
	require_once 'config.php';

	Sakura::Start($config, $autoload);
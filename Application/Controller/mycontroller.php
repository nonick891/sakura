<?php

/**
* 
*/
class MyController extends S_Controller
{
	
	function __construct()
	{
		parent::__construct();
		echo 'mycontroller <br/>';
	}

	function index()
	{
		echo 'index </br>';
	}

	function test()
	{
		echo 'this is test';
	}
}
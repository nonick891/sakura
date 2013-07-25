<?php

/**
* 
*/
class Welcome extends S_Controller
{
	
	function __construct()
	{
		parent::__construct();
		echo 'Welcome controller <br/>';
	}

	function index()
	{
		echo 'this is an index method<br/>';
		$this->view->render('welcome/index');
	}
}
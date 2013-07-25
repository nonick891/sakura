<?php

/**
* Error class
*/
class Error extends S_Controller
{
	
	function __construct()
	{
		parent::__construct();
		echo 'Error here';

		$this->view->msg = 'This page dosnt existst.';
		$this->view->render('Errors/Error');
	}
}
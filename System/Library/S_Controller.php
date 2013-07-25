<?php

/**
* 
*/
class S_Controller
{
	public $view;
	
	function __construct()
	{
		echo 'this is the main controller<br/>';
		$this->view = new View();
	}
}
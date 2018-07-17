<?php

namespace App\Controller;
use Config\TplEngine\Template;

class Home {
	
	public function index () {
		$view = new Template('home/home.php');
		$view->name = 'name';
		return $view->render();
	}
}
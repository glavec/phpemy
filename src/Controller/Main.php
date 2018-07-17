<?php

namespace App\Controller;

use Config\TplEngine\Template;

class Main {
	
	public function index () {
		$view = new Template('main/main.php');
		$view->name = 'name';
		return $view->render();
	}
}
<?php

namespace App\Resources\Config;

class Routes {
	
	public function get() {
	
		return array (
			'main' => array(
				'name' => 'main',
				'pattern' => '/main',
				'class' => 'Main',
				'method' => 'index'
			),
			'/' => array(
				'name' => 'home',
				'pattern' => '/',
				'class' => 'Home',
				'method' => 'index'
			)
		);
	}
	
}
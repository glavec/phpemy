<?php

namespace Config;

class Config {
	
	public function getConfig() {
		return array(
			'serverPath' => 'phpemy',
			'viewPath' => 'src/Resources/views/',
			'assetsPath' => 'public/',
			'appPath' => '/var/www/html/phpemy/',
			'db' => array(
				'mysql' => array(
					'db' => 'oneup',
					'username' => 'root',
					'password' => null,
				)
			)
		);
	}
}
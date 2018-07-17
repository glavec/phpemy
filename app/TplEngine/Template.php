<?php
namespace Config\TplEngine;

use Config\Config;

class Template {
	private $file;
	private $vars = array();
	
	public function __construct($file) {
		$this->file = $file;
	}
	
	public function __set($key, $val) {
		$this->vars[$key] = $val;
	}
	
	public function __get($key) {
		return (isset($this->vars[$key])) ? $this->vars[$key] : null;
	}
	
	public function render() {
		$config = new Config();
		$config = $config ->getConfig();
		//start output buffering (so we can return the content)
		ob_start();
		//bring all variables into "local" variables using "variable variable names"
		foreach($this->vars as $k => $v) {
			$$k = $v;
		}
		//include view
		include ($config['appPath'].$config['viewPath'].$this->file );
		
		$str = ob_get_contents();//get teh entire view.
		ob_end_clean();//stop output buffering
		echo $str;
		return $str;
	}
}
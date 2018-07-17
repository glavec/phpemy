<?php
namespace Config\Routing;

class Router
{
	public $routes;
	
	public function __construct(array $routes)
	{
		$this->routes = $routes;
	}
	
	/**
	 * @param $app_path
	 * @return mixed
	 * @throws \Exception
	 */
	public function resolve($app_path)
	{
		
		$matched = false;
		foreach($this->routes as $route) {
			
			if($app_path === $route->pattern) {
				$matched = true;
				break;
			}
		}
		
		if(! $matched) throw new \Exception('Could not match route.');
		
		$param_str = str_replace($route->pattern, '', $app_path);
		$params = explode('/', trim($param_str, '/'));
		$params = array_filter($params);
		
		$match = clone($route);
		$match->params = $params;
		
		return $match;
	}
}
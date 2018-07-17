<?php
use App\Resources\Config\Routes;
use Config\Routing\Route;
use Config\Routing\Router;
use Config\Config;

require_once './vendor/autoload.php';

$routes = new Routes();
$routes = $routes->get();
$config = new Config();

$config = $config ->getConfig();

$url_parsed = parse_url($_SERVER["REQUEST_URI"]);
$url = '';

$url = str_replace('/'.$config['serverPath'],'',$url_parsed['path']);
$route_found = false;
foreach ($routes as $path => $params) {
    $route = new Route();

	$route->name    = $params['name'];
	$route->pattern = $params['pattern'];
	$route->class   = '\App\Controller\\'.$params['class'];
	$route->method  = $params['method'];

	$router = new Router(array($route));

	try {
		$match = $router->resolve($url);
		if($match) {
			$route_found = true;
			call_user_func_array(array(new $match->class, $match->method), $match->params);
		}
	  } catch (Exception $e) {
	}
	
	if ($route_found) {
		break;
	}
}



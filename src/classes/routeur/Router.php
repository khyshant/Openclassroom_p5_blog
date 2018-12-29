<?php

namespace App\classes\routeur;

/**
 * Class Router
 * @package App\classes\routeur
 */
class Router{
    /**
     * @var
     */
    private $url;
    /**
     * @var array
     */
    private $routes = array();
    /**
     * @var array
     */
    private $namedRoutes = array();

    /**
     * Router constructor.
     * @param $url
     */
    public function __construct($url){
        $this->url = $url;
    }

    /**
     * @param $path
     * @param $callable
     * @param null $name
     * @return Route
     */
    public function get($path, $callable, $name = null){
        return $this->add($path, $callable, 'GET', $name);
    }

    /**
     * @param $path
     * @param $callable
     * @param null $name
     * @return Route
     */
    public function post($path, $callable, $name = null){
        return $this->add($path, $callable, 'POST', $name);
    }

    /**
     * @param $path
     * @param $callable
     * @param null $name
     * @param $method
     * @return Route
     */
    private function add($path, $callable, $method, $name = null){
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;
        if(is_string($callable) && $name === null){
            $name = $callable;
        }
        if($name){
            $this->namedRoutes[$name] = $route;
        }
        return $route;
    }

    /**
     * @return mixed
     */
    public function run()
    {
        if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            RouterException::requestMethod();
        }
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->match($this->url)) {
                return $route->call();
            }
        }
        RouterException::routeMatches();
    }

    /**
     * @param $name
     * @param array $params
     * @return mixed
     */
    public function url($name, $params = [])
    {
        if (!isset($this->namedRoutes[$name])) {
            RouterException::
            routeMatchesNames();
        }
        return $this->namedRoutes[$name]->getUrl($params);
    }
}

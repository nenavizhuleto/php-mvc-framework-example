<?php

class Router {

    private string $root_route;

    public function __construct(string $root_route='')
    {
        $this->root_route = $root_route;
    }

    public function get(string $route, callable $callback) {
        if ($route == $this->root_route) {
            $callback();
        }
        if (isset($_GET[$route])) {
            $callback($_GET[$route]);
        }
    }

    public function nget(string $route, callable $callback) {
        if ($route == $this->root_route) {
            $callback();
        }
        if (!isset($_GET[$route])) {
            $callback($_GET[$route]);
        }
    }



    public function post(string $route, callable $callback) {
        
    }

    public function update(string $route, callable $callback) {
        
    }

    public function delete(string $route, callable $callback) {
        
    }

}


?>
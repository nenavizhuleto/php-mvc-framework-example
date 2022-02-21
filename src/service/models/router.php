<?php

class Router {

    private string $root_route;

    public function __construct(string $root_route)
    {
        $this->root_route = $root_route;
    }

    public function get(string $route, callable $callback) {
        if ($route == $this->root_route) {
            $route = '';
        }
        if (isset($_GET[$this->root_route.$route])) {
            $callback();
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
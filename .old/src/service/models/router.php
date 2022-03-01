<?php

class Router {

    private string $root_route;

    public function __construct(string $root_route='')
    {
        $this->root_route = $root_route;
    }

    public function get(string $route, callable $action, callable $else=null) {
        if ($route == $this->root_route) {
            $action();
        }
        if (isset($_GET[$route])) {
            $action($_GET[$route]);
        }
        if ($else && $_SERVER['REQUEST_URI'] == $this->root_route) {
            $else();
        }
    }

    public function not(string $route, callable $callback) {

    }

    public function post(string $route, callable $callback) {
        
    }

    public function update(string $route, callable $callback) {
        
    }

    public function delete(string $route, callable $callback) {
        
    }

}


?>
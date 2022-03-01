<?php

class PageAction {


    public static $ACTION_HEADER = 'PageAction::HEADER';
    public static $ACTION_HERO = 'PageAction::HERO';
    public static $ACTION_HOME = 'PageAction::HOME';
    public static $ACTION_SWITCHPAGE = 'PageAction::SWITCHPAGE';

    public static function HEADER($val=null) {
        include_component('header');
        include_component('nav');
    }

    public static function HERO($val=null) {
        if (($val == 'login' or $val == 'about' or $val == 'contact') or $GLOBALS['router']->get('post', function() { return true; }) ) {
            return '';
        }
        else {
            include_component('hero');
        }
    }

    public static function HOME($val=null) {
        include_page('home');
        include_component('sidebar');
    }

    public static function PAGE(string $page_name, bool $sidebar) {
        include_page($page_name);
        if ($sidebar) include_component('sidebar');
    }

    public static function SWITCHPAGE($page=null) {
        switch($page) {
            case 'home': 
                self::PAGE('home', true);
                break;
            case 'gallery': 
                self::PAGE('gallery', true);
                break;
            case 'about': 
                self::PAGE('about', false); 
                break;
            case 'contact': 
                self::PAGE('contact', false); 
                break;
            case 'login': 
                self::PAGE('login', false);  
                break;
            case 'cp': 
                self::PAGE('control_panel', false);  
                break;
            default: 
                self::PAGE('home', true);
                break;
        } 
    }
}


?>
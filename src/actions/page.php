<?php

class PageAction {


    public static $ACTION_HEADER = 'PageAction::HEADER';
    public static $ACTION_HERO = 'PageAction::HERO';
    public static $ACTION_HOME = 'PageAction::HOME';
    public static $ACTION_PAGE = 'PageAction::PAGE';
    public static $ACTION_LOGOUT = 'PageAction::LOGOUT';

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

    public static function PAGE($val=null) {
        switch($val) {
            case 'home': 
                include_page('home');
                include_component('sidebar');
                break;
            case 'gallery': 
                include_page('gallery'); 
                include_component('sidebar');
                break;
            case 'about': include_page('about'); break;
            case 'contact': include_page('contact'); break;
            case 'login': include_page('login'); break;
            case 'cp': include_page('control_panel'); break;
            default: 
                include_page('home');
                include_component('sidebar');
                break;
        } 
    }


    

    public static function LOGOUT($val=null) {
        Auth::destroy();
        header("Location: /");
        exit();
    }
}


?>
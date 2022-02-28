<?php

class AdminAction {

    public static $ACTION_POST = "AdminAction::POST";

    public static function POST($val=null) {
        switch($val) {
            case 'create-post':
                include_component('create_form');
                break;
        }

    }

}

?>
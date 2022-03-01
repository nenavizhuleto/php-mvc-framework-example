<?php

class AdminAction {

    public static $ACTION_POST = "AdminAction::POST";

    public static function POST($val=null) {
        switch($val) {
            case 'create-post':
                include_component('create_form');
                break;
            case 'edit-post':
                include_component('edit_form');
                break;
            case 'delete-post':
                // include_component('delete_f')
                break;
        }

    }

}

?>
<?php

require_once("./src/service/models/user.php");


function get_users($filter=null) {
    try {
        $users = User::find($filter);
        return $users;
    } catch (PDOException $e) {
        die($e->getMessage());
    }   
}

?>
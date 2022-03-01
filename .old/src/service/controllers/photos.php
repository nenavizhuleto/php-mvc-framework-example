<?php

require_once("./src/service/models/photo.php");

function get_photos($filter=null) {
    try {
        $photos = Photo::find($filter);
        return $photos;
    } catch (PDOException $e) {
        die($e->getMessage());
    }   
}

?>
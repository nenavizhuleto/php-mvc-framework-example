<?php

require_once("./src/service/models/router.php");
require_once("./src/service/controllers/photos.php");


$photo_router = new Router('photo');

$photo_router->get('/', $get_photos)


?>
<?php

// Utils

require_once('./src/globals.php');
require_once('./src/components.php');
require_once('./src/pages.php');

// Service and Auth

require_once('./src/service/service.php');
require_once('./src/service/auth.php');

// Models

require_once('./src/service/models/photo.php');
require_once('./src/service/models/router.php');
require_once('./src/service/models/service.php');
require_once('./src/service/models/user.php');

// Controllers

require_once('./src/service/controllers/photos.php');
require_once('./src/service/controllers/users.php');


?>
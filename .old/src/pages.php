<?php

require_once 'globals.php';

function get_page_path($page_name) {
    return $GLOBALS['pages_path'].$page_name.".php";
}

function include_page($name) {
    $path = get_page_path($name);
    if (file_exists($path)) {
        include $path;
    }

    return;
}


?>
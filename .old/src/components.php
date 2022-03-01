<?php

require_once 'globals.php';

function get_component_path($component_name) {
    return $GLOBALS['comp_path'].$component_name.".php";
}

function include_component($name) {
    $path = get_component_path($name);
    if (file_exists($path)) {
        include $path;
    }

    return;
}


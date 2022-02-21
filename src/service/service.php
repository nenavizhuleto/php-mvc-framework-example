<?php

require_once('./src/service/models/service.php');

$host = 'localhost';
$dbname = 'photogallery';
$user = 'root';
$pass = '';
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

$service = new Service($host, $dbname, $user, $pass, $opt);

if(!isset($GLOBALS['service'])) {
    $GLOBALS['service'] = $service;
}

?>
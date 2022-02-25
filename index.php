<?php

require_once('./src/bundle.php');
session_start();

if(!isset($GLOBALS['router'])) {
    $GLOBALS['router'] = new Router('/');
}

$GLOBALS['router']->get('logout', PageAction::$ACTION_LOGOUT);



?>


<!DOCTYPE html>
<html lang="en">
	<head>
        <link rel="stylesheet" href="./src/styles/main.css">
		<title>Photogallery</title>
	</head>
	<body>
        <header>
            <?php $GLOBALS['router']->get('/', PageAction::$ACTION_HEADER); ?>
        </header>
        <main>
            <?php $GLOBALS['router']->get('page', PageAction::$ACTION_HERO); ?>
            <?php // $GLOBALS['router']->get('/', PageAction::$ACTION_HERO); ?>
            <div class="page">
                <div class="page__content">
                    <?php $GLOBALS['router']->get('page', PageAction::$ACTION_PAGE); ?>
                    <?php // $GLOBALS['router']->get('/', PageAction::$ACTION_HOME); ?>
                </div>
            </div>
        </main>
        <footer>
            <?= include_component('footer') ?>
        </footer>
        <script src="./src/scripts/script.js"></script>
    </body>
</html>

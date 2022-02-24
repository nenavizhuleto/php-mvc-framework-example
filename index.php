<?php

require_once('./src/bundle.php');
session_start();

if(isset($_GET['logout'])) {
    Auth::destroy();
    header("Location: /");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
        <link rel="stylesheet" href="./src/styles/main.css">
		<title>Photogallery</title>
	</head>
	<body>
        <header>
            <?= include_component('header')?>
            <nav>
                <?= include_component('nav') ?>
            </nav>
        </header>
        <main>
            <?php if (($_GET['page'] != 'login' and $_GET['page'] != 'about' and $_GET['page'] != 'contact') and !isset($_GET['post'])):  ?>
            <div class="hero">
                <div id="btnLeft" class="arrow"></div>
                    <?= include_component('hero') ?>
                <div id="btnRight" class="arrow"></div>
            </div>
            <?php endif; ?>
            <div class="page">
                <div class="page__content">
                    <?php if (!isset($_GET['post'])): ?>
                        <?php if (isset($_GET['page'])): ?>
                            <?php 
                                switch($_GET['page']) {
                                    case 'home': include_page('home'); break;
                                    case 'gallery': include_page('gallery'); break;
                                    case 'about': include_page('about'); break;
                                    case 'contact': include_page('contact'); break;
                                    case 'login': include_page('login'); break;
                                    default: include_page('home'); break;
                                } 
                            ?>
                        <?php else: ?>
                            <?php include_page('home'); ?>
                        <?php endif; ?>
                        <?php
                        
                        if(isset($_GET['page'])) {
                            switch($_GET['page']) {
                                case 'home': include_component('sidebar'); break;
                                case 'gallery': include_component('sidebar'); break;
                            }
                        } else {
                            include_component('sidebar');
                        }

                        ?>
                    <?php else: ?>
                        <?php include_page('post') ?>
                    <?php endif; ?>
                </div>
            </div>
        </main>
        <footer>
            <?= include_component('footer') ?>
        </footer>
    </body>
</html>

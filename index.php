<?php

require_once('./src/bundle.php');

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
            <div class="hero">
                <div id="btnLeft" class="arrow"></div>
                    <?= include_component('hero') ?>
                <div id="btnRight" class="arrow"></div>
            </div>
            <div class="page">
                <div class="page__content">
                    <?php if (isset($_GET['page'])): ?>
                        <?php 
                            switch($_GET['page']) {
                                case 'home': include_page('home'); break;
                                case 'gallery': include_page('gallery'); break;
                                case 'about': include_page('about'); break;
                                case 'contact': include_page('contact'); break;
                                default: include_page('home'); break;
                            } 
                        ?>
                    <?php else: ?>
                        <?php include_page('home'); ?>
                    <?php endif; ?>
                </div>
                <?php
                    
                if(isset($_GET['page'])) {
                    switch($_GET['page']) {
                        case 'home': include_component('sidebar'); break;
                        case 'about': include_component('sidebar'); break;
                    }
                } else {
                    include_component('sidebar');
                }

                ?>
            </div>
        </main>
    </body>
</html>

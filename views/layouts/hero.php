<?php 
use ihate\mvc\Application;

$photos = $this->photos;
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?= $this->title; ?></title>
        <link rel="stylesheet" href="http://photogallery/stylesheets/main.css">
	</head>
	<body>
        <header class="header">
            <div class="header__content">
                <div class="header__logo">
                    <img src="/images/camera.png">
                    <h1><a href="/">Photogallery</a></h1>
                </div>
                <nav class="nav">
                    <div class="nav__content">
                        <ul class="nav__list">
                            <li class="nav__item"><a href="/home" class="nav__link">Home</a></li>
                            <li class="nav__item"><a href="/gallery" class="nav__link">Gallery</a></li>
                            <li class="nav__item"><a href="/about" class="nav__link">About</a></li>
                            <li class="nav__item"><a href="/contact" class="nav__link">Contact</a></li>
                            <?php if(Application::isGuest()): ?>
                            <li class="nav__item"><a href="/login" class="nav__link">Login</a></li>
                            <?php else: ?>
                            <li class="nav__item"><a href="/profile" class="nav__link">Profile</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <main>
            <div class="hero">
                <div class="hero__content">
                    <?php foreach ($photos as $photo): ?>
                        <a href="/post/<?= $photo['id'] ?>" class="hero-post">
                            <div class="hero-post__content">
                                <p class="hero-post__title"><?= $photo['title'] ?></p>
                                <img src="<?= $photo['img'] ?>" alt="" class="hero-post__img">
                                <div class="hero-post__description">
                                    <div class="description__text">
                                    <?= $photo['description'] ?>
                                    </div>
                                </div>
                                <div class="hero-post__date">
                                    <span class="date__text">
                                    <?= $photo['date'] ?>
                                    </span>    
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="page">
                <div class="page__content">
                    <?php if (Application::$app->session->getFlash('success')): ?>
                        <div class="alert alert--success">
                            <?php echo Application::$app->session->getFlash('success') ?>
                        </div>
                    <?php endif; ?>
                    {{content}}
                </div>
            </div>
        </main>
        <footer class="footer">
            <div class="footer__content">
                <div class="footer__logo">
                    <img src="/images/camera.png">
                    <h2><a href="/">Photogallery</a></h2>
                </div>
            </div>
        </footer>
    </body>
</html>
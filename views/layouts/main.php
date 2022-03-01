<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Photogallery</title>
        <link rel="stylesheet" href="stylesheets/main.css">
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
                            <li class="nav__item"><a href="/login" class="nav__link">Login</a></li>
                            <li class="nav__item" id="menu">
                                <a class="nav__link"></a>
                                <div class="nav__menu" id="menu_block">
                                    <ul>
                                        <li><a href="?admin=create-post" class="nav__link">New post</a></li>
                                        <li><a href="?logout" class="nav__link">Log out</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <main>
            <div class="page">
                <div class="page__content">
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
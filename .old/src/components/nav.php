<nav>
    <div class="nav__content">
        <ul class="nav__list">
            <li class="nav__item"><a href="?page=home" class="nav__link">Home</a></li>
            <li class="nav__item"><a href="?page=gallery" class="nav__link">Gallery</a></li>
            <li class="nav__item"><a href="?page=about" class="nav__link">About</a></li>
            <li class="nav__item"><a href="?page=contact" class="nav__link">Contact</a></li>
            <?php if(!Auth::isset()): ?>
                <li class="nav__item"><a href="?page=login" class="nav__link">Login</a></li>
            <?php else: ?>
                <li class="nav__item" id="menu">
                    <a class="nav__link">
                        <?= Auth::read()->name; ?>
                    </a>
                    <div class="nav__menu" id="menu_block">
                        <ul>
                            <li><a href="?admin=create-post" class="nav__link">New post</a></li>
                            <li><a href="?logout" class="nav__link">Log out</a></li>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
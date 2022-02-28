<?php

if (Auth::isset()) {
    header("Location: /");
    exit();
}

$action = $_SERVER['REQUEST_URI']."&auth";
$GLOBALS['router']->get('auth', AuthAction::$ACTION_LOGIN);
?>


<div class="login">
    <div class="login__content">
        <h2>Login form</h2>
        <form action="<?= $action ?>" method="POST" class="login__form">
            <?php $GLOBALS['router']->get('error', AuthAction::$ACTION_LOGINFAILED); ?>
            <input 
                class="login__input" 
                type="text" 
                name="username" 
                autocomplete="off" 
                placeholder="username">
            <input 
                class="login__input" 
                type="password" 
                name="password" 
                autocomplete="off"
                placeholder="password">
            <input class="login__submit" type="submit" value="Sign in">
        </form>
    </div>
</div>
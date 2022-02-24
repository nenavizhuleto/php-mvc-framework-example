<?php

if (Auth::isset()) {
    header("Location: /");
    exit();
}

$action = $_SERVER['REQUEST_URI']."&auth";


if (isset($_GET['auth'])) {
    $login = $_POST['username'];
    $password = $_POST['password'];

    $user = get_users(function ($u) use($login, $password) {
        return $u->login == $login and $u->password == hash($GLOBALS['hash_algo'], $password);
    })[0];
    
    if ($user) {
        Auth::save($user);
        header("Location: . ");

        exit();
    }

    header("Location: ?page=login&error");

    exit();

}




?>


<div class="login">
    <div class="login__content">
        <h2>Login form</h2>
        <form action="<?= $action ?>" method="POST" class="login__form">
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
<?php

require_once('./src/service/models/user.php');

class Auth {

    private static User $user;

    public static final function save(User $user) {
        session_start();
        self::$user = $user;

        $_SESSION['auth'] = self::$user;
    }

    public static final function read() {
        session_start();
        $user = $_SESSION['auth'];
        return $user;
    }

    public static final function isset() {
        return isset($_SESSION['auth']);
    }

    public static final function destroy() {
        session_start();
        $_SESSION['auth'] = [];
        session_destroy();
    }

}

?>

<?php


class AuthAction {

    public static $ACTION_LOGIN = "AuthAction::LOGIN";
    public static $ACTION_LOGINFAILED = "AuthAction::LOGINFAILED";
    public static $ACTION_LOGOUT = "AuthAction::LOGOUT";

    public static function LOGIN($val=null) {
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

    public static function LOGINFAILED($val=null) {
        echo '<span class="error__msg">Login or password is incorrect</span>';
    }

    public static function LOGOUT($val=null) {
        Auth::destroy();
        header("Location: /");
        exit();
    }
}

?>
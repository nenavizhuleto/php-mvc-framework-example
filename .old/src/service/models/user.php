<?php

require_once('./src/service/service.php');

class User {

    public function __construct($id, $name, $login, $password, $type_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        $this->type_id = $type_id;
    }

    public final static function find(callable $filter=null) {
        $result = [];

        $result = $GLOBALS['service']->fetch_all('users', function ($row) {
            return new User($row['user_id'], $row['user_name'], $row['user_login'], $row['user_password'], $row['user_type_id']);
        });

        if ($filter != null) {
            $result = array_filter($result, $filter);
        }

        return array_values($result);
    }

}

?>
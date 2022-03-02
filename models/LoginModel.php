<?php

namespace app\models;

use app\core\Model;
use app\core\validation\Required;

class LoginModel extends Model {

    public string $username = '';
    public string $password = '';


    public function rules(): array {
        return [
            'username' => [Required::class],
            'password' => [Required::class]
        ];
    }

    public function login() {
        return "Creating New User";
    }

}
<?php

namespace app\models;

use app\core\DbModel;
use app\core\validation\Correspond;
use app\core\validation\Required;
use app\core\validation\Email;
use app\core\validation\Min;
use app\core\validation\Max;

class User extends DbModel {
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $password = '';
    public string $passwordConfirm = '';
    public int $type_id = 0;

    public function tableName(): string {
        return 'users';
    }

    public function attributes(): array
    {
        return ['firstname', 'lastname', 'email', 'password', 'type_id'];
    }

    public function rules(): array {
        return [
            'firstname' => [Required::class],
            'lastname' => [Required::class],
            'email' => [Required::class, Email::class],
            'password' => [Required::class, [Min::class, 8], [Max::class, 24]],
            'passwordConfirm' => [Required::class, [Correspond::class, ['password', 'password']]],
        ];
    }

    public function register() {
        return $this->save();
    }


}

?>
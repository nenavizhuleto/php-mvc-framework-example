<?php

namespace app\models;

use ihate\mvc\UserModel;
use ihate\mvc\validation\Correspond;
use ihate\mvc\validation\Required;
use ihate\mvc\validation\Email;
use ihate\mvc\validation\Min;
use ihate\mvc\validation\Max;
use ihate\mvc\validation\Unique;


class User extends UserModel {

    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $password = '';
    public string $passwordConfirm = '';
    public int $type_id = 0;

    public static function tableName(): string {
        return 'users';
    }

    public function attributes(): array
    {
        return ['firstname', 'lastname', 'email', 'password', 'type_id'];
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function getDisplayName(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function getDisplayType() {
        if ($this->type_id == 0) {
            return 'User';
        } else {
            return 'Admin';
        }
    }

    public function isAdmin() {
        return $this->type_id == 1;
    }

    public function labels(): array
    {
        return [
            'firstname' => 'First name',
            'lastname' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'passwordConfirm' => 'Confirm password'
        ];
    }


    public function rules(): array {
        return [
            'firstname' => [Required::class],
            'lastname' => [Required::class],
            'email' => [Required::class, Email::class, [Unique::class, 'unique' => 'email', 'class' => self::class]],
            'password' => [Required::class, [Min::class, 'min' => 8], [Max::class, 'max' => 24]],
            'passwordConfirm' => [Required::class, [Correspond::class, 'match' => 'password', 'value' => 'password']],
        ];
    }

    public function save() {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }


}

?>
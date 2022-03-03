<?php

namespace app\models;

use app\core\UserModel;
use app\core\validation\Correspond;
use app\core\validation\Required;
use app\core\validation\Email;
use app\core\validation\Min;
use app\core\validation\Max;
use app\core\validation\Unique;

class User extends UserModel {

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public int $status = self::STATUS_INACTIVE;
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
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }


}

?>
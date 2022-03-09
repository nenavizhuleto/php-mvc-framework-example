<?php

namespace app\models;

use ihate\mvc\db\DbModel;


class Author extends DbModel {

    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';

    public static function tableName(): string {
        return 'users';
    }

    public function attributes(): array
    {
        return ['firstname', 'lastname', 'email'];
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
            'email' => 'Email'
        ];
    }


    public function rules(): array {
        return [];
    }

    public function save() {
        return parent::save();
    }


}

?>
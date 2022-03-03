<?php

namespace app\models;

use app\core\Model;
use app\core\validation\Email;
use app\core\validation\Required;

class ContactModel extends Model {

    public string $subject = '';
    public string $email = '';
    public string $body = '';

    public function rules(): array {
        return [
            'subject' => [Required::class],
            'email' => [Required::class, Email::class],
            'body' => [Required::class]
        ];
    }

    public function labels(): array
    {
        return [
            'subject' => 'Subject',
            'email' => 'Email',
            'body' => 'Message'
        ];
    }

    public function send() {

    }

}
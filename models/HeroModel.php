<?php

namespace app\models;

use ihate\mvc\Model;

class HeroModel extends Model {

    public array $photos = [];

    public function __construct()
    {
        $this->photos = Photo::find();
    }

    public function rules(): array
    {
        return [];
    }

}
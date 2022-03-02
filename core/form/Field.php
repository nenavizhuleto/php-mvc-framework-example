<?php

namespace app\core\form;

use app\core\Model;

class Field {

    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_NUMBER = 'number';

    public string $type;
    public Model $model;
    public string $attribute;

    public function __construct($model, $attribute) {
        $this->model = $model;
        $this->attribute = $attribute;
        $this->type = self::TYPE_TEXT;
    }

    public function __toString() {
        return sprintf('
        <div class="form__group">
            <input 
                class="form__input %s" 
                type="%s" 
                name="%s"
                value="%s"
                autocomplete="off" 
                placeholder="%s">
            <div class="form__invalid-feedback">%s</div>
        </div>
        ', 
        $this->model->hasError($this->attribute) ? 'form__input--is-invalid' : '', 
        $this->type,
        $this->attribute, 
        $this->model->{$this->attribute},
        $this->attribute, 
        $this->model->getFirstError($this->attribute));
    }

    public function password() {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

}
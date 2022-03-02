<?php

namespace app\core;

abstract class Model {

    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';

    public function loadData($data) {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    abstract public function rules(): array;

    public array $errors = [];

    public function validate() {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            foreach ($rules as $rule) {
                if (is_array($rule)) {
                    if (is_array($rule[1])) {
                        $rule[1] = [
                            $rule[1][0],
                            $this->{$rule[1][1]}
                        ];
                    }
                    $rule = new $rule[0]($rule[1]);
                } else {
                    $rule = new $rule();
                }

                if (!$rule->validate($value)) {
                    $this->addError($attribute, $rule->message());
                }


            }
        }


        return empty($this->errors);
    }

    public function addError(string $attribute, string $message) {
        $this->errors[$attribute][] = $message;
    }

    public function hasError($attribute) {
        return $this->errors[$attribute] ?? false;
    }

    public function getFirstError($attribute) {
        return $this->errors[$attribute][0] ?? false;
    }

    

}
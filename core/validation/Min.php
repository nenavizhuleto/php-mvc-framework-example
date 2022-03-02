<?php

namespace app\core\validation;

class Min extends Rule {

    private int $min;

    public function __construct($min) {
        $this->min = $min;
    }

    public function validate($value): bool {
        if (strlen($value) > $this->min) {
            return true;
        }
        return false;
    }

    public function message(): string {
        return "Min length of this field must be $this->min";
    }

}
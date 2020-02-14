<?php

namespace App\Core\View\Form\Validation;

class ValidatorFactory
{
    static public function create(string $name, $options = null): IValidator {

        switch ($name) {
            case 'required':
                return new Required();
            case 'integer':
                return new Integer();
        }
    }
}

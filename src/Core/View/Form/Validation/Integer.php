<?php

namespace App\Core\View\Form\Validation;

use App\Core\View\Form\Field\Field;

class Integer implements IValidator
{
    public function validate($value): bool
    {
        return is_integer($value);
    }

    public function getMessage(Field $field): string
    {
        return "{$field->getValue()} não é um número valido";
    }
}
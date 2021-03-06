<?php

namespace App\Core\View\Form\Validation;

use App\Core\View\Form\Field\Field;

class Required implements IValidator
{
    public function isValid($value): bool
    {
        return !empty($value);
    }

    public function getMessage(Field $field): string
    {
        $description = $field->getDescription() ? $field->getDescription() : $field->getName();
        return "Campo '{$description}' requerido";
    }
}
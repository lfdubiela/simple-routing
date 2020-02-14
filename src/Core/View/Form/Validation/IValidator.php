<?php

namespace App\Core\View\Form\Validation;

use App\Core\View\Form\Field\Field;

interface IValidator
{
    public function isValid($value): bool;

    public function getMessage(Field $field): string;
}
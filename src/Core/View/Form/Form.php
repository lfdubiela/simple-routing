<?php

namespace App\Core\View\Form;

use App\Core\View\Form\Field\Field;
use App\Core\View\Form\Field\FieldBuilder;

class Form
{
    protected $name;

    protected $fields = [];

    const TEXT = 'text';

    const EMAIL = 'email';

    const NUMBER = 'number';

    const DATE = 'date';

    const CHECKBOX = 'checkbox';

    const RADIO = 'radio';

    /**
     * Form constructor.
     * @param $name
     * @param array $fields
     */
    public function __construct($name, array $fields)
    {
        $this->name = $name;
        $this->mapFields($fields);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function isValid(): bool
    {
        $valid = true;

        /** @var Field $field */
        foreach ($this->fields as $field) {
            if (!$field->validate()) {
                $valid = false;
            }
        }

        return $valid;
    }

    /**
     * @return array
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    private function mapFields(array $fields)
    {
        /** @var Field $field */
        foreach ($fields as $field) {
            $fieldInstance = (new FieldBuilder())->buildAssoc($field);
            $this->fields[$field['name']] = $fieldInstance;
        }
    }

    public function hydrateValues(array $values)
    {
        /**
         * @var  Field $field
         */
        foreach ($values as $fieldName => $value) {
            $field = $this->fields[$fieldName];
            $field->setValue($value);
        }
    }

}
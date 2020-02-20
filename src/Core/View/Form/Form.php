<?php

namespace App\Core\View\Form;

use App\Core\View\Form\Field\Field;
use App\Core\View\Form\Field\FieldBuilder;

class Form
{
    protected $action;

    protected $method;

    protected $fields = [];

    const HIDDEN = 'hidden';

    const TEXT = 'text';

    const EMAIL = 'email';

    const NUMBER = 'number';

    const DATE = 'date';

    const CHECKBOX = 'checkbox';

    const RADIO = 'radio';

    const SELECT = 'select';

    const BUTTON = 'button';

    const SUBMIT = 'submit';

    /**
     * Form constructor.
     * @param $action
     * @param $method
     * @param array $fields
     */
    public function __construct($action, $method, array $fields)
    {
        $this->action = $action;
        $this->method = $method;
        $this->mapFields($fields);
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
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

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    private function mapFields(array $fields)
    {
        /** @var Field $field */
        foreach ($fields as $field) {
            $fieldInstance = (new FieldBuilder())->buildAssoc($field);
            $this->fields[$field['name']] = $fieldInstance;
        }
    }

    public function getFieldValue($fieldName)
    {
        if ($this->fields[$fieldName]) {
            /** @var Field $field */
           $field = $this->fields[$fieldName];
           return $field->getValue();
        }

        return '';
    }

    public function hydrateValues(array $values)
    {
        /**
         * @var  Field $field
         */
        foreach ($values as $fieldName => $value) {
            if (isset($this->fields[$fieldName])) {
                $field = $this->fields[$fieldName];
                $field->setValue($value);
            }
        }
    }

}
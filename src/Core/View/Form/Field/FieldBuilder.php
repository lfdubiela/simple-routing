<?php


namespace App\Core\View\Form\Field;


use App\Core\View\Form\Validation\IValidator;
use http\Exception;

class FieldBuilder
{

    protected $description;
    protected $type;
    protected $value;
    protected $id;
    protected $name;
    protected $class;
    protected $placeHolder;
    protected $extraInfo;
    protected $warningMessages;
    protected $default;
    protected $validators;

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setDefault($default)
    {
        $this->default = $default;
    }

    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }

    public function setPlaceHolder($placeHolder)
    {
        $this->placeHolder = $placeHolder;
        return $this;
    }

    public function setExtraInfo($extraInfo)
    {
        $this->extraInfo = $extraInfo;
        return $this;
    }

    public function addValidator(IValidator $validator)
    {
        $this->validators[] = $validator;
        return $this;
    }

    public function buildAssoc(array $arr)
    {
        $this->description = $arr['description'] ?? null;
        $this->default = $arr['default'] ?? null;
        $this->type = $arr['type'] ?? null;
        $this->value = $arr['value'] ?? null;
        $this->id = $arr['id'] ?? $arr['name'];
        $this->name = $arr['name'] ?? null;
        $this->class = $arr['class'] ?? null;
        $this->placeHolder = $arr['placeHolder'] ?? null;
        $this->extraInfo = $arr['extraInfo'] ?? null;
        $this->warningMessages = $arr['warningMessages'] ?? [];
        $this->validators = $arr['validators'] ?? [];

        return $this->build();
    }

    public function build()
    {
        if (!$this->validateAfterBuild()) {
            throw new \Exception("Erro ao criar field: {$this->name}");
        }

        return new Field(
            $this->id,
            $this->name,
            $this->type,
            $this->validators,
            $this->value,
            $this->description,
            $this->class,
            $this->placeHolder,
            $this->extraInfo,
            $this->default,
            $this->warningMessages
        );
    }

    /**
     * @return bool
     */
    private function validateAfterBuild()
    {
        return $this->id && $this->name && $this->type;
    }
}
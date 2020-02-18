<?php


namespace App\Core\View\Form\Field;


use App\Core\View\Form\Validation\IValidator;
use App\Core\View\Form\Validation\ValidatorFactory;

class Field implements IField
{

    protected $description;
    protected $type;
    protected $value;
    protected $id;
    protected $name;
    protected $class;
    protected $placeHolder;
    protected $extraInfo;
    protected $options;
    protected $warningMessages;
    protected $validators;

    public function __construct(
        $id,
        $name,
        $type, array $validators = [],
        $value = null,
        $description = null,
        $class = null,
        $placeHolder = null,
        $extraInfo = null,
        $options = [],
        $warningMessage = []
    ) {
        $this->description = $description;
        $this->type = $type;
        $this->value = $value;
        $this->id = $id;
        $this->name = $name;
        $this->class = $class;
        $this->placeHolder = $placeHolder;
        $this->extraInfo = $extraInfo;
        $this->options = $options;
        $this->warningMessages = $warningMessage;

        $this->createValitors($validators);
    }

    public function createValitors(array $validators)
    {
        foreach ($validators as $key => $value) {
            $name = is_string($key) ? $key : $value;
            $options = is_array($value) ? $value : null;

            $this->validators[] = ValidatorFactory::create($name, $options);
        }
    }

    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @return null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return array
     */
    public function getValidators(): array
    {
        return $this->validators;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return null
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @return null
     */
    public function getPlaceHolder()
    {
        return $this->placeHolder;
    }

    /**
     * @return null
     */
    public function getExtraInfo()
    {
        return $this->extraInfo;
    }

    /**
     * @return null
     */
    public function getWarningMessages()
    {
        return $this->warningMessages;
    }

    /**
     * @return bool
     */
    public function validate()
    {
        /** @var IValidator $validator */
        if ($this->validators) {
            foreach ($this->validators as $validator) {
                if (!$validator->isValid($this->value)) {
                    $this->warningMessages[] = $validator->getMessage($this);
                    return false;
                }
            }
        }

        return true;
    }

    public function isSelected($val) {
        return $this->value == $val;
    }

    public function isValid(): bool
    {
        return count($this->warningMessages) == 0;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function setOptions($options)
    {
        $this->options = $options;
    }

}
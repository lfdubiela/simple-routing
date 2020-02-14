<?php

namespace App\Core\View;

use App\Core\View\Error\TemplateNotFoundException;

class Render
{
    protected $properties;

    protected $path;

    public function __construct(array $properties, $path)
    {
        $this->properties = $properties;
        $this->path = $path;
    }

    public function render()
    {
        ob_start();
        if (file_exists($this->path)) {
            foreach ($this->properties as $name => $property) {
                $this->$name = $property;
            }

            ob_start();

            //Includes contents
            include $this->path;
            $buffer = ob_get_contents();
            @ob_end_clean();

            return $buffer;
        }

        throw new TemplateNotFoundException($this->path);
    }
}
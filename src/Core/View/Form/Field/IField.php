<?php

namespace App\Core\View\Form\Field;

interface IField
{
    public function getDescription();

    public function getType();

    public function getId();

    public function getName();

    public function getValue();

    public function validate();

    public function getValidators();

    public function getClass();

    public function getPlaceHolder();

    public function getExtraInfo();

    public function getWarningMessages();

    public function setValue($val);
}
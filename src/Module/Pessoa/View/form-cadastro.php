<?php

/** @var \App\Module\Pessoa\View\Form\FormCadastro $form */
$form = $this->form;
$action = $this->action;

?>

<form action="<?= $action?>" name="<?= $form->getName()?>">

    <?php
        foreach ($form->getFields() as $field) {

        /** @var \App\Core\View\Form\Field\Field $field */
        ?>
        <label for="<?=$field->getName()?>"><?= $field->getDescription()?></label>
        <input id="<?=$field->getId()?>" name=<?=$field->getName()?> type="<?= $field->getType()?>" value="<?= $field->getValue()?>">
    <?php } ?>
</form>

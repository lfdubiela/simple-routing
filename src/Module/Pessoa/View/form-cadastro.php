<?php

/** @var \App\Core\View\Form\Form $form */
$form = $this->form->getForm();
?>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<title>Cadastro de Pessoas</title>

<body>
<div class="container">
    <ul class="nav nav-tabs" id="tab-cadastrar-pessoas" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#cadastrar-pessoas" role="tab"
               aria-controls="home" aria-selected="true">Cadastrar Pessoas</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="margin-em">
            <div class="tab-pane fade show active" id="cadastrar-pessoas" role="tabpanel" aria-labelledby="home-tab">

                <div class="alert alert-secondary" role="alert">
                    <strong>*</strong> Campos Obrigatórios
                </div>

                <ul class="nav nav-tabs" id="tab-dados" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab-dados-principais" data-toggle="tab" href="#dados-principais"
                           role="tab" aria-controls="home" aria-selected="true">Dados Principais</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-dados-outros" data-toggle="tab" href="#dados-outros" role="tab"
                           aria-controls="home" aria-selected="true">Outros</a>
                    </li>
                </ul>

                <div class="tab-content" id="content-form">
                    <div class="tab-pane fade show active" id="dados-principais" role="tabpanel"
                         aria-labelledby="home-tab">
                        <div class="margin-em">
                            <form class="" action="<?= $form->getAction() ?>"
                                  method="<?= $form->getMethod() ?>">
                                <?php
                                /** @var \App\Core\View\Form\Field\Field $field */
                                foreach ($form->getFields() as $field) { ?>
                                    <div class="form-group row">
                                            <?php if (in_array($field->getType(), ['select', 'radio'])) { ?>
                                            <label class="col-sm-3 col-form-label col-form-label-sm"
                                                   for="<?= $field->getName() ?>"><?= $field->getDescription() ?> </label>
                                            <div class="col-sm-9">
                                                <?php if ($field->getType() == \App\Core\View\Form\Form::SELECT) { ?>
                                                    <select class="form-control form-control-sm"
                                                            id="<?= $field->getId() ?>"
                                                            name=<?= $field->getName() ?> type="<?= $field->getType() ?>">
                                                        <?php if (!$field->getDefault()) { ?>
                                                            <option><?= $field->getExtraInfo() ?></option>
                                                        <?php } ?>
                                                        <?php foreach ($field->getValue() as $key => $val) { ?>
                                                            <option <?= $field->getDefault() == $key ? 'selected' : null ?>
                                                                    value="<?= $key ?>"> <?= $val ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                <?php } ?>
                                                <?php if ($field->getExtraInfo()) { ?>
                                                    <small id="emailHelp"
                                                           class="form-text text-muted"><?= $field->getExtraInfo() ?></small>
                                                <?php } ?>
                                                <?php if ($field->getWarningMessages()) { ?>
                                                    <?php foreach ($field->getWarningMessages() as $message) { ?>
                                                        <div class="invalid-feedback">
                                                            <?= $message ?>
                                                        </div>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } else { ?>

                                                <?php if ($field->getType() == \App\Core\View\Form\Form::SUBMIT) { ?>
                                                <div class="col-sm-3 col-form-label col-form-label-sm"></div>
                                                <div class="col-sm-9">
                                                    <button type="<?= $field->getType() ?>"
                                                            class="btn btn-primary"><?= $field->getName() ?></button>
                                                <?php } else { ?>
                                                <label class="col-sm-3 col-form-label col-form-label-sm"
                                                       for="<?= $field->getName() ?>"><?= $field->getDescription() ?> </label>
                                                <div class="col-sm-9">
                                                    <input class="form-control form-control-sm"
                                                           id="<?= $field->getId() ?>"
                                                           name=<?= $field->getName() ?> type="<?= $field->getType() ?>"
                                                           value="<?= $field->getValue() ?>">
                                                    <?php if ($field->getExtraInfo()) { ?>
                                                        <small id="emailHelp"
                                                               class="form-text text-muted"><?= $field->getExtraInfo() ?></small>
                                                    <?php } ?>
                                                    <?php if ($field->getWarningMessages()) { ?>
                                                        <?php foreach ($field->getWarningMessages() as $message) { ?>
                                                            <div class="invalid-feedback">
                                                                <?= $message ?>
                                                            </div>
                                                        <?php }
                                                    }
                                                }
                                            } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="dados-outros" role="tabpanel" aria-labelledby="home-tab">Outros...
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

<style>
    .margin-em {
        margin: 1em;
    }
</style>
</html>
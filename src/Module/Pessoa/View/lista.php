<?php
//mostrar
//https://guia.vivaintra.com.br/index.php?action=tarefas
?>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<title>Listagem de Pessoas</title>
<body>
<div class="container">
    <ul class="nav nav-tabs" id="tab-cadastrar-pessoas" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#cadastrar-pessoas" role="tab"
               aria-controls="home" aria-selected="true">Listar Pessoas</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="margin-em">
            <div class="tab-pane fade show active" id="cadastrar-pessoas" role="tabpanel" aria-labelledby="home-tab">

                <a href="/pessoas/cadastrar"><i class="fas fa-jedi"></i> Criar novo usuário</a>
                <div class="tab-content" id="content-form">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Matricula</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Nível</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Opções</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            /** @var \App\Module\Pessoa\Model\Pessoa $pessoa */
                        foreach ($this->pessoas as $pessoa) { ?>
                            <tr>
                                <td><?= $pessoa->getMatricula()?></td>
                                <td><?= $pessoa->getNome()?></td>
                                <td><?= $pessoa->getEmail()?></td>
                                <td><?= $pessoa->getNivel()?></td>
                                <td><?= $pessoa->getCargoId()?></td>
                                <td>
                                    <a href="/pessoas/excluir?id=<?= $pessoa->getId()?>"><i class="fa fa-trash"></i></a>
                                    <a href="/pessoas/cadastrar?id=<?= $pessoa->getId()?>"><i class="fa fa-pen"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<style>
    form label.col-form-label {
        text-align: right;
    }

    .margin-em {
        margin: 1em;
    }
</style>
</html>
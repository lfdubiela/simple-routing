<?php

namespace App\Configuration;

use App\Module\Pessoa\Controller;
use App\Core\Router\Router;

Router::instance()
    ->get('/', Controller\Pessoa::class)
    ->get('/pessoas::listar', Controller\Pessoa::class)
    ->get('/pessoas/cadastrar', Controller\Pessoa::class)
    ->get('/pessoas/excluir', Controller\Pessoa::class)
    ->post('/pessoas/cadastrar', Controller\Pessoa::class);

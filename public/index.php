<?php

declare(strict_types=1);

use Dotenv\Dotenv;
use App\Core\Router;

// Autoload de Composer
require dirname(__DIR__) . '/vendor/autoload.php';

// Variables de entorno
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

// Inicializar Router
$router = new Router();

// Registrar rutas
require dirname(__DIR__) . '/routes/web.php';

// Procesar solicitud
$router->dispatch();
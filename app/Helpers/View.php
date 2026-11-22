<?php

declare(strict_types=1);

function view(string $name, array $data = []): void
{
    $basePath = dirname(__DIR__, 2) . '/resources/views/';

    $viewPath = $basePath . $name . '.php';

    if (!is_file($viewPath)) {
        throw new RuntimeException(
            "La vista '{$name}' no existe."
        );
    }

    // Convertir los datos en variables PHP
    extract($data, EXTR_SKIP);

    // Capturar el contenido de la vista
    ob_start();

    try {
        require $viewPath;
        $content = ob_get_clean();
    } catch (Throwable $e) {
        ob_end_clean();
        throw $e;
    }

    // Cargar el layout principal
    $layoutPath = $basePath . 'layouts/main.php';

    if (is_file($layoutPath)) {
        require $layoutPath;
    } else {
        echo $content;
    }
}
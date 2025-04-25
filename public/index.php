<?php

session_start();

require_once __DIR__ . '/../config/config.php';

spl_autoload_register(function($class){

    $paths = [

        __DIR__ . '/../core/'   . $class . '.php',
        __DIR__ . '/../app/controllers/' . $class . '.php',
        __DIR__ . '/../app/models/' . $class . '.php'
    ];
    foreach($paths as $file) {
        if(file_exists($file)){
            require_once $file;
            return;
        }
    }
});


$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$segments = explode('/', $uri);
$controllerName = ucfirst($segments[0] ?? 'user') . 'Controller';
$method = $segments[1] ?? 'home';
$id = $segments[2] ?? null;

if (class_exists($controllerName)) {
    $ctrl = new $controllerName;
    if (method_exists($ctrl, $method)) {
        if ($id !== null) {
            $ctrl->$method($id);
        } else {
            $ctrl->$method();
        }
    } else {
        http_response_code(404);
        $errorMessage = 'Method not found';
    }
} else {
    http_response_code(404);
    echo 'Controller not found';
}

if ($uri === '') {
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f4f4f9;
        }
        h1 {
            color: #333;
        }
        p {
            margin: 10px 0;
        }
        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Popup Application</h1>
    <p><a href="/admin/login">Admin Login</a></p>
    <p><a href="/user">Visit User Homepage</a></p>
</body>
</html>';
}
?>

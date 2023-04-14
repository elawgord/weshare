<?php

require 'application/lib/Dev.php';

use application\core\Router;

// Функція автозавантаження класів
spl_autoload_register(function($class) {

  // Заміна слешів
  $path = str_replace('\\', '/', $class.'.php');

  // Підключення класу
  if (file_exists($path)) {
    require $path;
  }
});

// Запуск сесії
session_start();

$router = new Router;
$router->run();
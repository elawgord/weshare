<?php

namespace application\core;

use application\core\View;

// Клас Router відповідає за маршрутизацію на сайті.
class Router {

    // protected доступні тільки всередині класу
    protected $routes = [];
    protected $params = [];

    // В конструкторі завантажується масив роутів з файлу routes.php і додається до масиву $routes. 
    public function __construct() {
        $arr = require 'application/config/routes.php';
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    // Метод додає роут у масив $routes.
    public function add($route, $params) {
        $route = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1>\2)', $route);
        $route = '#^'.$route.'$#';
        // Підготовка маршруту. route - ключ, params - значення. Після цього ключі стають виразами.
        $this->routes[$route] = $params;
    }
    
    // Метод перевіряє чи є потрібний роут у масиві $routes і якщо він є - заповнює масив $params.
    public function match() {
        // Отримання діючого URL. trim - видаляє слеш '/'
        $url = trim($_SERVER['REQUEST_URI'], '/');
        // Перебирання масиву маршрутів
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        if (is_numeric($match)) {
                            $match = (int) $match;
                        }
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }
    
    // Метод запускає контроллер і його метод за допомогою параметрів з масиву $params.
    public function run() {
        if ($this->match()) {
            // Підключення controller і виклик action. "\\" - два символи, бо один з них межуючий. ucfirst - робить перший символ рядка з великої літери
            $path = 'application\controllers\\'.ucfirst($this->params['controller']).'Controller';
            // Перевірка наявності класу і методу
            if (class_exists($path)) {
                $action = $this->params['action'].'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    // :: - дозволяє викликати код не створюючи екземпляр класу
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }
}
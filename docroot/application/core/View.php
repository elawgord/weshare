<?php

namespace application\core;

// Клас View забезпечує перегляд даних для користувачів
class View {
    
    public $path;
    public $route;
    public $layout = 'default';

    // Зв'язування з контролером
    public function __construct($route) {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

    // Метод відображає певний шаблон у залежності від параметрів які передаються
    public function render($title, $vars = []) {
        // extract - імпортує змінні з масиву в діючу таблицю символів
        extract($vars);
        // Копіювання виду в буфер і присвоєння в змінну $content
        $path = 'application/views/'.$this->path.'.php';
        if (file_exists($path)) {
            // ob_start - увімкнення буферизації виводу
            ob_start();
            require $path;
            // ob_get_clean - отримати вміст поточного буфера та видалити його
            $content = ob_get_clean();
            // Підключення шаблону
            require 'application/views/layouts/'.$this->layout.'.php';
        } 
    }

    // Метод перенаправляє користувача на іншу сторінку
    public function redirect($url) {
		header('location: /'.$url);
		exit;
	}

    // Метод виводить сторінку помилки залежно від коду
    public static function errorCode($code) {
        http_response_code($code);
        $path = 'application/views/errors/'.$code.'.php';
		if (file_exists($path)) {
			require $path;
		}
		exit;
    }

    // Метод який відправляє повідомлення користувачу (прив'язано AJAX)
    public function message($status, $message) {
		exit(json_encode(['status' => $status, 'message' => $message]));
	}

    // Метод який перенаправляє користувача на іншу сторінку
    public function location($url) {
		exit(json_encode(['url' => $url]));
	}
}
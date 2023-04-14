<?php

namespace application\core;

Use application\core\View;

// Базовий контроллер. Ініціалізує об'єкт для роботи з представленням та моделлю. 
abstract class Controller {
    
    public $route;
    public $view;
    public $acl;

    // Конструктор класу. В ньому виконується перевірка доступу з допомогою метода checkAcl(), завантажується представлення та модель.
    public function __construct($route) {
		$this->route = $route;
		if (!$this->checkAcl()) {
			View::errorCode(403);
		}
		$this->view = new View($route);
		$this->model = $this->loadModel($route['controller']);
	}

    // Метод завантажує клас моделі за ім'ям, що передається як параметр. Клас знаходиться в директорії application\models та його назва починається з великої літери. Якщо клас знайдено, то створюється новий об'єкт класу та повертається.
    public function loadModel($name) {
		$path = 'application\models\\'.ucfirst($name);
		if (class_exists($path)) {
			return new $path;
		}
	}

    // Метод перевіряє ACL (доступ до контролерів), які залежать від типу користувача (всі, авторизовані або гості). 
    public function checkAcl() {
        $this->acl = require 'application/acl/'.$this->route['controller'].'.php';
		if ($this->isAcl('all')) {
			return true;
        }
        elseif (isset($_SESSION['account']['userId']) and $this->isAcl('authorize')) {
			return true;
		}
        elseif (!isset($_SESSION['account']['userId']) and $this->isAcl('guest')) {
            return true;
        }
        return false;
    }

    // Метод перевіряє, чи маршрут підтримується для доступу в залежності від ролі користувача.
    public function isAcl($key) {
        return in_array($this->route['action'], $this->acl[$key]);
    }

}
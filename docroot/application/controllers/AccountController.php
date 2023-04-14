<?php

namespace application\controllers;

use application\core\Controller;

// Клас AccountController наслідує клас Controller
class AccountController extends Controller {

    // Реєстрація
    // Перевіряє наявність введених даних, правильність їх заповнення та чи є користувач з такими даними в базі даних. Якщо все вірно, реєструє нового користувача.
    public function registerAction() {
        if (!empty($_POST)) {
            if (!$this->model->emailOrLoginTaken($_POST['userEmail'], $_POST['userLogin'])) {
                $this->view->message('error', $this->model->error);
            }
            elseif (!$this->model->validate(['userName', 'userLastName', 'userEmail', 'userLogin'], $_POST)) {
                $this->view->message('error', $this->model->error);
            }
            elseif (!$this->model->passwordMatch(['userPwd', 'сonfirmPwd'], $_POST)) {
                $this->view->message('error', $this->model->error);
            }
            elseif (!$this->model->register($_POST)) {
                $this->view->location('login');
            }
        }
        $this->view->render('Реєстрація');
    }

    // Авторизація
    // Перевіряє наявність введених даних, правильність їх заповнення та чи є користувач з такими даними в базі даних. Якщо все вірно, реєструє нового користувача.
    public function loginAction() {
        if (!empty($_POST)) {
            if (!$this->model->emptyInput(['userLogin', 'userPwd'], $_POST)) {
                $this->view->message('error', $this->model->error);
            }
            elseif (!$this->model->loginOrEmailCheck($_POST['userLogin'], $_POST['userLogin'])) {
                $this->view->message('error', $this->model->error);
            }
            elseif (!$this->model->passwordCheck($_POST['userLogin'], $_POST['userLogin'], $_POST['userPwd'])) {
                $this->view->message('error', $this->model->error);
            }
            $this->model->isLogged($_POST['userLogin'], $_POST['userLogin']);
            $this->view->location('/');
        }
        $this->view->render('Авторизація');
    }

    // Знищує дані авторизації користувача та перенаправляє його на сторінку авторизації.
    public function logoutAction() {
        unset($_SESSION ['account']);
        $this->view->redirect('login');
    }

    // Підключення шаблону для декількох сторінок(Controller.php):
    // public function before() {
    //     $this->view->layout = 'default';
    // }
}
<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;

// MainController наслідує клас Controller
class MainController extends Controller {

    // Метод для відображення головної сторінки (глобальної, де відображаються пости всіх користувачів) 
    public function indexAction() {
        $pagination = new Pagination($this->route, $this->model->postsNumber(), 20);
        $vars = [
            'pagination' => $pagination->get(),
            'list' => $this->model->globalPostsList($this->route),
        ];
        $this->view->render('Глобальна сторінка', $vars);
    }

    // Метод для відображення сторінки актуального авторизованого користувача
    public function mypageAction() {
        $pagination = new Pagination($this->route, $this->model->postsNumber(), 20);
        $vars = [
            'pagination' => $pagination->get(),
            'list' => $this->model->myPagePostsList($this->route),
        ];
        // debug($this->model->myPagePostsList($this->route));
        $this->view->render('Моя сторінка', $vars);
    }
    
    // Метод для відображення сторінки друзів користувача
    public function friendsAction() {
        $this->view->render('Сторінка друзів');
    }

    // Метод для створення посту на головній сторінці
    public function postsglobalAction() {
        if (!empty($_POST)) {
            if (!$this->model->inputLimit($_POST['postContent'])) {
                $this->view->message('attention', $this->model->error);
            }
            $postId = $this->model->postAdd($_POST);
            if (!$postId) {
                $this->view->message('error', 'Помилка обробки запросу');
            }
            $this->view->location('/');
        } 
        $this->view->render('Створення посту');
    }

    // Метод для створення посту на сторінці користувача
    public function postAction() {
        if (!empty($_POST)) {
            if (!$this->model->inputLimit($_POST['postContent'])) {
                $this->view->message('attention', $this->model->error);
            }
            $postId = $this->model->postAdd($_POST);
            if (!$postId) {
                $this->view->message('error', 'Помилка обробки запросу');
            }
            $this->view->location('../mypage');
        } 
        $this->view->render('Створення посту');
    }

    // Метод для редагування посту на глобальній сторінці
    public function globaleditAction() {
        if (!$this->model->isPostExists($this->route['id'])) {
            $this->view->errorCode(404);
        }
        if (!empty($_POST)) {
            $this->model->postEdit($_POST, $this->route['id']);
            $this->view->location('/');
        }
        $vars = [
            'data' => $this->model->postData($this->route['id'])['0'],
        ];
        $this->view->render('Редагування посту', $vars);
    }

    // Метод для редагування посту на сторінці користувача
    public function editAction() {
        if (!$this->model->isPostExists($this->route['id'])) {
            $this->view->errorCode(404);
        }
        if (!empty($_POST)) {
            $this->model->postEdit($_POST, $this->route['id']);
            $this->view->location('../mypage');
        }
        $vars = [
            'data' => $this->model->postData($this->route['id'])['0'],
        ];
        $this->view->render('Редагування посту', $vars);
    }

    // Метод для видалення посту на глобальній сторінці
    public function globaldeleteAction() {
        if (!$this->model->isPostExists($this->route['id'])) {
            $this->view->errorCode(404);
        }
        $this->model->postDelete($this->route['id']);
        $this->view->redirect('../');
    }    

    // Метод для видалення посту на сторінці користувача
    public function deleteAction() {
        if (!$this->model->isPostExists($this->route['id'])) {
            $this->view->errorCode(404);
        }
        $this->model->postDelete($this->route['id']);
        $this->view->redirect('mypage');
    }    

    // Метод для редагування профілю користувача
    public function myprofileAction() {
        if (!empty($_POST)) {
            $this->view->message('success', 'форма працює');
        } 
        $this->view->render('Редагувати профіль');
    }
}
<?php

namespace application\models;

use application\core\Model;

// Клас реалізовує логіку на сторінках авторизованого користувача.
class Main extends Model {

    // Метод перевіряє довжину доданого поста - 10 000 символів
    public function inputLimit($addPost) {
        $params = [
            'postContent' => $addPost,
        ];
        if (empty($addPost)) {
            $this->error = 'Введіть Ваш текст';
            return false;
        }
        elseif (iconv_strlen($addPost) > 10000) {
            $this->error = 'Пост не може бути довжим 10 000 сиволів';
            return false;
        }
        return true;
    }

    // Метод додає новий пост до бази даних 
    public function postAdd($post) {
        $postTime = date('Y-m-d H:i:s');
        $userId = ($_SESSION['account']["userId"]); 
        $userName = ($_SESSION['account']["userName"]);
        $userLastName = ($_SESSION['account']["userLastName"]);
        $params = [
            'postId' => '0',
            'postContent' => $post['postContent'],
            'postTime' => $postTime,
            'userId' => $userId,
            'userName' => $userName,
            'userLastName' => $userLastName,
        ];
        $this->db->query('INSERT INTO posts VALUES (:postId, :postContent, :postTime, :userId, :userName, :userLastName)', $params);
        return $this->db->lastInsertId();
    }

    // Метод редагує пост, який вже існує в базі даних
    public function postEdit($post, $postId) {
        $postTime = date('Y-m-d H:i:s');
        $params = [
            'postId' => $postId,
            'postContent' => $post['postContent'],
            'postTime' => $postTime,
        ];
        $this->db->query('UPDATE posts SET postContent = :postContent, postTime = :postTime WHERE postId = :postId', $params);
    }

    // Метод перевіряє чи існує пост у базі даних 
    public function isPostExists($postId) {
        $params = [
            'postId' => $postId,
        ];
        return $this->db->column('SELECT postId FROM posts WHERE postId = :postId', $params);
    }

    // Метод видаляє пост із бази даних 
    public function postDelete($postId) {
        $params = [
            'postId' => $postId,
        ];
        return $this->db->query('DELETE FROM posts WHERE postId = :postId', $params);
    }

    // Метол повертає дані поста з бази даних 
    public function postData($postId) {
        $params = [
            'postId' => $postId,
        ];
        return $this->db->row('SELECT * FROM posts WHERE postId = :postId', $params);
    }

    // Метод повертає кількість постів у базі даних 
    public function postsNumber() {
        return $this->db->column('SELECT COUNT(postId) FROM posts');
    }

    // Метод повертає список всіх постів усіх користувачів з бази даних
    public function globalPostsList($route) {
        // $max - кількість постів на сторінку (PHP_INT_MAX - необмежена)
        $max = PHP_INT_MAX;
        $params = [
            'max' => $max,
            'start' => (($route['page'] ?? 1) - 1) * $max,
        ];
        return $this->db->row('SELECT * FROM posts ORDER BY postTime DESC LIMIT :start, :max', $params);
    }

    // Метод повертає список постів поточного авторизованого користувача з бази даних
    public function myPagePostsList($route) {
        $max = PHP_INT_MAX;
        $params = [
            'userId' => ($_SESSION['account']["userId"]),
            'max' => $max,
            'start' => (($route['page'] ?? 1) - 1) * $max,
        ];
        return $this->db->row('SELECT * FROM posts WHERE userId = :userId ORDER BY postTime DESC LIMIT :start, :max', $params);
        }

}
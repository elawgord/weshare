<?php

namespace application\models;

use application\core\Model;

// Клас Account містить методи для реєстрації і авторизації користувача.
class Account extends Model {

    // Реєстрація
    // Метод перевіряє правильність введених даних, які потрібні для реєстрації.
    public function validate($input, $post) {
        $rules = [
            'userName' => [
                'pattern' => '#^[a-zA-Zа-яА-Я0-9._-]{3,20}$#',
                'message' => 'Ім\'я може містити тільки латиницю, від 3 до 20 символів',
            ],
            'userLastName' => [
                'pattern' => '#^[a-zA-Zа-яА-Я0-9._-]{3,20}$#',
                'message' => 'Прізвище може містити тільки латиницю, від 3 до 20 символів',
            ],
            'userEmail' => [
                'pattern' => '#^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,10}$#',
                'message' => 'Невірний формат пошти',
            ],
            'userLogin' => [
                'pattern' => '#^[a-zA-Z][a-zA-Z0-9-_\.]{2,20}$#',
                'message' => 'В логіні дозволяються тільки латинські літери і цифри, від 3 до 15 символів',
            ],
        ];

        foreach ($input as $val) {
            if (!isset($post[$val]) or !preg_match($rules[$val]['pattern'], $post[$val])) {
                $this->error = $rules[$val]['message'];
                return false;
            }
        }
        return true;
    }

    // Метод перевіряє співпадання введених паролів.
    public function passwordMatch($input, $post) {
        $rules = [
            'userPwd' => [
                'pattern' => '#^[a-z0-9]{1,20}$#',
                'message' => 'Пароль повинен бути від 5 до 20 сиволів',
            ],
            'confirmPwd' => [
                'pattern' => '#^[a-z0-9]{1,20}$#',
                'message' => 'Пароль повинен бути від 5 до 20 сиволів',
            ],
        ];

        foreach ($input as $val) {
            if (!isset($post[$val]) or !preg_match($rules[$val]['pattern'], $post[$val])) {
                $this->error = $rules[$val]['message'];
                return false;
            }
            else if ($post['userPwd'] !== $post['сonfirmPwd']) {
                $this->error = 'Паролі не співпадають';
                return false;
            }
            return true;
        }
    }

    // Метод перевіряє, чи не використовується логін і поштова адреса, що введені користувачем.
    public function emailOrLoginTaken($userEmail, $userLogin) {
        $params = [
            'userEmail' => $userEmail,
        ];
        if ($this->db->column('SELECT userId FROM users WHERE userEmail = :userEmail', $params)) {
            $this->error = 'Користувач з такою поштою вже зареєстрований';
            return false;
        }
        $params = [
            'userLogin' => $userLogin,
        ];
        if ($this->db->column('SELECT userId FROM users WHERE userLogin = :userLogin', $params)) {
            $this->error = 'Користувач з таким логіном вже зареєстрований';
            return false;
        }
        return true;
    }

    // Метод вносить дані користувача в БД.
    public function register($post) {
        $params = [
            'userId' => 0,
            'userName' => $post['userName'],
            'userLastName' => $post['userLastName'],
            'userEmail' => $post['userEmail'],
            'userLogin' => $post['userLogin'],
            'userPwd' => password_hash($post['userPwd'], PASSWORD_BCRYPT),
        ];
        $this->db->query('INSERT INTO users VALUES (:userId, :userName, :userLastName, :userEmail, :userLogin, :userPwd)', $params);
    }

    // Авторизація
    // Метод перевіряє пароль при авторизації.
    public function passwordCheck($userLogin, $userEmail, $userPwd) {
        $params = [
            'userLogin' => $userLogin,
            'userEmail' => $userEmail,
        ];
        $hash = $this->db->column('SELECT userPwd FROM users WHERE userLogin = :userLogin OR userEmail = :userEmail', $params);
        if (!$hash or !password_verify($userPwd, $hash)) {
            $this->error = 'Невірний пароль';
            return false;
        }
        return true;
    }

    // Метод перевіряє, чи внесені дані в усі поля.
    public function emptyInput($input, $post) {
        $rules = [
            'userLogin' => [
                'pattern' => '#\s*#',
                'message' => 'Введіть логін',
            ],
            'userPwd' => [
                'pattern' => '#^[a-z0-9]{1,20}$#',
                'message' => 'Введіть пароль',
            ],
        ];

        foreach ($input as $val) {
            if (!isset($post[$val]) or !preg_match($rules[$val]['pattern'], $post[$val])) {
                $this->error = $rules[$val]['message'];
                return false;
            }
        }
            return true;
    }

    // Метод перевіряє існування логіна і поштової адреси в базі даних.
    public function loginOrEmailCheck($userLogin, $userEmail) {
        $params = [
            'userLogin' => $userLogin,
            'userEmail' => $userEmail,
        ];
        if (!$this->db->column('SELECT userId FROM users WHERE userLogin = :userLogin OR userEmail = :userEmail', $params)) {
            $this->error = 'Користувача з таким логіном не знайдено';
            return false;
        }
        return true;
    }

    // Метод записує дані користувача в сесію.
    public function isLogged($userLogin, $userEmail) {
        $params = [
            'userLogin' => $userLogin,
            'userEmail' => $userEmail,
        ];
        $data = $this->db->row('SELECT * FROM users WHERE userLogin = :userLogin OR userEmail = :userEmail', $params);
        $_SESSION['account'] = $data[0];
    }
  
}


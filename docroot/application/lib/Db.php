<?php

namespace application\lib;

use PDO;

// Клас Db для підключення до бази даних та виконання запитів. 
class Db {

    protected $db;

    // В конструкторі грузяться конфігураційні налаштування для підключення до БД
    public function __construct() {
        $config = require 'application/config/db.php';
        $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'].'', $config['username'], $config['password']);
    }

    // Метод підготовлює запрос до БД
    public function query($sql, $params = []) {
        $stmt = $this->db->prepare($sql);
        if(!empty($params)) {
            foreach ($params as $key => $val) {
                if (is_int($val)) {
                    $type = PDO::PARAM_INT;
                } else {
                    $type = PDO::PARAM_STR;
                }
                $stmt->bindValue(':'.$key, $val, $type);
            }
        }
        // Виконання запросу
        $stmt->execute();
        return $stmt;
        exit();
    }

    // Метод повертає рядки результатів запросу у вигляді індексованого масиву.
    public function row($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // Метод для вибірки одного стовпця з бази даних.
    public function column($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }

    // метод lastInsertId() повертає останній внесений id з БД.
    public function lastInsertId() {
        return $this->db->lastInsertId();
    }


}
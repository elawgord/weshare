<?php

namespace application\core;

use application\lib\Db;

// При створенні екземпляра класу виконується ініціалізація об'єкту для доступу до бази даних.
abstract class Model {

    public $db;

    public function __construct() {

        $this->db = new Db;

    }

}
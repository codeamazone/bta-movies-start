<?php
require_once 'Model.php';

class User extends Model {

    public function __construct()
    {
        $this->table = 'users';
        parent::__construct();
    }

    public function get($username, $password)
    {
        $sql = "SELECT id,username FROM $this->table WHERE username=? AND password=?";
        return $this->getOne($sql, [$username, $password]);
    }
} 
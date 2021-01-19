<?php
require_once 'Model.php';
class User extends Model {

    protected $table = 'users';

    public function get($username, $password)
    {
        $sql = "SELECT id,username FROM $this->table WHERE username=? AND password=?";
        return $this->getOne($sql, [$username, $password]);
    }
} 
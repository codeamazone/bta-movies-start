<?php
require_once 'inc/MyDB.php';
class Model extends MyDB {

    protected $table;

    public function all() {
         $sql = "SELECT * FROM $this->table";
         return $this->getAll($sql);
    }
        
    public function find(int $id) {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        return $this->getOne($sql, [$id]);
    }
}
?>

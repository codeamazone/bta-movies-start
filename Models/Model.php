<?php
require_once 'inc/MyDB.php';
class Model extends MyDB {

    protected $table;

    public function all() {
        $sql = "SELECT * FROM $this->table";
        // Ausgabe über PDO-Funktion
        return $this->getAll($sql);
                
    }
        
    public function find(int $id) {
        
    }
}

<?php
require_once 'inc/MyDB.php';
class Model extends MyDB
{

    protected $table;

    public function all()
    {
        $sql = "SELECT * FROM $this->table";
        return $this->getAll($sql);
    }

    public function find(int $id)
    {
        // Abfrage mit Platzhalter ?
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        // Übergabe des id-Werts als numerisches Array
        return $this->getOne($sql, [$id]);
    }
}

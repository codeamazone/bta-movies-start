<?php
require_once 'Model.php';
class Author extends Model {

    protected $table = 'authors';
/*
    public function find(int $id) {
        $sql = "
        SELECT 
            a.*, 
            COUNT(m.id) movies 
        FROM $this->table a 
        JOIN movies m ON m.author_id=a.id
        WHERE a.id = ?
        GROUP BY a.id
    ";
        return $this->getOne($sql, [$id]);
    } 
*/
    public function getMovies($id) {
        $sql = "SELECT * FROM movies WHERE author_id=?";
        return $this->getAll($sql, [$id]);
    }
}

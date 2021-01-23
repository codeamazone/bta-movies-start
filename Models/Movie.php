<?php
require_once 'Model.php';
class Movie extends Model
{
    protected $table = 'movies';


    public function getMovie($id)
    {
        $sql = "SELECT
                    m.title,
                    a.firstname,
                    a.lastname,
                    a.id
                FROM authors AS a, movies AS m
                WHERE m.id = ? AND m.author_id = a.id";
        $result = $this->getAll($sql, [$id]);
        return $result[0];
    }



    // public function getAuthorId($firstname, $lastname)
    // {
    //     $sql = "SELECT id FROM authors WHERE firstname = '$firstname' AND lastname = 'lastname'";
    //     return $this->prepareAndExecute($sql);
    // }
}

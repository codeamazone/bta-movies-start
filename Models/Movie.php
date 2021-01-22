<?php
require_once 'Model.php';
class Movie extends Model
{
    protected $table = 'movies';

    public function getAuthorId($firstname, $lastname)
    {
        $sql = "SELECT id FROM authors WHERE firstname = '$firstname' AND lastname = 'lastname'";
        return $this->prepareAndExecute($sql);
    }
}

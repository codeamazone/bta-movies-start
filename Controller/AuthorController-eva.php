<?php
require_once 'Controller.php';
require_once 'Models/Author.php';
class AuthorController extends Controller
{
    public function __construct()
    {
        // instanziere neue Author-Klasse
        $this->model = new Author();
    }

    public function index()
    {
        $list = $this->model->all();
        // Pfad immer aus Position von index.php!
        require_once 'Views/author/index.php';
    }

    public function show($id)
    {
        echo __METHOD__ . " ID: $id";
    }
}

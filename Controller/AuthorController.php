<?php
require_once 'Controller.php';
require_once 'Models/Author.php';
class AuthorController extends Controller
{
    public function __construct()
    {
        $this->model = new Author();
    }

    public function index()
    {
        $list = $this->model->all();
        require_once 'Views/author/index.php';
//        echo 'hallo bin in index';
    }

    public function show($id) {
        echo __METHOD__ . " ID: $id";
    }
}

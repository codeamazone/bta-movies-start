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
    }

    public function show($id)
    {
        $item = $this->model->find($id);
        // füge dem Arrray neues Element 'movies' hinzu, das alle movies
        // von author enthält
        $item['movies'] = $this->model->getMovies($id);
        require_once 'Views/author/show.php';
    }
}

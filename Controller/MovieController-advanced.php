<?php
require_once 'Controller.php';
require_once 'Models/Movie.php';
class MovieController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new Movie();
    }

    public function index()
    {
        $list = $this->model->all();
        if ($this->auth) {
            require_once 'Views/movie/admin/index.php';
        } else {
            require_once 'Views/movie/index.php';
        }
    }

    public function show($id)
    {
        $item = $this->model->getMovie($id);
        $item['id'] = $id;

        require_once 'Views/movie/show.php';
    }

    // Display form to edit or create a dataset
    public function edit($id = null)
    {
        if ($id > 0) {
            $data = $this->model->getMovie($id);
        } else {
            $data = null;
        }
        require_once 'Views/Forms/movie.php';
    }

    public function store($id = null)
    {
        $title = $_POST['title'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        // if in existing movie dataset
        // assuming that only movie field is edited
        if ($id > 0) {
            // change values of according dataset (update)
            $sql = "UPDATE movies SET title = '$title' WHERE id = ?";
            $stmt = $this->model->prepare($sql);
            $stmt->execute([$id]);
        } else {
            // retrieve author_id
            $authorId = $this->model->getAuthorId($firstname, $lastname);
            if ($authorId) {
                // create new movie entry with associated author_id
                // Alternatively use createMovie method from movie model
                $sql = "INSERT INTO movies (author_id, title) VALUES ('$authorId', '$title')";
                $stmt = $this->model->prepare($sql);
                $stmt->execute();
            } else {
                // insert new author in author DB
                // This could also be a method in the author model
                $sql = "INSERT INTO authors (firstname,lastname) VALUES ('$firstname','$lastname')";
                $stmt = $this->model->prepare($sql);
                $stmt->execute();
                // retrieve new author's id from author DB
                $authorId = $this->model->getAuthorId($firstname, $lastname);
                // insert new movie in movie DB with associated author_id
                // Alternatively use createMovie method from movie model
                $sql = "INSERT INTO movies (author_id, title) VALUES ('$authorId', '$title')";
                $stmt = $this->model->prepare($sql);
                $stmt->execute();
            }
        }

        header("location: /movies");
    }

    public function delete($id)
    {
        $sql = "DELETE FROM movies WHERE id=?";
        $stmt = $this->model->prepare($sql);
        $stmt->execute([$id]);
        header("location: /authors");
    }
}

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
        $item = $this->model->find($id);
        $item['author'] = $this->model->getAuthor($id);
        require_once 'Views/movie/show.php';
    }

    // Display form to edit or create a dataset
    // needs to be completed/corrected!!!!!
    public function edit($id = null)
    {
        if ($id > 0) {
            $data = $this->model->find($id);
        } else {
            $date = null;
        }
        require_once 'Views/Forms/movie.php';
    }

    public function store($id = null)
    {
        $title = $_POST['title'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        // check if author already in author DB
        $sql = "SELECT id FROM authors WHERE firstname = '$firstname' AND lastname = 'lastname'";
        $stmt = $this->model->prepare($sql);
        // retrieve id if author already exists
        $authorId = $stmt->execute();
        $author = new AuthorController();
        // insert new dataset if author doesn't exist yet
        // using the store method from Author
        $author->store($authorId);

        // if in existing movie dataset
        if ($id > 0) {
            // change values of according dataset (update)
            $sql = "UPDATE movies SET title = '$title' WHERE id = ?";
            $stmt = $this->model->prepare($sql);
            $stmt->execute([$id]);
        } else {
            // insert new dataset if author already exists
            // if ($authorId) {
            //     $sql = "INSERT INTO movies (author_id, title) VALUES ('$authorId', '$title')";
            //     $stmt = $this->model->prepare($sql);
            //     $stmt->execute();
            // // insert new author in authors, retrieve id and update movies accordingly
            // } else {
            //     $sql = "INSERT INTO authors (firstname, lastname)"

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

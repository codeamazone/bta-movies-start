<?php
require_once 'Controller.php';
require_once 'Models/Author.php';
class AuthorController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new Author();
    }

    public function index()
    {
        echo __METHOD__;
        $list = $this->model->all();
        if ($this->auth) {
            // wenn eingeloggt: View aus admin-Ordner (Bearbeiten möglich)
            require_once 'Views/author/admin/index.php';
        } else {
            // wenn nicht eingeloggt: normalen view aus author-Ordner
            // (keine Bearbeitung möglich)
            require_once 'Views/author/index.php';
        }
    }

    public function show($id)
    {
        $item = $this->model->find($id);
        $item['movies'] = $this->model->getMovies($id);
        require_once 'Views/author/show.php';
    }

    // zeige formular zum editiern oder neu anlegen eines datensatzes an 
    public function edit($id = null)
    {
        $data = null;
        if ($id > 0) {
            // Überschreibe $data mit aktuellem Datensatz des gewählten Autors
            $data = $this->model->find($id);
        }
        require_once 'Views/Forms/author.php';
    }

    public function store($id = null)
    {
        // Daten aus dem Form
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        if ($id > 0) {
            // update mit eigegebenen Daten im Form
            $sql = "UPDATE authors SET firstname='$firstname', lastname='$lastname' WHERE id=?";
            $stmt = $this->model->prepare($sql);
            $stmt->execute([$id]);
        } else {
            //insert
            $sql = "INSERT INTO authors (firstname, lastname) VALUES('$firstname''$lastname')";
            $stmt = $this->model->prepare($sql);
            $stmt->execute();
        }

        header("location: /authors");
    }

    public function delete($id)
    {
        $sql = "DELETE FROM authors WHERE id = ?";
        $stmt = $this->model->prepare($sql);
        $stmt->execute([$id]);
        header("location: /authors");
    }
}

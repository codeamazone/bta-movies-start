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
        // Teste, ob du in der richtigen Methode gelandet bist
        echo __METHOD__;
        $list = $this->model->all();
        if ($this->auth) {
            // wenn nicht eingeloggt: normalen view aus author-Ordner
            // (keine Bearbeitung möglich)
            require_once 'Views/author/admin/index.php';
        } else {
            // wenn nicht eingeloggt: keine Bearbeitung möglich
            require_once 'Views/author/index.php';
        }
    }

    public function show($id)
    {
        $item = $this->model->find($id);
        // füge dem Arrray neues Element 'movies' hinzu, das alle movies
        // von author enthält
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

        // Prüfe, ob in bestehendem Datensatz
        if ($id > 0) {
            // update mit eigegebenen Daten im Form
            $sql = "UPDATE authors SET firstname='$firstname', lastname='$lastname' WHERE id=?";
            $stmt = $this->model->prepare($sql);
            $stmt->execute([$id]);
        } else {
            //insert neuen Autor in Autorentabelle
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

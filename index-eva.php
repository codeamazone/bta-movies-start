<?php
require_once 'inc/Helper.php';

// initialisiere variablen
$id         = null;
// name einer controller funktion
$action     = null;
// identifikator eines controllers
$controller = null;

if (isset($_GET['controller'])) {
    /*
    Setze anhand der GET Parameter die Werte für die obigen Variablen
    per switch oder if statements
    1. switch für $_GET['controller'] bauen, um $controller als Instanz einer
    existierenden Controller-Klasse zu setzen
*/
    // Frage ab, ob Parameter gesetzt wurde per URL
    switch ($_GET['controller']) {
        case 'authors':
            require_once 'Controller/AuthorController.php';
            // Instanziere ein neues Objekt der KLasse AuthorController
            $controller = new AuthorController();
            // Rufe Methode index der AuthorController-Klasse auf
            $controller->index();
            break;
            // case 'movies':
            //     require_once '';
            //     break;

    }


    /*
    2. hier $action setzen, wenn $conreoller nicht null ist
    UND isset($_GET['action'])
    UND eine methode $action des Objekts $controller existiert
    (php-Funktion: method_exists)
*/

    // prüfe, ob controller != null, action eingegeben wurde und die Methode im controller existiert
    if ($controller && isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
        // valide Klassenfunktion wurde gefunden und wird auf $action geschrieben
        $action = $_GET['action'];
        // Rufe die Methode im controller auf
        // $controller->$action();
        // Prüfe, ob ein id-Parameter eigegeben wurde, wenn ja:
        // $controller->$action($id), wenn nein, dannn ohne Parameter
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $controller->$action($id);
        } else {
            $controller->$action;
        }
    } else {
        require_once 'Views/home.php';
    }
} else {
    require_once 'Views/home.php';
}
// show dump of GET Params
// $_POST -> Formulare
Helper::dump($_GET);
// changes from main branch

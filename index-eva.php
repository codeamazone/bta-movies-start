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
    switch ($_GET['controller']) {
        case 'authors':
            $controller = 'authors';
            break;
        case 'movies':
            $controller = 'movies';
            break;
        default:
            $controller = null;
    }

    /*
    2. hier $action setzen, wenn $conreoller nicht null ist
    UND isset($_GET['action'])
    UND eine methode $action des Objekts $controller existiert
    (php-Funktion: method_exists)
*/
    echo "Controller existiert";
} else {
    require_once 'Views/home.php';
}
// show dump of GET Params
// $_POST -> Formulare
Helper::dump($_GET);
// changes from main branch

<?php
// starte session
session_start();
require_once 'inc/Helper.php';

// initialisiere variablen
$id         = null;
// name einer controller funktion
$action     = null;
// identifikator eines controllers
$controller = null;

if(isset($_GET['controller'])) {
/*    
    Setze anhand der GET Parameter die Werte für die obigen Variablen
    per swich oder if statements
    1. switch für $_GET['controller'] bauen, um $controller als Instanz einer 
    exsitierenden Controller-Klasse zu setzten    
*/
    switch($_GET['controller']) {
        case 'authors':
            require_once 'Controller/AuthorController.php';
            $controller = new AuthorController();
            break;
        case 'user':
            require_once 'Controller/UserController.php';
            $controller = new UserController();
            break;
    }

/* 
    2. hier $action setzen, wenn $controller nicht null ist 
    UND isset($_GET['action'])
    UND eine methode $action des objekts $controller existiert (php-funktion: method_exists)
*/
    if($controller && isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
        $action = $_GET['action'];
        // habe eine valide klassen funktion gefunden, führe sie hier aus
        // prüfe, ob es ein id-parameter gibt, wenn ja: 
        // dann $controller->$action($id)
        // wenn nicht dann ohne parameter $controller->$action()
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $controller->$action($id);
        } else {
            $controller->$action();
        }

    } else {
        require_once 'Views/home.php';
    }

} 
else {
    require_once 'Views/home.php';
}
// show dump of GET Params
// Helper::dump($_GET);
// changes from main branch
?>

<?php
abstract class Controller {

    protected $model;
    protected $auth;
    protected $viewPath;
    
    public function __construct()
    {
        // setzt Wert von $auth auf true oder false
        $this->auth = isset($_SESSION['auth']);
    }
}

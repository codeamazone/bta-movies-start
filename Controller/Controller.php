<?php
abstract class Controller {

    protected $model;
    protected $auth;
    protected $viewPath;
    
    public function __construct()
    {
        $this->auth = isset($_SESSION['auth']);
    }
}
?>

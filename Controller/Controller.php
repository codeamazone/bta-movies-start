<?php
abstract class Controller {

    protected $model;
    protected $auth;
    
    public function __construct()
    {
        $this->auth = isset($_SESSION['auth']);
    }
}
?>

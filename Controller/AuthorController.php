<?php
require_once 'Controller.php';

class AuthorController extends Controller
{

    public function index()
    {
        echo "Hallo, bin im Index!<br>" . __METHOD__;
    }

    public function show($id)
    {
        echo __METHOD__ . " ID: $id";
    }
}

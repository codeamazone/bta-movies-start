<?php
require_once 'Controller.php';

class AuthorController extends Controller
{

    public function index()
    {
        echo 'hallo bin in index';
    }

    public function show($id) {
        echo __METHOD__ . " ID: $id";
    }
}

<?php

class Logout{
    public function __construct()
    {
        if (!isset($_SESSION['login'])) {
            header('Location: ' . Url::URL . '/Login');
        }
    }
    public function index(){
        $_SESSION = [];
        session_unset();
        session_destroy();
        header('Location: '.Url::URL.'/Login');
    }
}
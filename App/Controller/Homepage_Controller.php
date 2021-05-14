<?php

class Homepage_Controller {

    private $model;
    private $email;
    public $name;

    public function __construct() {

        $this->model = new Users_Model();

        session_start();

        if ( isset($_SESSION['email']) ) {
            $this->email = $_SESSION['email'];
            $this->name = $_SESSION['nama'];
        }
        else {
            header('Location: '.'logout.php');
        }
    }

    public function getEmail() {
        if ( isset($_SESSION['email']) ) {
            return $this->email;
        }

        else {
            header('Location: '.'logout.php');
        }
    }

    public function getName() {
        if ( isset($_SESSION['email']) ) {
            return $this->name;
        }

        else {
            header('Location: '.'logout.php');
        }
    }
}
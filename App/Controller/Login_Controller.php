<?php

class Login_Controller {

    private $model;

    public function __construct() {
        $this->model = new Users_Model();
        session_start();
        if ( isset($_SESSION['logged_in']) ) {
            header('Location: '.'homepage.php');
        }
    }

    public function sanitize_input($input){
        $input = filter_var($input, FILTER_SANITIZE_STRING);
        return $input;
    }

    public function validate_register(){
        if ( isset($_POST['register']) ) {
            $name = $this->sanitize_input($_POST['name']);
            $password = $this->sanitize_input($_POST['password']);
            $verif_password = $this->sanitize_input($_POST['confirm-password']);
            $email = $this->sanitize_input($_POST['email']);
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);

            if ( strlen($name) < 2 ) {
                $msg1 = 'Nama tidak boleh kurang dari 2 huruf.';
                $_POST = array();
                return "<div class='alert alert-danger' role='alert'>$msg1</div>";
            }

            else if ( strlen($password) < 8 ) {
                $msg1 = 'Password tidak boleh kurang dari 8 huruf.';
                return "<div class='alert alert-danger' role='alert'>$msg1</div>";
            }

            else if ( $password != $verif_password ) {
                $msg1 = 'Password dan verifikasi password tidak sama.';
                return "<div class='alert alert-danger' role='alert'>$msg1</div>";
            }

            else if (filter_var($email,FILTER_VALIDATE_EMAIL) === false) {
                $msg1 = 'Email tidak valid. Masukkan email lagi.';
                return "<div class='alert alert-danger' role='alert'>$msg1</div>";
            }

            $this->model->addUser($email, $name, $password);
            return "<div class='alert alert-success' role='alert'>Registrasi pengguna telah berhasil.</div>";
        }
    }

    public function validate_login() {

        if ( isset($_POST['login']) ) {

            $email = $this->sanitize_input($_POST['email']);
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            if (filter_var($email,FILTER_VALIDATE_EMAIL) === false) {
                $msg1 = 'Email tidak valid. Masukkan email lagi.';
                return "<div class='alert alert-danger' role='alert'>$msg1</div>";
            }
            else if ( strlen($password) < 8 ) {
                $msg1 = 'Password tidak sesuai dengan kredensial.';
                return "<div class='alert alert-danger' role='alert'>$msg1</div>";
            }

            error_reporting(E_ALL & ~E_NOTICE);
            if ( is_null($this->model->getPassword($email)['password']) ) {
                $msg1 = 'Email tidak terdaftar pada database.';
                return "<div class='alert alert-danger' role='alert'>$msg1</div>";
            }
            else {
                $password_db = $this->model->getPassword($email)['password'];
            }

            $verify = password_verify($password, $password_db);

            if ($verify) {
                session_start();
                $_SESSION['logged_in'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['nama'] = $this->model->getName($email)['nama'];

                if( !empty($_POST["remember"]) ) {
                    setcookie ("email",$_POST["email"],time()+ 3600);
                    setcookie ("password",$_POST["password"],time()+ 3600);
                }

                else {
                    setcookie("email","");
                    setcookie("password","");
                }

                header('Location: '.'homepage.php');
            }

            else {
                $msg1 = 'Password tidak sesuai dengan kredensial.';
                return "<div class='alert alert-danger' role='alert'>$msg1</div>";
            }
        }
    }
}
<?php

require_once "init.php";
$controller = new Login_Controller();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title> Form Pendaftaran </title>
</head>

<body>
    <div class="form-container"> 
        <div class="form-big-card">

            <div class="form-card-left-picture"> </div>

            <div class="form-content">
                <?php
                if ( isset($_POST['register']) ) {
                    echo $controller->validate_register();
                    $_POST = array();
                }
                ?>
                <div class="form-title"> Form Registrasi InBeauty </div>
                <form name="form-registrasi" method="post" action="">
                    <div>

                        <input type='text' name="name" class="form-box" placeholder="Nama">
                    </div>
                    <div> 

                        <input type='text' name="email" class="form-box" placeholder="Email">
                    </div>

                    <div> 

                        <input type='password' name="password" class="form-box" placeholder="Password">
                    </div>

                    <div> 

                        <input type='password' name="confirm-password" class="form-box" placeholder="Retype password">
                    </div>

                    <div class="form-button">
                        <center>
                            <button type='submit' name="register" class="form-login" style="cursor: pointer;">
                                Daftar
                            </button>

                            <span style="margin-left: 50px;"></span>

                            <a href="login.php">
                                <button type='button' name="register_redirect" class="form-login" style="cursor: pointer;">
                                    Login
                                </button>
                            </a>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
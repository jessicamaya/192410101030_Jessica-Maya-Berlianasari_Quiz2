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
    <title> Form Login </title>
</head>

<body>
    <div class="form-container"> 
        <div class="form-big-card">

            <div class="form-card-left-picture"> </div>

            <div class="form-content">
                <?php
                if ( isset($_POST['login']) ) {
                    echo $controller->validate_login();
                    $_POST = array();
                }
                ?>
                <div class="form-title"> Form Login InBeauty </div>
                <form name="form-registrasi" method="post" action="">
                    <div>
                        <input type='text' name="email" class="form-box" placeholder="Email"
                               value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>"
                        >
                    </div>

                    <div>
                        <input type='password' name="password" class="form-box" placeholder="Password"
                               value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"
                        >
                    </div>

                    <input type="checkbox" name="remember" /> Remember me

                    <div class="form-button">
                        <center>
                            <button type='submit' name="login" class="form-login" style="cursor: pointer;">
                                Login
                            </button>

                            <span style="margin-left: 50px;"></span>

                            <a href="register.php">
                                <button type='button' name="register_redirect" class="form-login" style="cursor: pointer;">
                                    Daftar
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
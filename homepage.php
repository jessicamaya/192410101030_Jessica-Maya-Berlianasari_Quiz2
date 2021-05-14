<?php

require_once "init.php";
$controller = new Homepage_Controller();

?>

<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Homepage</title>-->
<!--</head>-->
<!--<body class="background">-->
<!---->
<!--    <div>-->
<!--        --><?php
//            echo $controller->getName();
//        ?>
<!---->
<!--        <a href="logout.php">-->
<!--            <button>-->
<!--                Logout-->
<!--            </button>-->
<!--        </a>-->
<!--    </div>-->
<!--</body>-->
<!--</html>-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman utama</title>
    <link rel="stylesheet" href="css/stylesheet.css">
</head>

<body>
<div class="navbar">
    <div class="navbar-kiri">
        <ul class="navbar-menu-list">
            <li><a href="#"> Kelas </a></li>
            <li><a href="#"> Produk </a></li>
            <li><a href="#"> Forum </a></li>
        </ul>
    </div>

    <div class="menu-akun" id="dropdown-ready">
        <ul class="menu-akun-list">
            <li class="menu-akun-list-item">
                <a href="homepage.php">Dasbor</a>
            </li>

            <li class="menu-akun-list-item">
                <a href="logout.php">Keluar</a>
            </li>
    </div>

    <div class="navbar-kanan">
        <div class="navbar-username">
            <?= $controller->getEmail() ?>
        </div>
        <div class="navbar-segitiga" onclick="userDropdown()"></div>
    </div>
</div>

<div class="selamatdatang-container">
    <div class="selamatdatang-container-atas">
        <div class="selamatdatang-salam">
            SELAMAT DATANG,
        </div>
        <div class="selamatdatang-nama">
            <?= $controller->getName() ?>
        </div>
        <div class="selamatdatang-gambar-atas">
            <img src="img/homepage-image.jpg" width="400" height="400" alt="gambar diskusi">
        </div>
        <div class="selamatdatang-tawaran">
            Klik segitiga di sebelah kanan email untuk dropdrown logout.
        </div>
        <div class="selamatdatang-line"></div>
    </div>
</div>

<script src="js/JavaScript.js"></script>

</body>

</html>

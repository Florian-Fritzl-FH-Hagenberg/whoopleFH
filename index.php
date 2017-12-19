<?php
session_start();
if (isset($_SESSION["username"])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Whoople is the easy wasy to connect all your social media accounts">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>whoople</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="styles.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&subset=latin,latin-ext" rel="stylesheet"/>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="jquery-3.2.1.js"></script>
    <script src="script.js"></script>
</head>
<body>
<div class="materialContainer">
    <div class="box">
        <div class="title">LOGIN</div>

        <div class="input">
            <label for="loginusername">Username</label>
            <input type="text" name="loginusername" id="loginusername" required>
            <span class="spin"></span>
        </div>

        <div class="input">
            <label for="loginpassword">Password</label>
            <input type="password" name="loginpassword" id="loginpassword" required>
            <span class="spin"></span>
        </div>

        <div class="button login">
            <button id="loginButton"><span>GO</span> <i class="fa fa-check"></i></button>
        </div>

        <a href="" class="pass-forgot">Forgot your password?</a>

    </div>


    <div class="overbox">
        <div class="material-button alt-2"><span class="shape"></span></div>

        <div class="title">REGISTER</div>

        <div class="input">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
            <span class="spin"></span>
        </div>

        <div class="input">
            <label for="mail">E-Mail</label>
            <input type="text" name="mail" id="mail" required>
            <span class="spin"></span>
        </div>

        <div class="input">
            <label for="regpass">Password</label>
            <input type="password" name="regpass" id="regpass" required>
            <span class="spin"></span>
        </div>

        <div class="input">
            <label for="reregpass">Repeat Password</label>
            <input type="password" name="reregpass" id="reregpass" required>
            <span class="spin"></span>
        </div>

        <div class="button">
            <button id="registerButton"><span>NEXT</span></button>
        </div>
    </div>
</div>
</body>
</html>
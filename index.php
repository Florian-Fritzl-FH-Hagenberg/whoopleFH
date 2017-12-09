<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Whoople is the easy wasy to connect all your social media accounts">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>whoople</title>

    <link rel="stylesheet" href="styles.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&subset=latin,latin-ext"
          rel="stylesheet"/>

    <script src="jquery-3.2.1.js"></script>
    <script src="script.js"></script>
</head>
<body>
<div class="materialContainer">
    <div class="box">

        <div class="title">LOGIN</div>

        <div class="input">
            <label for="loginusername">Username</label>
            <input type="text" name="loginusername" id="loginusername">
            <span class="spin"></span>
        </div>

        <div class="input">
            <label for="loginpassword">Password</label>
            <input type="password" name="loginpassword" id="loginpassword">
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
            <input type="text" name="username" id="username">
            <span class="spin"></span>
        </div>

        <div class="input">
            <label for="mail">E-Mail</label>
            <input type="text" name="mail" id="mail">
            <span class="spin"></span>
        </div>

        <div class="input">
            <label for="regpass">Password</label>
            <input type="password" name="regpass" id="regpass">
            <span class="spin"></span>
        </div>

        <div class="input">
            <label for="reregpass">Repeat Password</label>
            <input type="password" name="reregpass" id="reregpass">
            <span class="spin"></span>
        </div>

        <div class="button">
            <button id="registerButton"><span>NEXT</span></button>
        </div>
    </div>
</div>
</body>
</html>
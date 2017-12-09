<?php
session_start();
require_once('database.php');

//Service Methods
if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case 'login' :
            login($_POST['username'], $_POST['password']);
            break;
        case 'register' :
            register($_POST['username'], $_POST['email'], $_POST['password']);
            break;
        // ...etc...
    }
}

function login($username, $password)
{
    //TODO CONNECTION aus database.php holen
    $connection = mysqli_connect("localhost", "root", "", "whoople");
    //Checking is user existing in the database or not
    $query = "SELECT * FROM wUser, wAuthentication WHERE wUser.wAuthentication_ID = wAuthentication.wAuthentication_ID AND wUser_Username = '$username' AND wAuthentication_PW = '$password'";
    $result = mysqli_query($connection, $query);
    $rows = mysqli_num_rows($result);
    if ($rows === 1) {
        $_SESSION['username'] = $username;
        // Redirect user to dashboard.php
        echo 'LOGIN';
    } else {
        echo 'INCORRECT';
    }
}

function register($username, $email, $password)
{
    //TODO CONNECTION aus database.php holen
    //TODO überprüfen ob Username und Email noch nicht vergeben sind
    $connection = mysqli_connect("localhost", "root", "", "whoople");
    //Checking is user existing in the database or not
    $query = "INSERT INTO `wauthentication` (`wAuthentication_ID`, `wAuthentication_PW`, `wAuthentication_TwoWay`) VALUES (NULL, '$password', NULL);";
    mysqli_query($connection, $query);

    $query = "SELECT max(wAuthentication_ID) from wauthentication;";
    $result = mysqli_query($connection, $query);
    $auth_id = mysqli_fetch_row($result)[0];

    $query = "INSERT INTO `wuser` (`wAuthentication_ID`, `wUser_Username`, `wUser_Mail`) VALUES ('$auth_id','$username', '$email');";
    mysqli_query($connection, $query);

    login($username, $password);
}

?>
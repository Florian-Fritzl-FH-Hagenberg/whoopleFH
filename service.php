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
        case 'loginValid' :
            loginValid($_POST['username'], $_POST['password']);
            break;
        case 'registerValid' :
            registerValid($_POST['username'], $_POST['email'], $_POST['password'], $_POST['repassword']);
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

    $response = array();
    if ($rows === 1) {
        $_SESSION['username'] = $username;
        $response['status'] = 'success';
    } else {
        $response['status'] = 'error';
    }
    echo json_encode($response);
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

function loginValid($username, $password){

    $response = array();
    $isValid = true;

    // clean user inputs to prevent sql injections
    $username = trim($_POST['username']);
    $username = strip_tags($username);
    $username = htmlspecialchars($username);

    $password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);

    //username and password validation
    if(empty($username)){
        $response['status'] = 'userError';
    } else if (empty($password)) {
        $response['status'] = 'passError';
    }else {
        $response['status'] = 'success';
    }

    echo json_encode($response);
}

function registerValid($username, $email, $password, $repassword){

    $connection = mysqli_connect("localhost", "root", "", "whoople");
    $response = array();

    // clean user inputs to prevent sql injections
    $username = trim($_POST['username']);
    $username = strip_tags($username);
    $username = htmlspecialchars($username);

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);

    $repassword = trim($_POST['repassword']);
    $repassword = strip_tags($repassword);
    $repassword = htmlspecialchars($repassword);

    //username validation
    if (empty($username)) {
        $response['status'] = "userError1";
    } else if (!empty($username) && strlen($username) < 3) {
        $response['status'] = "userError2";
    } else {
        // check username exist or not
        $query = "SELECT wUser_Username FROM wUser WHERE wUser_Username = '$username'";
        $result = mysqli_query($connection, $query);
        $rows = mysqli_num_rows($result);
        if ($rows != 0) {
            $response['status'] = "userError3";
        }
    }

    //email validation
    if (empty($email)) {
        $response['status'] = "emailError1";
    } else if (!filter_var($email,FILTER_VALIDATE_EMAIL) ) {
        $response['status'] = "emailError2";
    } else {
        // check email exist or not
        $query = "SELECT wUser_Mail FROM wUser WHERE wUser_Mail = '$email'";
        $result = mysqli_query($connection, $query);
        $rows = mysqli_num_rows($result);
        if($rows != 0){
            $response['status'] = "emailError3";
        }
    }

    // password validation
    if (empty($password)){
        $response['status'] = "passError1";
    } else if(strlen($password) < 6) {
        $response['status'] = "passError2";
    }

    //repassword validation
    if (empty($repassword)){
        $response['status'] = "repassError1";
    } else if($repassword != $password){
        $response['status'] = "repassError2";
    } else {
        $response['status'] = "success";
    }

    //response status = success

    echo json_encode($response);
}

?>
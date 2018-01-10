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
        case 'getWhooples' :
            getWhooples($_SESSION['username']);
            break;
        case 'addWhooples' :
            addWhooples($_SESSION['username'], $_POST['whoopleName'], $_POST['accountName'], $_POST['whoopleLink']);
            break;
        // ...etc...
    }
}

function login($username, $password)
{
    //TODO CONNECTION aus database.php holen
    $connection = mysqli_connect("localhost", "root", "", "whoople");
    //Checking is user existing in the database or not
    $query = "SELECT * FROM wUser, wAuthentication WHERE wUser.wAuthentication_ID = wAuthentication.wAuthentication_ID AND wUser_Username = '$username' AND wAuthentication_PW = '$password';";
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
    $valid = true;

    // clean user inputs to prevent sql injections
    $username = trim($_POST['username']);
    $username = strip_tags($username);
    $username = htmlspecialchars($username);

    $password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);

    //username and password validation
    if(empty($username)){
        $response['userError'] = 'empty';
        $valid = false;
    }
    if (empty($password)) {
        $response['passError'] = 'empty';
        $valid = false;
    }

    if($valid == true){
        $response['valid'] = 'success';
    }


    echo json_encode($response);
}

function registerValid($username, $email, $password, $repassword){

    $connection = mysqli_connect("localhost", "root", "", "whoople");
    $response = array();
    $valid = true;

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
        $response['userError'] = 'empty';
        $valid = false;
    }
    if(!empty($username) && strlen($username) < 3) {
        $response['userError'] = 'tooShort';
        $valid = false;
    }
    // check username exist or not
    $query = "SELECT wUser_Username FROM wUser WHERE wUser_Username = '$username'";
    $result = mysqli_query($connection, $query);
    $rows = mysqli_num_rows($result);
    if ($rows != 0) {
        $response['userError'] = 'alreadyUsed';
        $valid = false;
    }


    //email validation
    if (empty($email)) {
        $response['emailError'] = 'empty';
        $valid = false;
    }
    if (!empty($email) && !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
        $response['emailError'] = 'notValid';
        $valid = false;
    }
    // check email exist or not
    $query = "SELECT wUser_Mail FROM wUser WHERE wUser_Mail = '$email'";
    $result = mysqli_query($connection, $query);
    $rows = mysqli_num_rows($result);
    if($rows != 0){
        $response['status'] = 'alreadyUsed';
        $valid = false;
    }

    // password validation
    if (empty($password)){
        $response['passError'] = 'empty';
        $valid = false;
    }
    if(!empty($password) && strlen($password) < 6) {
        $response['passError'] = 'tooShort';
        $valid = false;
    }

    //repassword validation
    if (empty($repassword)){
        $response['repassError'] = "empty";
        $valid = false;
    }
    if(!empty($repassword) && $repassword != $password){
        $response['repassError'] = "notMatching";
        $valid = false;
    }
    if($valid == true){
        $response['valid'] = "success";
    }

    echo json_encode($response);
}

function getWhooples($username)
{
    //TODO CONNECTION aus database.php holen
    $connection = mysqli_connect("localhost", "root", "", "whoople");

    $query = "SELECT wWhoople.wWhoople_Website, wWhoople.wWhoople_AccountName FROM wWhoople, wUser WHERE wUser.wUser_ID = wWhoople.wUser_ID AND wUser.wUser_Username = '$username';";
    $result = mysqli_query($connection, $query);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    echo json_encode($rows);
}

function addWhooples($username, $whoopleName, $accountName, $whoopleLink)
{
    $connection = mysqli_connect("localhost", "root", "", "whoople");
    $response = array();
    $valid = true;

    if(empty($whoopleName)) {
        $response['whoopleNameError'] = 'empty';
        $valid = false;
    }

    if(empty($accountName)) {
        $response['accountNameError'] = 'empty';
        $valid = false;
    }

    if(empty($whoopleLink)) {
        $response['whoopleLinkError'] = 'empty';
        $valid = false;
    }

    if($valid == true) {
        $response['valid'] = 'success';
        $query = "INSERT INTO `wwhoople` (`wWhoople_ID`, `wUser_ID`, `wWhoople_Website`, `wWhoople_AccountName`) VALUES (NULL, '$username', '$whoopleLink', '$whoopleName');";
        mysqli_query($connection, $query);
    }

    echo json_encode($response);
}
?>
<?php
session_start();
require_once('database.php');

// it will never let you open index(login) page if session is set
if (isset($_SESSION['username']) != "") {
    header("Location: dashboard.php");
    exit;
}

$error = false;

// If form submitted, insert values into the database.
if (isset($_POST['username'])) {

    // prevent sql injections/ clear user invalid inputs
    $username = trim($_POST['username']);
    $username = strip_tags($username);
    $username = htmlspecialchars($username);

    $password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);

    if (empty($username)) {
        $error = true;
        $nameError = "Please enter your username.";
    }

    if (empty($password)) {
        $error = true;
        $passError = "Please enter your password.";
    }

    // if there's no error, continue to login
    if (!$error) {

        //$password = hash('sha256', $pass); // password hashing using SHA256

        //Checking is user existing in the database or not
        $query = "SELECT * FROM wUser, wAuthentication WHERE wUser.wAuthentication_ID = wAuthentication.wAuthentication_ID AND wUser_Username = '$username' AND wAuthentication_PW = '$password'";
        $result = mysqli_query($connection, $query);
        $rows = mysqli_num_rows($result);

        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect user to dashboard.php
            header("Location: dashboard.php");
        } else {
            $errMSG = "Username and/or Password incorrect, Try again...";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
<div class="form">
    <h1>Log In</h1>
    <form action="" method="post" name="login">
        <?php if (isset($errMSG)) {
            echo $errMSG;
        } ?>
        <input type="text" name="username" placeholder="Username"/>
        <?php if (isset($nameError)) {
            echo $nameError;
        } ?>
        <input type="password" name="password" placeholder="Password"/>
        <?php if (isset($passError)) {
            echo $passError;
        } ?>
        <input name="submit" type="submit" value="Login"/>
    </form>
</div>
</body>
</html>
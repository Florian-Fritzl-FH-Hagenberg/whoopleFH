<?php

    session_start();
    if( isset($_SESSION['username'])!="" ){
        header("Location: dashboard.php");
    }
    include_once ('database.php');

    $error = false;

    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {

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

        $password2 = trim($_POST['password2']);
        $password2 = strip_tags($password2);
        $password2 = htmlspecialchars($password2);

        // basic name validation
        if (empty($username)) {
            $error = true;
            $nameError = "Please enter a Username.";
        } else if (strlen($username) < 3) {
            $error = true;
            $nameError = "Name must have at least 3 characters.";
        } else if (!preg_match("/^[a-zA-Z ]+$/",$username)) {
            $error = true;
            $nameError = "Name must contain alphabets and space.";
        }

        //basic email validation
        if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $error = true;
            $emailError = "Please enter valid email address.";
        } else {
            // check email exist or not
            $query = "SELECT wUser_Mail FROM wUser WHERE wUser_Mail = '$email'";
            $result = mysqli_query($connection, $query);
            $rows = mysqli_num_rows($result);
            if($rows != 0){
                $error = true;
                $emailError = "Provided Email is already in use.";
            }
        }
        // password validation
        if (empty($password)){
            $error = true;
            $passError = "Please enter password.";
        } else if(strlen($password) < 6) {
            $error = true;
            $passError = "Password must have atleast 6 characters.";
        }

        if (empty($password2)){
            $error = true;
            $pass2Error = "Please enter password again.";
        } else if($password2 != $password){
            $error = true;
            $pass2Error = "Passwords do not match.";
        }

        //$password = hash('sha256', $pass); //password encrypt using SHA256();

            if( !$error ) {
                $query = "INSERT into `wUser` (wUser_Username, wUser_Mail) VALUES ('$username', '$email') AND INSERT INTO `wAuthentication` (wUser_PW) VALUES (md5($password))";
                $result = mysqli_query($connection, $query);

                if ($result) {
                    $errMSG = "Successfully registered, you may login now";
                    unset($username);
                    unset($email);
                    unset($password);
                } else {
                    $errMSG = "Something went wrong, try again later...";
                }
            }

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <div class="form">
        <h1>Registration</h1>
        <form name="registration" action="" method="post">
            <?php if (isset($errMSG)) { echo $errMSG; }?>
            <input type="text" name="username" placeholder="Username" />
            <?php if (isset($nameError)) { echo $nameError; }?>
            <input type="text" name="email" placeholder="E-mail" />
            <?php if (isset($emailError)) { echo $emailError; }?>
            <input type="password" name="password" placeholder="Password" />
            <?php if (isset($passError)) { echo $passError; }?>
            <input type="password" name="password2" placeholder="Retype password" />
            <?php if (isset($pass2Error)) { echo $pass2Error; }?>
            <input type="submit" name="register_submit" value="Register" />
        </form>
    </div>
</body>
</html>
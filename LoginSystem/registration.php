<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('database.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
    // removes backslashes
    //escapes special characters in a string
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($connection,$username);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($connection,$email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($connection,$password);

    $query = "INSERT into `wUser` (wUser_Username, wUser_Mail) VALUES ('$username', '$email') AND INSERT INTO `wAuthentication` (wUser_PW) VALUES (md5($password))";
    $result = mysqli_query($connection,$query);
    if($result){
        echo "<div class='form'>
            <h3>You are registered successfully.</h3>
            <br/>Click here to <a href='login.php'>Login</a></div>";
    }
}else{
    ?>
    <div class="form">
        <h1>Registration</h1>
        <form name="registration" action="" method="post">
            <input type="text" name="username" placeholder="Username" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" name="submit" value="Register" />
        </form>
    </div>
<?php } ?>
</body>
</html>
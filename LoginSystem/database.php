<?php
// Enter your Host, username, password, database below.
$connection = mysqli_connect("localhost","root","","whoople");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>


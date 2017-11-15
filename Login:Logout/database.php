<?php
// Enter your Host, username, password, database below.
$connection = mysqli_connect("webprojects3.fh-hagenberg.at","whoople","#W!H2YoGw81f","whoople","3306");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
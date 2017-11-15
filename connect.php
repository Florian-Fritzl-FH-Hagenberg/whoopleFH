<?php
$servername = "193.170.124.252";
$username = "whoople";
$password = "#W!H2YoGw81f";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
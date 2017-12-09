<?php
//Include this file in every php page demanding an authorised user
session_start();
if(!isset($_SESSION["username"])){
    header("Location: index.php");
    exit();
}
?>
<?php
$key=$_GET['key'];
$array = array();
$connection = mysqli_connect("localhost", "root", "", "whoople");
$query = "SELECT * FROM wuser WHERE wUser_Username LIKE '%{$key}%'";
$result = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($result))
{
    $array[] = $row['wUser_Username'];
}
echo json_encode($array);
?>
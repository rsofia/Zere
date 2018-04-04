<?php
$dbname = "zere";
$username = "root";
$password = "";
$servername = "localhost";

//create connection
$conn= new mysqli($servername,$username,$password,$dbname);
//check connection
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}
?>
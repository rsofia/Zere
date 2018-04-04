<?php
include "DBInclude.php";

$numCasa = $_GET["numcasa"];
$estatus = $_GET["estatus"];

$sql = "UPDATE `disponibilidad` SET `estatus`=".$estatus." WHERE `numcasa`=".$numCasa;
$result = $conn->query($sql);

mysqli_close($conn);
?>
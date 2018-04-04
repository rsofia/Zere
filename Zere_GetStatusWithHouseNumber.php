<?php
include "DBInclude.php";
$numCasa = $_POST['numCasa'];
$sql = "SELECT * FROM disponibilidad WHERE numcasa =".$numCasa;
$result = $conn->query($sql);
$retString = "";
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			$retString = $row['estatus'];
		}
	}
echo $retString;

mysqli_close($conn);
?>
<?php
include "DBInclude.php";

$sql = "SELECT * FROM disponibilidad";
$result = $conn->query($sql);
$retString = "";
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			$retString = $retString.$row['numcasa'].'~'.$row['lote'].'~'.$row['estatus'].'~'.$row['manzana'].'~'.$row['metroscuadrados'].'~'.$row['tipo'].'■';
		}
	}
echo $retString;


mysqli_close($conn);
?>
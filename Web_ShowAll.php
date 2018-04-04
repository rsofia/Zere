<?php
include('header.php');
include "DBInclude.php";
?>

<section class="py-5">
<div class="container">
	<div class="row  text-center" id="casa">
		<div class="col-md-1 text-center"><h5>#</h5></div>
		<div class="col-md-1 text-center"><h5>LOTE</h5></div>
		<div class="col-md-2 text-center"><h5>MANZANA</h5></div>
		<div class="col-md-2 text-center"><h5>PROTOTIPO</h5></div>
		<div class="col-md-2 text-center"><h5>m2</h5></div>
		<div class="col-md-2 text-center"><h5>ESTATUS</h5></div>
	 </div>
<?php
	
	$sql = "SELECT * FROM disponibilidad ORDER BY numcasa";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
	{
		while($row=$result->fetch_assoc())
		{
			$id = $row["id"];
			$numCasa = $row["numcasa"];
			$lote = $row["lote"];
			$manzana = $row["manzana"];
			$metroscuadrados = $row["metroscuadrados"];
			$estatus = $row["estatus"];
			$tipo = $row["tipo"];
			$estado = "";
			
			switch($tipo)
			{
				case 1:
				{$tipo = "PRISMA";}
				break;
				case 2:
				{$tipo = "SCALA";}
				break;
				case 3:
				{$tipo = "HEXA";}
				break;
			}
			
			echo '<div class="row" id="casa">
				  <div class="col-md-1 text-center">'.$numCasa.'</div>
				  <div class="col-md-1 text-center">'.$lote.'</div>
				  <div class="col-md-2 text-center">'.$manzana.'</div>
				  <div class="col-md-2 text-center">'.$tipo.'</div>
				  <div class="col-md-2 text-center">'.$metroscuadrados.' m2</div>
				  <div class="col-md-2 text-center">';
				  switch($estatus)
				  {
					  case 1:
					  {
						  echo '<select name="'.$numCasa.'" onchange="EditarEstatus(this)">
						<option value="1" selected>Disponible</option>
						<option value="2">Apartado</option>						
						<option value="3">Vendido</option>
						</select>';
					  }
					  break;
					  case 2:
					  {
						  echo '<select name="'.$numCasa.'" onchange="EditarEstatus(this)">
						<option value="1">Disponible</option>
						<option value="2" selected>Apartado</option>						
						<option value="3">Vendido</option>
						</select>';
					  }
					  break;
					  case 3:
					  {
						  echo '<select name="'.$numCasa.'" onchange="EditarEstatus(this)">
						<option value="1">Disponible</option>
						<option value="2">Apartado</option>						
						<option value="3" selected>Vendido</option>
						</select>';
					  }
					  break;
				  }
					
			echo '
				  </div>
					</form>
				  </div>
				  <form>';
			
		}
	}

	mysqli_close($conn);
?>
</div> <!-- END CONTAINER -->
</section>

<?php
include('footer.php');
?>

<script>
function EditarEstatus(btn)
{	
	estado = "";
	switch(btn.value)
	{
		case "1":
		estado = "disponible";
		break;
		case "2":
		estado = "apartado";
		break;
		case "3":
		estado = "vendido";
		break;
	}
	if(confirm("¿Estas segur@ de querer cambiar el estado de la casa " + btn.name +  " a " + estado + "?") == true)
	{
		estado = btn.value;
		 $.ajax({
		  type: "GET",
		  url: "ChangeStatus.php",
		  data: { numcasa: btn.name, estatus: estado },		  
		  success: function(data)
		  {
			  location.href = "http://localhost/Zere/Web_ShowAll.php";
		  }
		}); 
	}	
}
</script>
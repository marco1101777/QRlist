<?php 
	 $fechas = scandir("./");
	 $parte = scandir("Parte/"); 
	 $Fechas = array() ;
	function persona($curp , $what){
		$bd = new SQLite3("../../Personas");
		if($what == "nombre"){
			$resultado = $bd->query("SELECT * FROM usuarios WHERE curp='$curp'");
			$nombre = $resultado->fetcharray();
			return $nombre['nombre'] ;

		}
	}
	function check($curp , $dia ){
		return file_exists($dia."/".$curp) ;
	}


?>

<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>lista</title>
	<style>
		.yes{
			background: green;
		}
		.no{
			background: red ;
		}
		.fecha{
			font-size: 10px;
		}
	</style>
</head>
<body>
	<div class="all">
		<table border="1">
			<tr>
				<td>Nombre</td>
				<?php 
					foreach($fechas as $fech){
						if($fech != "." && $fech != ".." && $fech != "Parte" && $fech != "index.php"){
							echo "<td class='fecha'>".$fech."</td>";
							array_push($Fechas, $fech)	;
						}
						
					}
				?>
			</tr>
			<?php
				foreach ($parte as $value ) {
					if($value != "." && $value != ".." ){
						echo "<tr>" ;
						echo "<td>".persona($value,"nombre")."</td>";
						foreach ($Fechas as $key ) {
							if(check($value,$key)){
								echo "<td class='yes'></td>" ;
							}else{
								echo "<td class='no'></td>" ;
							}
						}

						echo "</tr>";
					}
					// code...
				}
			?>
		</table>
		
	</div>

</body>
</html>
<?php 
	
if($_POST['nuevo']){
	 $db = new SQLite3('Personas');
	 $nombre = $_POST['Nombre'];
	 $Curp = $_POST['curp'] ;
	 $registro = $db->exec("INSERT INTO usuarios VALUES(NULL,'$nombre','$Curp');");

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<div class="all">
		<form action="#" method="post" id="r">
			<input type="text" name="Nombre" placeholder="NOMBRE"><br>
			<input type="text" name="curp" placeholder="Curp"><br>
			<input type="submit" value="Registrar"><br>
			<input type="reset" value="Cancelar"><br>
		</form>
		<form action="#" method="post" id="e">
			<input type="text" name="Nombre" id=""><br>
			<input type="submit" value="Buscar">
			<div class="info"></div>
			input:
		</form>

	</div>

	
</body>
</html>
<?php 
	$bd = new SQLite3("Personas");

	$resultado = $bd->query("SELECT * FROM usuarios ");

	echo "<table border=1>" ;
	echo "<tr><td>id</td><td>nombre</td><td>curp</td></tr>" ;
	while($row = $resultado->fetcharray()){
		echo "<tr><td>".$row['id']."</td><td>".$row['nombre']."</td><td>".$row['curp']."</td></tr>" ;
	}
	echo "</table>";
	

?>
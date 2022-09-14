<?php 
	$listas = scandir("list/") ;
?>
<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body{
			background: #718c8d;
			border:2px solid black;
			height: 100vh;
			display:flex;
			justify-content: center;
			align-items: center;
			
		}
		.all{
			border:2px solid transparent;
			width: 40%;
			height: 50%;
			display: block;
			
		}
		.listas{
			background: black;
			position: relative ;
    		height: 0px;
    		transition: height 0.2s linear;
    		overflow: hidden;
		}
		.primero{
			border:2px solid transparent;
			background: black;
			width: 100%;
			height: 40px;
		}
		.primero:hover .listas{
			height: <?php echo (count($listas)*30)-50;?>px;

		}
		.baja{
			padding-top: 6px;
			margin-left:3px ;
			text-align: center;
			transform: rotate(0deg);
			transition: transform 0.7s;
		}
		.primero:hover .baja{
			transform: rotate(180deg);
		}
		
		.titulo{
			border:2px solid transparent;
			justify-content: center;
			text-align: center;
			height: 35px;
			display: flex;
			
		}
		.ls{
			color: white;
			background: #686868;
			padding-right: 5px;
			padding-left: 5px;
			cursor: pointer ;
			opacity: 1;
			height: 35px;
			display:flex;
			justify-content: center;
			align-items: center;
			transition: opacity 1s;
		}
		.ls:hover{
			opacity: 0.5;
		}
	
		.opc{
			border:2px solid transparent;
			width: 100%;
			height: 35px;
			color: white;
			background: black;
			border-top: 1px solid #686868;
			border-left:2px solid transparent ;
			cursor: pointer;
			transition: color 1s ,border-left 1s;
			display:flex;
			justify-content: center;
			align-items: center;
		}
		.opc:hover{
			color:#bebebe;
			border-left: 2px solid #00f3ff;
		}
	</style>
	<script>
		function goTo(href){
			window.location.assign(href);
		}
	</script>
</head>
<body>
	<div class="all">
		<div class="primero" >
			<div class="titulo" style="color:white;">Abrir Listas <div style="color:white;" class="baja"><strong>^</strong></div></div>
			<div class="listas" >
				<?php 
					foreach ($listas as $key) {
						if($key != "." && $key != ".."){
							echo  "<div class='ls' onclick=goTo('list/".$key."')>".$key."</div>";	
						}
					}
				?>
			</div>

		</div>
		
		<div class="opc" onclick="goTo('registro.php')">
			Registrar / Eliminar
		</div>
		
		<div class="opc" onclick="goTo('Buscar.php')">
			Buscar / Actualizar 
		</div>
		
	</div>
	
</body>
</html>
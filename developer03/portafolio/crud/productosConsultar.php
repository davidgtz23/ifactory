<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <title>Actividad Uno</title>
        <script type="text/javascript" src="librerias/js2/jquery-1.4.2.min.js"></script>
   	 	<script type="text/javascript" src="librerias/js2/jquery-ui-1.8.2.custom.min.js"></script>
  	</head>
  	<body>
		<h1>Plan de Entrenamiento Ifactory - Actividad Uno</h1>
		<table border="1">
			<tr>
				<td><a href="index.php">Alta Producto</a></td>
				<td><a href="productosConsultar.php"><strong>Consultar Productos</strong></a></td>
			</tr>
		</table>
		<hr>
		<h2>Consulta de Productos</h2>
		<?php
			include 'Productos.php';
			$objProductos = new Productos();
			$objProductos->consultarProducto();
		?>	
  	</body>
</html>
 
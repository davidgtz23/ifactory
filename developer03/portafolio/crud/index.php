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
				<td><a href="index.php"><strong>Alta Producto</strong></a></td>
				<td><a href="productosConsultar.php">Consultar Productos</a></td>
			</tr>
		</table>
		<hr>
		<h2>Alta de Prductos</h2>
		<form action='productosAlta.php' method='POST' name='formu' id='formu' target='_self'>
			<label>Producto:</label>
			<input type='text' name='producto' required>
			<br/>
			<label>Fecha de Creación:</label>
			<input type='text' name='producto' value='<?php echo date("d/m/Y"); ?>' disabled>
			<br/>
			<label>Estado:</label>
			<?php
				if ($estado == 1) 
				{
      				echo "<input type='radio' name='estado' value='1' checked>Activo
						<input type='radio' name='estado' value='0'>Inactivo";
      			}
      			else
      			{
      				echo "<input type='radio' name='estado' value='1'>Activo
						<input type='radio' name='estado' value='0'>Inactivo";
      			}
			?>
			<br/>
			<input type='submit' name='insertar' value='Insertar'>	
		</form>
		<!-- Ajax -->
      	<div id="ajax"></div>
      	<script type="text/javascript">
      		$(function (e) {
	            $('#formu').submit(function (e) {
	          		e.preventDefault()
	          		$('#ajax').load('productosCrud.php?accion=alta&' + $('#formu').serialize())
	            })
      		})
      	</script>	
  	</body>
</html>
 
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
		<h2>Modificar Prducto</h2>
		<?php
			include "librerias/conexion.php";
			$id_producto = $_REQUEST['id_producto'];
      		//creamos y ejecutamos la consulta
	     	$sql="SELECT * FROM productos WHERE id_producto=$id_producto";
		    $consulta=mysql_query($sql)or die("Error de consulta");

      		$id_producto=mysql_result($consulta,0,'id_producto');
      		$producto=mysql_result($consulta,0,'producto');
      		$estado=mysql_result($consulta,0,'estado');
      		$fecha_creacion=mysql_result($consulta,0,'fecha_creacion');
		?>
		<form action='productosModificar.php' method='POST' name='formu' id='formu' target='_self'>
			<label>Id Producto:</label>
			<input type='text' name='id_producto' value='<?php echo $id_producto ?>' disabled>
			<input type='hidden' name='id_producto' value='<?php echo $id_producto ?>'>
			<br>
			<label>Producto:</label>
			<input type='text' name='producto' value='<?php echo $producto ?>' required>
			<br/>
			<label>Fecha de Creación:</label>
			<input type='text' name='producto' value='<?php echo $fecha_creacion ?>' disabled>
			<br/>
			<label>Fecha de Modificación:</label>
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
						<input type='radio' name='estado' value='0' checked>Inactivo";
      			}
			?>
			<br>
			<input type='submit' name='insertar' value='Modificar'>			
		</form>
		<!-- Ajax -->
      	<div id="ajax"></div>
      	<script type="text/javascript">
      		$(function (e) {
	            $('#formu').submit(function (e) {
	          		e.preventDefault()
	          		$('#ajax').load('productosCrud.php?accion=modificar&' + $('#formu').serialize())
	            })
      		})
      	</script>	
  	</body>
</html>
 
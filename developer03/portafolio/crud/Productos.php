<?php
  //incluimos la conexion a la base de datos
  include "librerias/conexion.php";

  //Creamos la clase productos
  class Productos
  {
      //creamos la funcion para dar de alta un alumno
      public function insertarProducto($producto, $estado)
      {
          //creamos y ejecutamos la consulta de inserción
          $sql = "INSERT INTO productos (producto, fecha_creacion, fecha_actualizacion, estado)
            VALUES ('$producto', NOW(), NOW(), '$estado')";
          $consulta=mysql_query($sql)or die("Error de consulta de insercion");
      }

      //Creamos la funcion para consultar un producto
      public function consultarProducto()
      {
          //creamos y ejecutamos la consulta
          $sql="SELECT * FROM productos";
          $consulta=mysql_query($sql)or die("Error de consulta");
          $filas=mysql_num_rows($consulta);

          //si la consulta regresa registros, los mostramos en una tabla
          if ($filas != 0)
          {
              echo "<table border=1>
              <thead>
                <tr>
                  <th>Id producto</th>
                  <th>Producto</th>
                  <th>Fecha de Creación</th>
                  <th>Fecha de Actualización</th>
                  <th>Estado</th>
                  <th colspan=2>Acciones</th>
                </tr>
              </thead>
              <tbody>";

              for($y=0;$y<$filas;$y++)
              {
                  $id_producto=mysql_result($consulta,$y,'id_producto');
                  $producto=mysql_result($consulta,$y,'producto');
                  $fecha_creacion=mysql_result($consulta,$y,'fecha_creacion');
                  $fecha_actualizacion=mysql_result($consulta,$y,'fecha_actualizacion');
                  $estado=mysql_result($consulta,$y,'estado');
                  echo " <tr>
                  <td>$id_producto</td>
                  <td>$producto</td>
                  <td>$fecha_creacion</td>
                  <td>$fecha_actualizacion</td>";
                  if ($estado == 1) {
                    echo "<td>Activo</td>";
                  }
                  else
                  {
                    echo "<td>Inactivo</td>";
                  }
                  echo "<td><a href='productosCrud.php?id_producto=$id_producto&accion=eliminar'>Eliminar</a></td>
                  <td><a href='productosModificar.php?id_producto=$id_producto'>Modificar</a></td>
                </tr>";
              }
              echo "</tbody></table></div>";
          }
          else
          {
              echo "<div>No Existen Registros</div>";
          }
      }

      //creamos la funcion para eliminar un alumno
      public function  eliminarProducto($id_producto)
      {
          //creamos y ejecutamos la consulta
          $sql = "UPDATE productos
            SET estado=0
            WHERE id_producto=$id_producto";
          $consulta=mysql_query($sql)or die("Error de consulta de eliminacion");
      }

      //creamos la funcion para modificar un alumno
      public function modificarProducto($id_producto, $producto, $estado)
      {
          //creamos y ejecutamos la consulta
          $sql="UPDATE productos
            SET producto='$producto', estado='$estado', fecha_actualizacion=NOW()
            WHERE id_producto=$id_producto";
          $consulta=mysql_query($sql)or die("Error de consulta de modificacion");
      }
  }
?>
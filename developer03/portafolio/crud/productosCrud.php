<?php
  //incluimos la clase productos y creamos un nuevo objeto de tipo productos
  include 'Productos.php';
  $objProductos = new Productos();

  //Verificamos si se llama a la accion alta y ejecutamos
  if($_REQUEST['accion'] == "alta")
  { 
    //mandamos llamar el metodo para insertar un producto y enviamos los siguientes atributos
    $objProductos ->insertarProducto(
    $_REQUEST['producto'],
    $_REQUEST['estado']);
    echo "<script>alert('EL REGISTRO SE INSERTO CORRECTAMENTE')</script>";
    $objProductos ->consultarProducto();
  } 

  //Verificamos si se llama a la accion eliminar y ejecutamos
  if($_REQUEST['accion'] == "eliminar")
  {
    //mandamos llamar el metodo para elimnar un producto
    $objProductos ->eliminarProducto($_REQUEST['id_producto']);
    echo "<script>alert('EL REGISTRO SE DESACTIVO')</script>";
    echo "<script>window.location.replace('productosConsultar.php')</script>";
  }  

  //Verificamos si se llama a la accion modificar y ejecutamos
  if($_REQUEST['accion'] == "modificar")
  {
      //mandamos llamar el metodo para modificar un producto y enviamos los siguientes atributos
      $objProductos ->modificarProducto(
      $_REQUEST['id_producto'],
      $_REQUEST['producto'],
      $_REQUEST['estado']);

    echo "<script>alert('EL REGISTRO SE MODIFICO CORRECTAMENTE')</script>";
    echo "<script>window.location.replace('productosConsultar.php')</script>";
  }  
?>
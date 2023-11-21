<?php
require "conecta.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   if (isset($_POST['accion'])) {
      $accion = $_POST['accion'];

      // Según la acción, ejecutar la función correspondiente
      switch ($accion) {
         case 'registrar_lector':
            registrarLector($conexion);
            break;
         case 'realizar_prestamo':
            realizarPrestamo($conexion);
            break;
         case 'añadirLibro':
            añadirLibro($conexion);
            break;
         case 'devolver_prestamo':
            devolverPrestamo($conexion);
            break;
         case 'consultar_prestamos':
            consultarPrestamos($conexion);
            break;
         case 'eliminarLector':
            eliminarLector($conexion);
            break;
         default:
            break;
      }
   }
}

function registrarLector($conexion)
{
   $lector = $_POST['nombre_registrar'];
   $DNI = $_POST['DNI_registrar'];

   $sql = "INSERT INTO lectores (lector, DNI) VALUES ('$lector', '$DNI')";
   // Ejecutar la consulta
   mysqli_query($conexion, $sql) or die("Error al insertar datos");
   // Cerrar la conexión

}

function realizarPrestamo($conexion)
{
   $nombreLector = $_POST['nombre_lector_prestamo'];
   $nombreLibro = $_POST['nombre_libro_prestamo'];

   $sql = "SELECT estado FROM lectores WHERE lector = '$nombreLector'";
   $resultado = mysqli_query($conexion, $sql) or die("Error al select datos");

   // Verificar si se obtuvo un resultado
   if ($resultado) {
      $fila = mysqli_fetch_assoc($resultado);
      $estado = $fila['estado'];

      if ($estado == "alta") {

         // Obtener el ID del libro
         $sql1 = "SELECT id FROM libros WHERE nombre = '$nombreLibro'";
         $resultado1 = mysqli_query($conexion, $sql1) or die("Error al select datos");
         $fila1 = mysqli_fetch_assoc($resultado1);
         $id_libro = $fila1['id'];

         // Obtener el ID del lector
         $sql2 = "SELECT id FROM lectores WHERE lector = '$nombreLector'";
         $resultado2 = mysqli_query($conexion, $sql2) or die("Error al select datos");
         $fila2 = mysqli_fetch_assoc($resultado2);
         $id_lector = $fila2['id'];

         // Realizar la inserción en la tabla prestamo
         $insert = "INSERT INTO prestamo (id_lector, id_libro) VALUES ('$id_lector', '$id_libro')";
         mysqli_query($conexion, $insert) or die("Error al insertar datos");

         $sql3 = "UPDATE lectores SET n_prestado = n_prestado + 1 WHERE id = '$id_lector'";
         mysqli_query($conexion, $sql3) or die("Error al cambiar datos");

         $sql4 = "UPDATE libros SET n_disponibles = n_disponibles - 1 WHERE id = '$id_libro'";
         mysqli_query($conexion, $sql4) or die("Error al cambiar datos");

         $conexion->close();
         echo "Prestamo realizado con éxito.";
      } else {
         echo "El lector con nombre esta dado de baja y no puede realizar un prestamo.";
      }
   }
}


function añadirLibro($conexion)
{
   $nombre = $_POST['nombre'];
   $autor = $_POST['autor'];
   $publicacion = $_POST['publicacion'];
   $isbn = $_POST['isbn'];
   $sinopsis = $_POST['sinopsis'];
   $n_disponibles = $_POST['n_disponibles'];
   $n_totales = $_POST['n_totales'];
   $sql = "INSERT INTO libros (nombre, autor, publicacion, isbn, sinopsis, n_disponibles, n_totales) VALUES ('$nombre', '$autor', '$publicacion', '$isbn', '$sinopsis', '$n_disponibles', '$n_totales')";
   mysqli_query($conexion, $sql) or die("Error al insertar los datos");
   $conexion->close();
}
function consultarCatalogo($conexion)
{
   //Aquí tengo que hacer un select para coger todos los datos y guardarlos en un array
   $sql = "SELECT * FROM libros";
   $resultado = mysqli_query($conexion, $sql);
   $row = mysqli_fetch_assoc($resultado);
   $nombre = $row['nombre'];
   echo "hola";
}

function eliminarLector($conexion)
{
   $nombre = $_POST['nombre'];

   // Verificar si el lector tiene préstamos
   $sqlVerificarPrestamos = "SELECT COUNT(*) AS num_prestamos FROM prestamo WHERE id_lector = (SELECT id FROM lectores WHERE lector = '$nombre')";
   $resultVerificarPrestamos = mysqli_query($conexion, $sqlVerificarPrestamos);

   if ($resultVerificarPrestamos) {
      $row = mysqli_fetch_assoc($resultVerificarPrestamos);
      $numPrestamos = $row['num_prestamos'];

      if ($numPrestamos > 0) {
         // El lector tiene préstamos, no se puede dar de baja
         echo "El lector tiene libros en préstamo y no se puede dar de baja.";
      } else {
         // El lector no tiene préstamos, puedes darlo de baja
         $sqlDarDeBaja = "DELETE FROM lectores WHERE lector = '$nombre'";
         $resultDarDeBaja = mysqli_query($conexion, $sqlDarDeBaja);

         if ($resultDarDeBaja) {
            echo "Lector dado de baja exitosamente.";
         } else {
            echo "Error al dar de baja al lector.";
         }
      }
   } else {
      echo "Error al verificar préstamos del lector.";
   }


   $conexion->close();
}

function devolverPrestamo($conexion)
{
   $nombreLector = $_POST['nombre_lector_devolver'];
   $nombreLibro = $_POST['nombre_libro_devolver'];

   // Obtener el ID del libro
   $sql1 = "SELECT id FROM libros WHERE nombre = '$nombreLibro'";
   $resultado1 = mysqli_query($conexion, $sql1) or die("Error al select datos");
   $fila1 = mysqli_fetch_assoc($resultado1);
   $id_libro = $fila1['id'];

   // Obtener el ID del lector
   $sql2 = "SELECT id FROM lectores WHERE lector = '$nombreLector'";
   $resultado2 = mysqli_query($conexion, $sql2) or die("Error al select datos");
   $fila2 = mysqli_fetch_assoc($resultado2);
   $id_lector = $fila2['id'];

   // Realizar la eliminación en la tabla prestamo (asumiendo que cada préstamo es único)
   $delete = "DELETE FROM prestamo WHERE id_lector = '$id_lector' AND id_libro = '$id_libro'";
   mysqli_query($conexion, $delete) or die("Error al eliminar datos");

   // Actualizar las cantidades
   $sql3 = "UPDATE lectores SET n_prestado = n_prestado - 1 WHERE id = '$id_lector'";
   mysqli_query($conexion, $sql3) or die("Error al cambiar datos");

   $sql4 = "UPDATE libros SET n_disponibles = n_disponibles + 1 WHERE id = '$id_libro'";
   mysqli_query($conexion, $sql4) or die("Error al cambiar datos");

   $conexion->close();
}

function consultarPrestamos($conexion)
{
   $nombreLector = $_POST['nombre'];
   $sql = "SELECT id_libro FROM prestamo WHERE id_lector = (SELECT id FROM lectores WHERE '$nombreLector' = lector)";

   $id_libros = mysqli_query($conexion, $sql) or die("Error al seleccionar datos");
   $nombre_libro = [];  // Cambiado a un array para almacenar nombres de libros

   echo "buenas tardes";
   while ($id_libro = mysqli_fetch_assoc($id_libros)) {
      // $id_libro es un array asociativo con la clave 'id_libro'
      $id_libro_actual = $id_libro['id_libro'];

      $sql1 = "SELECT nombre FROM libros WHERE id = '$id_libro_actual'";
      $resultado1 = mysqli_query($conexion, $sql1) or die("Error al select datos");
      $fila2 = mysqli_fetch_assoc($resultado1);

      $nombre = $fila2['nombre'];
      array_push($nombre_libro, $nombre);
      echo $nombre_libro;
   }

   // Aquí puedes usar $nombre_libro como desees, por ejemplo, imprimirlo o devolverlo.
   print_r($nombre_libro);
}

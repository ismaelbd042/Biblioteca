<?php
require "conecta.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   if (isset($_POST['accion'])) {
      $accion = $_POST['accion'];

      // Según la acción, ejecutar la función correspondiente
      switch ($accion) {
         case 'registrar_lector':
            registrarLector($conexion); // Pasar $conexion como argumento
            break;
         case 'realizar_prestamo':
            realizarPrestamo($conexion); // Pasar $conexion como argumento
            break;
         case 'añadirLibro':
            añadirLibro($conexion);
            break;
         case 'realizar_prestamo':
            devolverPrestamo($conexion); // Pasar $conexion como argumento
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

function devolverPrestamo()
{
}

<?php
require "conecta.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   if (isset($_POST['accion'])) {
      $accion = $_POST['accion'];

      // Según la acción, ejecutar la función correspondiente
      switch ($accion) {
         case 'registrar_lector':
            registrar_lector($conexion); // Pasar $conexion como argumento
            break;
         case 'realizar_prestamo':
            realizar_prestamo($conexion); // Pasar $conexion como argumento
            break;
         case 'añadirLibro':
            añadirLibro($conexion);
            break;
         default:
            break;
      }
   }
}

function registrar_lector($conexion)
{
   $lector = $_POST['nombre_registrar'];
   $DNI = $_POST['DNI_registrar'];
   $n_prestado = $_POST['n_prestado_registrar'];

   $sql = "INSERT INTO lectores (lector, DNI, n_prestado) VALUES ('$lector', '$DNI', '$n_prestado')";
   // Ejecutar la consulta
   mysqli_query($conexion, $sql) or die("Error al insertar datos");
   // Cerrar la conexión
   $conexion->close();
}

function realizar_prestamo($conexion)
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
function consultarCatalogo()
{
   //Aquí tengo que hacer un select para coger todos los datos y guardarlos en un array
}
function eliminarLector()
{
   $nombre = $_POST['nombre'];
   $sql = "DELETE FROM lectores WHERE nombre = '$nombre'";
}

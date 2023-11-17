<?php
require_once "conecta.php";

$libros = "CREATE TABLE IF NOT EXISTS libros (
   id INT AUTO_INCREMENT PRIMARY KEY,
   nombre VARCHAR(50) NOT NULL,
   autor VARCHAR(50) NOT NULL,
   publicacion DATE NOT NULL,
   ISBN VARCHAR(13) NOT NULL,
   sinopsis VARCHAR(500) NOT NULL,
   n_disponibles INT NOT NULL,
   n_totales INT NOT NULL,
)";

// Creamos tabla lectores con sus respectivos campos
$lectores = "CREATE TABLE IF NOT EXISTS lectores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lector VARCHAR(100) NOT NULL,
    DNI VARCHAR(9) NOT NULL,
    estado VARCHAR(30) NOT NULL,
    n_prestado INT NOT NULL,
)";

// Crear tabla prestamo
$prestamo = "CREATE TABLE IF NOT EXISTS prestamo (
    id_lector INT,
    id_libro INT,
)";
mysqli_query($conexion, $libros) or die("Error al crear la tabla libros: ");
mysqli_query($conexion, $lectores) or die("Error al crear la tabla lectores: ");
mysqli_query($conexion, $prestamo) or die("Error al crear la tabla prestamo: ");


$insertar_incidencia = "INSERT INTO libros (nombre, tipo_usuario, fecha, tipo_incidencia, descripcion, imagen_path)
                            VALUES ('$nombre', '$tipo_usuario', '$fecha', '$tipo_incidencia', '$descripcion', '$ruta_imagen')";
mysqli_close($conexion);

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

mysqli_close($conexion);

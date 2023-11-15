<?php
require_once "conecta.php";

// Creamos tabla lectores con sus respectivos campos
$lectores = "CREATE TABLE IF NOT EXISTS lectores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lector VARCHAR(100) NOT NULL,
    DNI VARCHAR(9) NOT NULL,
    estado VARCHAR(30) NOT NULL,
    n_prestado INT NOT NULL,
)";
$conn->query($sql_lectores);

// Crear tabla prestamo
$prestamo = "CREATE TABLE IF NOT EXISTS prestamo (
    id_lector INT,
    id_libro INT,
)";
$conn->query($sql_lectores);

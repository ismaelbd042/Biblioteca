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

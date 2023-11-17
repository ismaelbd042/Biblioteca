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
   n_totales INT NOT NULL
)";

// Creamos tabla lectores con sus respectivos campos
$lectores = "CREATE TABLE IF NOT EXISTS lectores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lector VARCHAR(100) NOT NULL,
    DNI VARCHAR(9) NOT NULL,
   estado ENUM('alta', 'baja') DEFAULT 'alta',
    n_prestado INT NOT NULL
)";

// Crear tabla prestamo
$prestamo = "CREATE TABLE IF NOT EXISTS prestamo (
    id_lector INT,
    id_libro INT
)";

mysqli_query($conexion, $libros) or die("Error al crear la tabla libros");
mysqli_query($conexion, $lectores) or die("Error al crear la tabla lectores");
mysqli_query($conexion, $prestamo) or die("Error al crear la tabla prestamo");


$insertar_clientes_iniciales = "INSERT INTO lectores (lector, DNI, estado, n_prestado)
                                 VALUES ('Pablo', '54242131N', 'alta', '2'),
                                 ('Ismael', '02571143L', 'alta', '1')";

$insertar_prestamo_inicial = "INSERT INTO prestamo (id_lector, id_libro)
                                 VALUES ('1', '2'),
                                 ('2', '1')";

$insertar_libros_iniciales = "INSERT INTO libros (nombre, autor, publicacion, ISBN, sinopsis, n_disponibles, n_totales)
                            VALUES ('El ingenioso hidalgo don Quijote de la Mancha', 'Miguel de Cervantes', '1605', '9788408061052', 
                            'El ingenioso hidalgo don Quijote de la Mancha narra las aventuras de Alonso Quijano, un hidalgo pobre que de tanto 
                            leer novelas de caballería acaba enloqueciendo y creyendo ser un caballero andante, nombrándose a sí mismo como don 
                            Quijote de la Mancha.', '14', '20'), ('Clean Code', 'Robert C. Martin', '2008', '9780132350884', 
                            'Este libro es un referente para todos los programadores del mundo. Explica conceptos para mejorar la 
                            escritura del código, muestra casos de uso, contiene múltiples ejemplos de conversión de código y todo desde 
                            un punto de vista de un programador profesional.', '3', '5')";


mysqli_query($conexion, $insertar_libros_iniciales) or die("Error al insertar los primeros libros.");
mysqli_query($conexion, $insertar_clientes_iniciales) or die("Error al insertar los clientes iniciales");
mysqli_query($conexion, $insertar_prestamo_inicial) or die("Error al insertar los prestamos iniciales");

mysqli_close($conexion);

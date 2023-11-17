<?php
require_once "conecta.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];

        // Según la acción, ejecutar la función correspondiente
        switch ($accion) {
            case 'registrar_lector':
                registrar_lector($conexion); // Pasar $conexion como argumento
                break;
            default:
                break;
        }
    }
}

function registrar_lector($conexion)
{
    $nombre = $_POST['nombre_registrar'];
    $DNI = $_POST['DNI_registrar'];
    $n_prestado = $_POST['n_prestado_registrar'];

    $sql = "INSERT INTO lectores (nombre, DNI, n_prestado) VALUES ('$nombre', '$DNI', '$n_prestado')";
    // Ejecutar la consulta
    mysqli_query($conexion, $sql) or die("Error al insertar datos");
    // Cerrar la conexión
    $conexion->close();
    // header("Location: index.html");
    // exit();
}

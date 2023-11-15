<?php
// Establecemos la conexión con BD:
$servidor = "localhost";
$usuario = "root";
$password = "";
$conexion = mysqli_connect($servidor, $usuario, $password) or die("Error de conexión");
mysqli_select_db($conexion, "usuarios");

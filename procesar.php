<?php
require_once "conecta.php";
require_once "crea_tablas.php";

function registrar_lector()
{
   $nombre = $_POST['nombre_registrar'];
   $DNI = $_POST['DNI_registrar'];
   $n_prestado = $_POST['n_prestado_registrar'];
}

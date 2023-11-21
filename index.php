<!-- Autores: Ismael Bodas y Pablo Naranjo -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="script.js"></script>
    <title>Biblioteca</title>
</head>

<body>
    <h1>Biblioteca</h1>
    <button onclick="mostrarFormularioRegistrar()">Registrar</button>
    <button onclick="mostrarFormularioRealizarPrestamo()">Realizar prestamo</button>
    <button onclick="mostrarFormularioDevolverPrestamo()">Devolver prestamo</button>
    <button onclick="mostrarFormularioAñadirLibro()">Añadir libro</button>
    <button onclick="mostrarFormularioDarDeBaja()">Dar de baja</button>
    <button onclick="mostrarFormularioConsultarCatalogo()">Consultar catálogo</button>
    <button onclick="mostrarFormularioConsultarPrestamos()">Consultar prestamos</button>
    <br>
    <?php
    include "procesar.php";
    ?>
    <form action=" <?php echo $_SERVER['PHP_SELF']; ?>" id="registrar" method="post" style="display: none">
        <label for="nombre_registrar">Nombre y apellidos</label>
        <input type="text" name="nombre_registrar" id="nombre_registrar" />

        <label for="DNI_registrar">DNI</label>
        <input type="text" name="DNI_registrar" id="DNI_registrar" />

        <label for="n_prestado_registrar">Número prestado</label>
        <input type="text" name="n_prestado_registrar" id="n_prestado_registrar" />

        <input type="hidden" id="action" name="accion" value="registrar_lector">
        <button type="submit" onclick="esconderFormularioRegistrar(); registrar_lector()" id="btn_registrar">
            Registrar
        </button>
    </form>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="realizar_prestamo" method="post" style="display: none">
        <label for="nombre_libro_prestamo">Nombre del libro</label>
        <input type="text" name="nombre_libro_prestamo" id="nombre_libro_prestamo" />

        <label for="nombre_lector">Nombre del lector</label>
        <input type="text" name="nombre_lector_prestamo" id="nombre_lector_prestamo" />

        <input type="hidden" id="action" name="accion" value="realizar_prestamo">
        <button type="submit" onclick="esconderFormularioRealizarPrestamo(); realizar_prestamo();" id="btn_realizar_prestamo">
            Realizar Préstamo
        </button>
    </form>
</body>

</html>
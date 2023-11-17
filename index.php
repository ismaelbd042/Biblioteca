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
    <button onclick="mostrarFormulario()" id="btn_registrar">Registrar</button>
    <button>Realizar prestamo</button>
    <button>Devolver prestamo</button>
    <button>Añadir libro</button>
    <button>Dar de baja</button>
    <button>Consultar catálogo</button>
    <button>Consultar prestamos</button>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="registrar" method="post" style="display: none">
        <?php
        include "procesar.php";
        ?>
        <label for="nombre_registrar">Nombre y apellidos</label>
        <input type="text" name="nombre_registrar" id="nombre_registrar" />

        <label for="DNI_registrar">DNI</label>
        <input type="text" name="DNI_registrar" id="DNI_registrar" />

        <label for="n_prestado_registrar">Número prestado</label>
        <input type="text" name="n_prestado_registrar" id="n_prestado_registrar" />

        <input type="hidden" id="action" name="accion" value="registrar_lector">
        <button type="submit" onclick="esconderFormulario(); registrar_lector()" id="btn_registrar">
            Registrar
        </button>
    </form>
</body>

</html>
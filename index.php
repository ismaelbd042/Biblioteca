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


    <?php
    require_once "crea_tablas.php";
    ?>
    <h1>Biblioteca</h1>
    <button onclick="mostrarFormularioRegistrar()">Registrar</button>
    <button onclick="mostrarFormularioRealizarPrestamo()">Realizar prestamo</button>
    <button onclick="mostrarFormularioDevolverPrestamo()">Devolver prestamo</button>
    <button onclick="mostrarFormularioAñadir()">Añadir libro</button>
    <button onclick="mostrarFormularioDarDeBaja()">Dar de baja</button>
    <button onclick="mostrarCatalogo()">Consultar catálogo</button>
    <button onclick="mostrarFormularioConsultarPrestamos()">Consultar prestamos</button>
    <br>
    <?php
    require "procesar.php";
    ?>
    <form action=" <?php echo $_SERVER['PHP_SELF']; ?>" id="registrar" method="post" style="display: none">
        <label for="nombre_registrar">Nombre y apellidos</label>
        <input type="text" name="nombre_registrar" id="nombre_registrar" />

        <label for="DNI_registrar">DNI</label>
        <input type="text" name="DNI_registrar" id="DNI_registrar" />

        <input type="hidden" id="action" name="accion" value="registrar_lector">
        <button type="submit" onclick="esconderFormularioRegistrar(); registrarLector()" id="btn_registrar">
            Registrar
        </button>
    </form>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="realizar_prestamo" method="post" style="display: none">
        <label for="nombre_libro_prestamo">Nombre del libro</label>
        <input type="text" name="nombre_libro_prestamo" id="nombre_libro_prestamo" />

        <label for="nombre_lector_prestamo">Nombre del lector</label>
        <input type="text" name="nombre_lector_prestamo" id="nombre_lector_prestamo" />

        <input type="hidden" id="action" name="accion" value="realizar_prestamo">
        <button type="submit" onclick="realizarPrestamo();" id="btn_realizar_prestamo">
            Realizar Préstamo
        </button>
    </form>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="realizar_prestamo" method="post" style="display: none">
        <label for="nombre_libro_prestamo">Nombre del libro</label>
        <input type="text" name="nombre_libro_prestamo" id="nombre_libro_prestamo" />

        <label for="nombre_lector_prestamo">Nombre del lector</label>
        <input type="text" name="nombre_lector_prestamo" id="nombre_lector_prestamo" />

        <input type="hidden" id="action" name="accion" value="realizar_prestamo">
        <button type="submit" onclick="devolverPrestamo();" id="btn_realizar_prestamo">
            Devolver Préstamo
        </button>
    </form>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="añadir" style="display: none">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre">
        <label for="autor">Autor: </label>
        <input type="text" name="autor" id="autor">
        <label for="publicacion">Publicación: </label>
        <input type="date" name="publicacion" id="publicacion">
        <label for="isbn">ISBN: </label>
        <input type="text" name="isbn" id="isbn">
        <label for="sinopsis">Sinopsis</label>
        <textarea name="sinopsis" id="sinopsis" cols="30" rows="10"></textarea>
        <label for="n_disponibles">Número de libros disponibles</label>
        <input type="number" name="n_disponibles" id="n_disponibles">
        <label for="n_totales">Número de libros en total</label>
        <input type="number" name="n_totales" id="n_totales">
        <input type="hidden" id="action" name="accion" value="añadirLibro">
        <input type="submit" onclick="esconderFormularioAñadir(); añadirLibro()" id="btn_añadir" value="Añadir">
    </form>
    <div style="display: none" id="catalogo">
        <h2>Catálogo</h2>
        <?php
        //Aquí tengo que hacer un foreach para recorrer el array e imprimir cada iteración
        ?>
        <button type="submit" onclick="" id="btn_volver">Volver a la página</button>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="eliminar" style="display: none">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <input type="submit" value="Eliminar">
    </form>
</body>

</html>
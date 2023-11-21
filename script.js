// Ejecutar procesa.php al cargar la página
// Declara una variable global para realizar un seguimiento del estado

document.addEventListener("DOMContentLoaded", function () {});

//Registrar
function mostrarFormularioRegistrar() {
  var formulario = document.getElementById("registrar");
  formulario.style.display = "block"; // Muestra el formulario
}
function esconderFormularioRegistrar() {
  var formulario = document.getElementById("registrar");
  formulario.style.display = "none"; // Muestra el formulario
}
//Añadir
function mostrarFormularioAñadir() {
  var formulario = document.getElementById("añadir");
  formulario.style.display = "block"; // Muestra el formulario
}
function esconderFormularioAñadir() {
  var formulario = document.getElementById("añadir");
  formulario.style.display = "none"; // Muestra el formulario
}
//catalogo
function mostrarCatalogo() {
  var catalogo = document.getElementById("catalogo");
  catalogo.style.display = "block"; // Muestra el catalogo
}
function esconderCatalogo() {
  var catalogo = document.getElementById("catalogo");
  catalogo.style.display = "none"; // Muestra el catalogo
}
//Eliminar
function mostrarFormularioEliminar() {
  var formulario = document.getElementById("eliminar");
  formulario.style.display = "block"; // Muestra el formulario
}
function esconderFormularioEliminar() {
  var formulario = document.getElementById("eliminar");
  formulario.style.display = "none"; // Muestra el formulario
}
//Realizar prestamo
function mostrarFormularioRealizarPrestamo() {
  var formulario = document.getElementById("realizar_prestamo");
  formulario.style.display = "block"; // Muestra el formulario
}
function esconderFormularioRealizarPrestamo() {
  var formulario = document.getElementById("realizar_prestamo");
  formulario.style.display = "none"; // Muestra el formulario
}
//Devolver prestamo
function mostrarFormularioDevolverPrestamo() {
  var formulario = document.getElementById("devolver_prestamo");
  formulario.style.display = "block"; // Muestra el formulario
}

function esconderFormularioDevolverPrestamo() {
  var formulario = document.getElementById("devolver_prestamo");
  formulario.style.display = "none"; // Oculta el formulario
}

//Consultar prestamo
function mostrarConsultarPrestamos() {
  var formulario = document.getElementById("consultar_prestamos");
  formulario.style.display = "block"; // Muestra el formulario
}

function esconderConsultarPrestamos() {
  var formulario = document.getElementById("consultar_prestamos");
  formulario.style.display = "none"; // Oculta el formulario
}

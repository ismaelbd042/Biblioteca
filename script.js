// Ejecutar procesa.php al cargar la página
// Declara una variable global para realizar un seguimiento del estado
let yaEjecutado = false;

document.addEventListener("DOMContentLoaded", function () {
  // Verifica si la variable global yaEjecutado es falsa
  if (!yaEjecutado) {
    console.log("Ejecutando el código por primera vez");

    // Realiza la operación solo si no se ha ejecutado antes
    fetch("crea_tablas.php")
      .then((response) => {
        if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.text();
      })
      .then((data) => {
        // Manejar la respuesta si es necesario
        console.log(data);
      })
      .catch((error) => {
        console.error("Error al cargar procesa.php:", error);
      });

    // Marca que ya se ha ejecutado
    yaEjecutado = true;
  }
});

function mostrarFormularioRegistrar() {
  var formulario = document.getElementById("registrar");
  formulario.style.display = "block"; // Muestra el formulario
}

function mostrarFormularioRealizarPrestamo() {
  var formulario = document.getElementById("realizar_prestamo");
  formulario.style.display = "block"; // Muestra el formulario
}

function mostrarFormularioDevolverPrestamo() {
  var formulario = document.getElementById("");
  formulario.style.display = "block"; // Muestra el formulario
}

function mostrarFormularioAñadirLibro() {
  var formulario = document.getElementById("");
  formulario.style.display = "block"; // Muestra el formulario
}

function mostrarFormularioDarDeBaja() {
  var formulario = document.getElementById("");
  formulario.style.display = "block"; // Muestra el formulario
}

function mostrarFormularioConsultarCatalogo() {
  var formulario = document.getElementById("");
  formulario.style.display = "block"; // Muestra el formulario
}

function mostrarFormularioConsultarPrestamos() {
  var formulario = document.getElementById("");
  formulario.style.display = "block"; // Muestra el formulario
}

function esconderFormularioRegistrar() {
  var formulario = document.getElementById("registrar");
  formulario.style.display = "none"; // Muestra el formulario
}

// Ejecutar procesa.php al cargar la página
document.addEventListener("DOMContentLoaded", function () {
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
});

function mostrarFormulario() {
  var formulario = document.getElementById("registrar");
  formulario.style.display = "block"; // Muestra el formulario
}

function esconderFormulario() {
  var formulario = document.getElementById("registrar");
  formulario.style.display = "none"; // Muestra el formulario
}

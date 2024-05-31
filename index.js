function cargarDatos() {
  fetch("./controllers/traerDatosController.php")
    .then((response) => response.json())
    .then((data) => {
      const tablaDatos = document.getElementById("tablaDatos");
      tablaDatos.innerHTML = "";
      data.forEach((row) => {
        const tr = document.createElement("tr");
        tr.innerHTML = `
        <td>${row.id}</td>
        <td>${row.nombre}</td>
        <td>${row.descripcion}</td>
        <td>
        <button onclick='traerProducto(${row.id})' type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >Actualizar</button>
        </td>
        <td>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmModal-${row.id}">Eliminar</button>
            <div class="modal fade" id="confirmModal-${row.id}" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel-${row.id}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="confirmModalLabel">Deseas eliminar este registro</h5>
                          </div>
                          <div class="modal-body">
                            ¿Estás seguro que deseas continuar?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button class="btn btn-danger" data-dismiss="modal" onClick='eliminarProducto(${row.id})'>Eliminar</button>
                          </div>
                        </div>
                      </div>
            </div>
        </td>
    `;
        tablaDatos.appendChild(tr);
      });
    });
}

function limpiarFormulario() {
  var inputCodigo = document.getElementById("id");
  var inputNombre = document.getElementById("nombre");
  var inputDescripcion = document.getElementById("descripcion");
  inputCodigo.value = "";
  inputNombre.value = "";
  inputDescripcion.value = "";
}
function guardarProducto(id, nombre, descripcion) {
  fetch(
    `./controllers/guardarProductoController.php?id=${id}&nombre=${nombre}&descripcion=${descripcion}`
  )
    .then((response) => response.text())
    .then((data) => {
      limpiarFormulario();
      cargarDatos();
    });
}

function eliminarProducto(id) {
  fetch("./controllers/eliminarProductoController.php?id=" + id)
    .then((response) => response.text())
    .then((data) => {
      console.log(data);
      cargarDatos();
      mostrarAlerta("Se elimino con exito");
    });
}

function traerProducto(id) {
  fetch('controllers/traerProductoController.php?id=' + id)
  .then(response => response.json)
  .then(data => {
    alert(data['codigo']);
  })
}

function mostrarAlerta(mensaje) {
  var alerta = document.getElementById("alerMessange");
  alerta.innerHTML = mensaje;
  alerta.hidden = false;

  setTimeout(function () {
    alerta.hidden = true;
  }, 1000);
}

cargarDatos();


function cargarDatos() {
  fetch("./controllers/traerProductoController.php")
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
                <button 
                    type="button"
                    class="btn btn-outline-info"
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal"
                    data-bs-whatever="@getbootstrap">
                    <ion-icon name="create-outline"></ion-icon>
                </button>
                <button class="btn btn-outline-danger" onClick="eliminarProducto(${row.id})">
                <ion-icon name="trash-outline"></ion-icon>
                </button>
            </td>
            `;
        tablaDatos.appendChild(tr);
      });
    });
}
function eliminarProducto(id) {
  fetch("./controllers/eliminarProductoController.php?id=" + id)
    .then((response) => response.text())
    .then((data) => {
      alert("Ok");
    });
}

function traerDatos(id) {
  fetch('controllers/traerProductoController.php?id=' + id)
  .then(response => response.json)
  .then(data => {
    alert(data['codigo']);
  })
}

cargarDatos();

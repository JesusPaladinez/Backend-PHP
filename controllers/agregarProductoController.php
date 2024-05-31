<?php
    include("../models/ProductoDAO.php");
    $productoDAO = new ProductoDAO();
    $mensaje = $productoDAO->agregarProducto($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['descripcion']);
?>
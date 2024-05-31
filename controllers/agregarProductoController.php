<?php
    include("../models/ProductoDAO.php");
    $productoDAO = new ProductoDAO();
    $mensaje = $productoDAO->agregarProducto($_REQUEST['nombre'], $_REQUEST['descripcion']);
?>
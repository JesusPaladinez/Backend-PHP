<?php
    include("../models/ProductoDAO.php");
    $productoDAO = new ProductoDAO();
    $mensaje = $productoDAO->eliminarProducto($_GET['id']);
?>
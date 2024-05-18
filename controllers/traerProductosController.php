<?php
    include('../models/ProductoDAO.php');
    $productoDAO = new ProductosDAO();
    $productos = $productoDAO->traerProductos();
    print_r(json_encode($productos));
?>
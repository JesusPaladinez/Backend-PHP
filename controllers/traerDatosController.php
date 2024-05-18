<?php
    include('../models/ProductoDAO.php');
    $productoDAO = new ProductosDAO();
    $datos = $productoDAO->traerDatos($_GET['id']);
    print_r(json_encode($datos));
?>
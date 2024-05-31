<?php
    include('../models/ProductoDAO.php');
    $productoDAO = new ProductoDAO();
    $datos = $productoDAO->traerDatos();
    print_r(json_encode($datos));
?>
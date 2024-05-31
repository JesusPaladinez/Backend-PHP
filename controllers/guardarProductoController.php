<?php
    include("../models/ProductoDAO.php");
    $productoDAO = new ProductoDAO();
    if($_REQUEST['id']==''){
        $productoDAO->agregarProducto($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['descripcion']);
        echo ("Se agrego con exito");
    }else{
        $productoDAO->actualizarProducto($_REQUEST['id'],$_REQUEST['nombre'],$_REQUEST['descripcion']);
        echo ("Se actualizo con exito");
    }

?>
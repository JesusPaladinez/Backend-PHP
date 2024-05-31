<?php

include '../conexiones/conexion.php';

class ProductoDAO{
    public $id;
    public $nombre;
    public $descripcion;

    function __construct($id=null,$nom=null,$des=null){
        $this->id=$id;
        $this->nombre=$nom;
        $this->descripcion=$des;
    }

    function traerDatos(){
        $conexion = new Conexion('localhost', 'root', '', 'dbProductosPHP');
        try {
            $conn = $conexion->conectar();
            $stmt = $conn->query('SELECT * FROM productos');
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
            $conexion->desconectar();
        } catch(PDOException $e) {
            echo "error al conectar a la base de datos ======>".$e->getMessage();
        }
    }

    function eliminarProducto($id){
        $conexion = new Conexion('localhost', 'root', '', 'dbProductosPHP');
        try {
            $conn = $conexion->conectar();

            // $query = "DELETE FROM productos WHERE id =$id";
            $consulta = $conn->prepare("DELETE FROM productos WHERE id = $id");
            $consulta->execute();
            return "Exito";
        } catch(PDOException $e) {
            echo "error al conectar a la base de datos ======>".$e->getMessage();
        }
    }

    function agregarProducto($id,$nombre, $descripcion) {
        $conexion = new Conexion('localhost', 'root', '', 'dbProductosPHP');
        try {
            $conn = $conexion->conectar(); 
            $agregar = $conn->prepare("INSERT INTO productos (`id`, `nombre`, `descripcion`) VALUES (?, ?, ?)");
            $agregar->bindParam(1, $id);
            $agregar->bindParam(2, $nombre);
            $agregar->bindParam(3, $descripcion);
            $agregar->execute();
            return "Agregado Exitosamente";
        } catch(PDOException $e) {
            return "Error al conectar a la base de datos: " . $e->getMessage();
        }
    } 

    function traerProducto($id){
        $conexion = new Conexion('localhost', 'root', '', 'dbProductosPHP');
        try {
            $conn = $conexion->conectar();
            $stmt = $conn->query("SELECT * FROM productos WHERE id={$id}");
            $rows = $stmt->fetch(PDO::FETCH_ASSOC);
            return $rows;
            $conexion->desconectar();
        } catch(PDOException $e) {
            echo "error al conectar a la base de datos ======>".$e->getMessage();
        }
    }

    function actualizarProducto($id, $nombre, $descripcion) {
        $conexion = new Conexion('localhost', 'root', '', 'dbProductosPHP');
        try {
            $conn = $conexion->conectar(); 
            $agregar = $conn->prepare("UPDATE productos SET nombre='$nombre', descripcion='$descripcion' WHERE id =$id");
            $agregar->execute();
            return "Actualizado Exitosamente";
        } catch(PDOException $e) {
            return "Error al conectar a la base de datos: " . $e->getMessage();
        }
    }
}

?>
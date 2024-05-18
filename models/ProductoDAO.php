<?php
    require('../conexiones/conexion.php');
    class ProductosDAO{
       public $id;
       public $nombre;
       public $descripcion;

       function __construct($id=null,$nombre=null,$descripcion=null){
        $this->id=$id;
        $this->nombre=$nombre;
        $this->descripcion=$descripcion;
       } 
       function traerProductos(){
        $conn = new Conexion('localhost', 'root', 'Paladinez1014181584*', 'dbProductosPHP');
        try {
            $conexion = $conn->Conectar();
            $stmt=$conexion->query('SELECT * from productos');
            $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        } catch (PDOException $e) {
            echo "Error al conectarse ====>" . $e;
        }
       }
       function traerProducto($id){
        $conn = new Conexion('localhost', 'root', 'Paladinez1014181584*', 'dbProductosPHP');
        try {
            $conexion = $conn->Conectar();
            $stmt=$conexion->query('SELECT * from productos WHERE id={$id}');
            $rows=$stmt->fetch(PDO::FETCH_ASSOC);
            return $rows;
                // foreach ($conexion->query('SELECT * from productos') as $fila) {
                //     print_r(json_encode($fila));
                // }  
        } catch (PDOException $e) {
            echo "Error al conectarse ====>" . $e;
        }
       }
       function eliminarProducto($id){
        $conn = new Conexion('localhost', 'root', 'Paladinez1014181584*', 'dbProductosPHP');
        try {
            $conexion = $conn->Conectar();
            $stmt = $conexion->prepare("DELETE FROM productos WHERE id = $id");
            $stmt->execute();
            return "Exito";  
        } catch (PDOException $e) {
            echo "Error al conectarse ====>" . $e;
        }
       }
    }
?>
<?php
class Conexion{
    private $host;
    private $user;
    private $password;
    private $db;
    private $conexion;

    function __construct($hostaux,$useraux,$passwordaux,$dbaux){
        $this ->host=$hostaux;
        $this ->user=$useraux;
        $this ->password=$passwordaux;
        $this ->db=$dbaux;
    }
    public function conectar(){
        try{
            $this->conexion = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->password);
            return $this->conexion;
    } catch(PDOException $e) {
        print "¡Error!: " . $e->getMessage();
    }}
    public function desconectar(){
       try{
            $this->conexion=null;
        }catch(PDOException $e) {
            print "¡Error al desconectar!: " . $e->getMessage();}}
}
?>
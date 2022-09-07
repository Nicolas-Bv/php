<?php

class Venta {
    private $idventa;
    private $fk_idcliente;
    private $fk_idproducto;
    private $fecha;
    private $cantidad;
    private $preciounitario;
    private $total;


    public function __construct(){
        $this->cantidad = 0;
        $this->preciounitario = 0.0;
        $this->total = 0.0;
    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
        return $this;
    }

public function insertar()
{
    //Instancia la clase mysqli con el constructor parametrizado
    $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
    //Arma la query
    $sql = "INSERT INTO venta (
                facha,
                cantidad,
                preciounitario,
                descripcion,
                total,
                fk_idcliente,
                fk_idproducto
                
            ) VALUES (
                '$this->fecha',
                $this->cantidad,
                $this->preciounitario,
                $this->total,
                $this->fk_idcliente
                $this->idproducto
            );";
    // print_r($sql);exit;
    //Ejecuta la query
    if (!$mysqli->query($sql)) {
        printf("Error en query: %s\n", $mysqli->error . " " . $sql);
    }
    //Obtiene el id generado por la inserción
    $this->idventa = $mysqli->insert_id;
    //Cierra la conexión
    $mysqli->close();
}

public function actualizar()
{

    $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
    $sql = "UPDATE venta SET
            fecha = '$this->fecha',
            cantidad = $this->cantidad,
            preciounitario = $this->preciounitario,
            total = $this->total,
            fk_idcliente= $this->fk_idcliente,
            fk_idproducto =  $this->fk_idproducto,
            WHERE idventa = $this->idventa";

    if (!$mysqli->query($sql)) {
        printf("Error en query: %s\n", $mysqli->error . " " . $sql);
    }
    $mysqli->close();
}

public function eliminar()
{
    $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
    $sql = "DELETE FROM venta WHERE idventa = " . $this->idventa;
    //Ejecuta la query
    if (!$mysqli->query($sql)) {
        printf("Error en query: %s\n", $mysqli->error . " " . $sql);
    }
    $mysqli->close();
}


public function obtenerPorId()
{
    $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
    $sql = "SELECT idventa,
                    fecha,
                    cantidad,
                    preciounitario,
                    total,
                    fk_idcliente,
                    fk_idproducto
            FROM venta
            WHERE idventa = $this->idventa";
    if (!$resultado = $mysqli->query($sql)) {
        printf("Error en query: %s\n", $mysqli->error . " " . $sql);
    }

    //Convierte el resultado en un array asociativo
    if ($fila = $resultado->fetch_assoc()) {
        $this->idventa = $fila["idventa"];
        $this->cantidad = $fila["cantidad"];
        $this->preciounitario = $fila["preciounitario"];
        $this->total = $fila["total"];
        $this->fk_idproducto = $fila["fk_idproducto"];
        $this->fk_idcliente = $fila["fk_idcliente"];
        if(isset($fila["fecha"])){
            $this->fecha = $fila["fecha"];
        } else {
            $this->fecha = "";
        }
    }
    $mysqli->close();

}

 public function obtenerTodos(){
    $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
    $sql = "SELECT 
                idventa,
                fecha,
                cantidad,
                preciounitario,
                total,
                fk_idcliente,
                fk_idproducto
            FROM venta";
    if (!$resultado = $mysqli->query($sql)) {
        printf("Error en query: %s\n", $mysqli->error . " " . $sql);
    }

    $aResultado = array();
    if($resultado){
        //Convierte el resultado en un array asociativo

        while($fila = $resultado->fetch_assoc()){
            $entidadAux = new Venta();
            $entidadAux->idventa = $fila["idventa"];
            $entidadAux->total = $fila["total"];
            $entidadAux->cantidad = $fila["cantidad"];
            $entidadAux->preciounitario = $fila["preciounitario"];
            if(isset($fila["fecha"])){
                $entidadAux->fecha = $fila["fecha"];
            } else {
                $entidadAux->fecha = "";
            }
            $entidadAux->fk_idcliente = $fila["fk_idcliente"];
            $entidadAux->fk_idproducto = $fila["fk_idproducto"];
            $aResultado[] = $entidadAux;
        }
    }
    return $aResultado;
}


}

?>
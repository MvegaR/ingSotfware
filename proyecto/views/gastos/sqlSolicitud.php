<?php  

require_once "conexion.php"; 

class sqlSolicitud extends conexion{     
    public function __construct() 
    { 
        parent::__construct(); 
    } 

    public function get_tipos() 
    {
        $result = $this->_db->query('SELECT * FROM GASTOS');
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows; 
    }

    public function get_solicitud(){
        $result = $this->_db->query("SELECT * FROM GASTOS G, VIAJE V WHERE G.ID_VIAJE = V.ID_VIAJE ");
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function set_gasto($ID3,$NOMBRE,$MONTO,$FECHA) 
    { 
        $this->_db->query(
            "INSERT INTO GASTOS(ID_VIAJE,NOMBRE_GASTO,MONTO_GASTO,FECHA_GASTO) 
             VALUES('$ID3','$NOMBRE','$MONTO','$FECHA')"
             ); 
    } 


    public function up_gasto($ID,$ID3,$NOMBRE,$MONTO,$FECHA){
         $this->_db->query(
            "UPDATE gastos SET ID_VIAJE='$ID3', NOMBRE_GASTO='$NOMBRE', MONTO_GASTO='$MONTO',FECHA_GASTO='$FECHA' WHERE ID_GASTO='$ID'"
             ); 
    }


    /*public function set_viaje($ORIG,$FECHI,$FECHT) 
    { 
        $this->_db->query(
            "INSERT INTO VIAJE(ORIGEN_VIAJE,FECHA_INICIO_DIRECCION,FECHA_TERMINO_DIRECCION) 
             VALUES('$ORIG','$FECHI','$FECHT')"
             ); 
    }

    public function set_destino($ID,$DURACION,$TRANS,$CIUDAD,$PAIS){
        $this->_db->query(
            "INSERT INTO DESTINO(ID_VIAJE,DURACION_VIAJE_DIAS,MEDIO_DE_TRANSPORTE,CIUDAD_DESTINO,PAIS_DESTINO) 
             VALUES('$ID','$DURACION','$TRANS','$CIUDAD','$PAIS')"
             ); 
    }

    public function ultimo_id_viaje(){
        $id;
        $result = $this->_db->query('SELECT MAX(ID_VIAJE) AS id FROM VIAJE');
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row[id];
        }
        return $id; 
    }

    public function getnomid_tipo_viaje($id){
        $id;
        $result = $this->_db->query("SELECT NOMBRE_TIPO_DE_VIAJE,MONTO_MAXIMO FROM TIPO_DE_VIAJE WHERE ID_TIPO_DE_VIAJE='".$id."'");
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }*/

} ?>
<?php  
require_once "conexion.php"; 

class sqlSolicitud extends conexion{     
    public function __construct() 
    { 
        parent::__construct(); 
    } 

    public function get_tipos() 
    {
        $result = $this->_db->query('SELECT * FROM TIPO_DE_VIAJE');
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows; 
    }

    public function get_solicitud($id){
        $result = $this->_db->query("SELECT DISTINCT T.NOMBRE_TIPO_DE_VIAJE, T.MONTO_MAXIMO, S.FECHA_SOLICITUD, S.ESTADO_SOLICITUD, S.CUERPO_SOLICITUD FROM SOLICITUD_DE_VIAJE S, VIAJE V, DESTINO D, TIPO_DE_VIAJE T WHERE ID_USUARIO='".$id."' AND S.ID_VIAJE = V.ID_VIAJE AND V.ID_VIAJE = D.ID_VIAJE AND T.ID_TIPO_DE_VIAJE = S.ID_TIPO_DE_VIAJE");
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows; 
    }

    public function set_solicitud($ID2,$ID3,$ID5,$FECH,$ESTADO,$CUERPO) 
    { 
        $this->_db->query(
            "INSERT INTO SOLICITUD_DE_VIAJE(ID_USUARIO,ID_TIPO_DE_VIAJE,ID_VIAJE,FECHA_SOLICITUD,ESTADO_SOLICITUD,CUERPO_SOLICITUD) 
             VALUES('$ID2','$ID3','$ID5','$FECH','$ESTADO','$CUERPO')"
             ); 
    } 

    public function set_viaje($ORIG,$FECHI,$FECHT) 
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
    }

} ?>
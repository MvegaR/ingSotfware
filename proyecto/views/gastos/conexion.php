<?php  

    define('DB_HOST','localhost'); 
    define('DB_USER','icinf3'); 
    define('DB_PASS','ICInf-362'); 
    define('DB_NAME','icinf3'); 
    define('DB_CHARSET','utf-8'); 
class conexion{ 
    protected $_db; 


    public function __construct() 
    { 
        $this->_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); 

        if ( $this->_db->connect_errno ) 
        { 
            echo "Fallo al conectar a MySQL: ". $this->_db->connect_error; 
            return;     
        }

        $this->_db->set_charset(DB_CHARSET); 
    } 
} ?> 
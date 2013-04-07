<?php
/** 
* @file coock.database.php
* 14 de Febrero del 2013
* @brief  Esta clase aloja las funciones basicas para el tratado de una base de datos.
* connect : realiza una conexion mysql y devuelve el desciptor de conexion
* query : realiza una conexion mysql , ejecuta una sentencia de seleccion y devuelve el contexto de seleccion
* insert : realiza la conexion mysql, y ejecuta una sentencia sql
**/

/**
* @class Database
* @brief Contiene la informacion necesaria para realizar la conexion a la base de datos
**/

class Database {

    /**
    * @fn Database
    * @brief es el constructor de la clase
    * asigna los valores iniciales a los datos para la conexion a la BD
    **/
    function Database(){
        $this->host = "localhost";
        $this->user = "root";
        $this->password="techcruncher"; 
        $this->database = "coockle";
    }

/*    function Database(){
        $this->host = "www.yelldo.com.mx";
        $this->user = "geekadmin1";
        $this->password="superadmin"; 
        $this->database = "interndb";
        $this->con = new mysqli($this->host,$this->user,$this->password,$this->database);
    }
*/    
    /**
    * @fn connect
    * @brief realiza la conexion directa con la base de datos
    * @return el objeto de conexion con la bd
    **/
    public function connect(){
        return  new mysqli($this->host,$this->user,$this->password,$this->database); 
    }
    
    /**
    * @fn query
    * @param query sentencia sql SELECT
    * @brief ejecuta la sentencia SQL SELECT contenida en +query
    * @return el objeto para recorrer el resultado de +query en la bd
    **/
    public function query($query){
        $con = $this->connect();
        return $con->query($query);
    }

    /**
    * @fn insert
    * @param @query una sentencia SQL insert cualquiera
    * @brief Realiza una conexion con la base de datos, inserta el la base de datos el +query y cierra la conexion con la bd
    * @return no devuelve ningun valor
    **/
    public function insert($query){
    	try {
        $con = $this->connect();
        $con->query($query);
        $con->close();
		}catch(Exception $e){
			print "some wrong";
		}
		
    }

    /**
    * @fn insert_id
    * @param query una sentencia sql insert cualquiera
    * @brief realiza una conexion a la bd, inserta la sentencia sql contenida en +query normalmente un insert
    * obtiene el _id asociado con la insercion
    * @return el identificador que se genero al insertarse la sentencia, si es -1 no se realizo la insercion
    **/
	public function insert_id($query){
		$id = -1;
    	try {
        $con = $this->connect();
        $q = $con->query($query);
        $id = $con->insert_id;
        $con->close();
		}catch(Exception $e){
			print "some wrong";
		}
		return $id;
    }
	

};

?>

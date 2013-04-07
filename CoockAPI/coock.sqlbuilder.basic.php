<?php
/* @class SQL Builder Basic 
*  @date 14 de Febrero del 2013
*  @brief Esta clase genera las sentencias sql basicas a partir de los parametros insertados
*  Es clase facilitara el trabajo con sentencias SQL y nos dara mayor seguridad ya que las sentencias sql
*  no seran escritas directamente, seran generadas
*  @mod ...
*  + modificacion : 22 de febrero del 2013
*  + se agrego extends Database para facilitar varias tareas relacionadas con conexion y sqlbuilder.
*/

include "coock.database.php";
/** @class SQLBuilderBasic
* @brief  Esta clase genera las sentencias sql basicas a partir de los parametros insertados
* una vez que el parametro +table sea asignado, las sentencias se generaran sobre este nombre de tabla
* @extends Database
**/

class SQLBuilderBasic extends Database {
    /**
    * @fn SQLBulderBasic
    * @brief Esta funcion corresponde al constructor de la clase, cuando el constructor es llamado
    * se asigna el nombre de la tabla.
    * @param table corresponde al nombre de la tabla que se usara para realizar las sentencias SQL 
    * @note el @param table no debe ser vacio
    * @note en el @param table, la tabla debe existir en la base de datos
    **/
    function SQLBuilderBasic ($table) {
       $this->db = new Database();
       $this->table=$table ;
    }
	
    /**
    * @fn setTable
    * @brief esta funcion asigna un nombre para la tabla sobre la que se trabajara
    * @param table : es el nombre que se asigna para la tabla sobre la que se trabajara
    **/
	function setTable($table){
		$this->table=$table ;
	}
	
    /**
    * @fn select_all
    * @brief esta funcion genera una sentencia SQL SELECT * para el nombre de la tabla que este asignado en @this->table
    * @return la sentencia "SELECT * correspondiente al nombre de tabla denotado en $this->table"
    **/
	function select_all(){
		return "SELECT * FROM $this->table";
	}
	function qselect_all(){
        return $this->db->query($this->select_all());
    }
    /**
    * @fn select_somewhere
    * @param wherearray
    * @brief Esta funcion por el momento es inusual, pero mas adelante nos ayudara a generar sentencias SQL con condicionales WHERE
    * @return la sentencia SQL con los condicionales WHERE insertados... 
    **/
	function select_somewhere($wherearray){
		$row = $wherearray["row"];
		$operator = $wherearray["op"];
		$value = $wherearray["val"];
		return "SELECT * FROM $this->table WHERE $row $operator $value";
	}

    /**
    * @fn insert
    * @param rows_values es el array asociativo que relaciona nombre_campo=>valor para insertarlos en la BD
    * @brief Esta sencilla funcion genera una sentencia SQL insert apartir del parametro +rows_values que es un array asociativo
    * relacionando el nombre dle campo y el valor que se agregara el la base de datos
    * @return la sentencia SQL INSERT
    **/
    function insert($rows_values){
        $rr = "";
        $v = "";
        $total = count($rows_values);
        $counter = 0;
        try{
            foreach($rows_values as $row => $value){
                $rr .= $row;
                $v .= "\"$value\"";
                if($counter<$total-1){ $rr.=","; $v.=","; }
                $counter++;
            }
        }catch(Exception $e){
             throw new Exception( 'Something really gone wrong', 0, $e);
        }
        $result = "INSERT INTO $this->table ($rr) VALUE ($v)";
        return $result;
    }
    public function qinsert($row_values){
        $this->db->insert($this->insert($row_values));
    }
    public static function voidInsert($table){
        return  "INSERT INTO $table () VALUE ()";        
    }

    public function count_all(){
        return "SELECT COUNT(*) from $this->table";
    }

    public function count_where($where){
        return "SELECT COUNT(*) from $this->table where $where";
    }

};

?>

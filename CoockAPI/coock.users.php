<?php
/* Users
 * 15 de Febrero del 2013
 * Esta clase sera la encargada de mantener la informacion de los usuarios
 * asi como de los perfiles, y sus actualizaciones.
 */
 
 include_once "interfaces/coock.interface.users.php";
 
 /**
 * @class Users
 * @brief Aloja las funciones necesarias para realizar tareas con los usuarios busqueda , etc
 * @implements UsersInterface
 **/

class Users {
 	
 	/**
 	* @fn Users
 	* @param database un objeto de tipo Database
 	* @param sqlbuilder un objeto de tipo SQLBuilderBasic
 	* @brief inicializa los objetos para iniciar las tareas con usuarios
 	* @var this->db alojara internamente la variable de objeto Database
 	* @var this->sbb alojara internamente la variable objeto SQLBuilderBasic
 	**/
 	function Users($sqlbuilder){
		$this->sbb = $sqlbuilder;
 		$this->db = new Database();
 	}

 	public static function showAll($w){
 		$builder = new SQLBuilderBasic("users");
 		if($w==""){
 			$sql = "select users.id_user,users.username,profile.name as name,profile.last_name from users inner join profile on (users.id_user=profile.id_user)";
 		}else {
 			$sql = "select users.id_user,users.username,profile.name as name,profile.last_name from users inner join profile on (users.id_user=profile.id_user) where name like '%$w%'"; 			
 		}
 			$qry = $builder->db->query($sql);
 			$result = "<users>\n";
 			while($r=$qry->fetch_array()){
 				$result .= "<user id='$r[id_user]'>\n";
 				$result .= "<username>$r[username]</username>\n";
 				$result .= "<name>$r[name]</name>\n";
 				$result .= "<lastname>$r[last_name]</lastname>\n";
 				$result .= "</user>\n";
 			}
 			$result .= "</users>\n";
 			return $result;
 		
 	}

 	/**
 	* @fn addUser
 	* @param user un objeto de tipo User bien definido, con todos los parametros no vacios a excepcion del id_user
 	* @brief agrega en base de datos el usuario con los datos definidos en un objeto User
 	* hay 2 secciones la primera seccion agrega el usuario a la tabla users y la segunda seccion agrega el usuario a la tabla profile
 	* @return el identificador del usuario que se agrego
 	**/
	public function addUser($user){
		$id_user = $this->db->insert_id($this->sbb->insert($user->getParameters1()));
		$this->sbb->setTable("profile");
		$user->setIdUser($id_user);
		$this->db->insert($this->sbb->insert($user->getParameters2()));
		return $id_user;
	}
	
	/**
	* @fn getUserByCredentials
	* @param username el nombre de usuario
	* @param password el passsword encriptado bajo sha1(md5())
	* @brief buscar en la base de datos de usuarios, el usuario que contenga los datos exactos pasados como parametros
	* @return un  objeto de tipo User con los datos del usuario en cuestion
	**/	
    public function getUserByCredentials($username,$password){
		 $sql = "select * from users where username='$username' and password='$password' and status=1";
		 $qry = $this->sbb->db->query($sql);
		 $found= 0 ;
		 $user = new User();
		
		while($r = $qry->fetch_array()){
			$user->setIdUser($r['id_user']);
			$found = 1;
			break;
		}
		if($found==1){
			$user = $this->getuserById($user->getIdUser());
		}
//		$user =1;
		return $user;
	}
	
	/**
	* @fn getuserById
	* @param id_user un identificador de usuario
	* @brief busca en la base de datos el usuario que conicida con el identificador de usuario buscado
	* @return un objeto de tipo User con los datos relacionados con el usuario
	* @note en caso de que el identificador no corresponda a ningun usuario, se devuelve un objeto tipo User vacio
	**/
	function getuserById($id_user){
		//$sql = $this->sbb->select_somewhere(Array("row"=>"id_user", "op"=>"=","val"=>$id_user));
		$sql = "select users.id_user,username,status,name,last_name,email,address,id_ocupation,id_nationality,id_gender,id_relationship from users inner join profile on (users.id_user=profile.id_user) where users.id_user='$id_user'";
		$user = new User();
		$user->setIdUser($id_user);
		$qry = $this->db->query($sql);
		while($r = $qry->fetch_array()){
			$user->setUsername($r['username']);
			$user->setStatus($r['status']);
			$user->setName($r['name']);
			$user->setLastName($r['last_name']);
			$user->setEmail($r['email']);
			$user->setAddress($r['address']);
			$user->setIdOcupation($r['id_ocupation']);
			$user->setIdNationality($r['id_nationality']);
			$user->setIdGender($r['id_gender']);
			$user->setIdRelationship($r['id_relationship']);

		}
		return $user;
	}
 }

 /**
 * @class User
 * @brief define una estructura de datos con la informacion necesaria de un usuario
 **/
 class User {
 	/**
 	* @fn User
 	* @brief inicializa las variables que pertenecen a la estructura de datos usuario
 	**/
 	function User(){
 		$this->id_user = -1;
		$this->username = "";
		$this->status = 1;
		$this->name = "";
		$this->last_name ="";
		$this->email = "";
		$this->password= "";
		$this->parameters1 = "";
		$this->parameters2 = "";
		$this->parameters1["status"]=1;
 	}
	/**
	* @fn setIdUser
	* @param id el dentificador del usuario
	* @brief asigna el idenfiticador de usuario apartir del identificador pasado como parametro
	**/
	function setIdUser($id){
		$this->id_user = $id ;
		$this->parameters2["id_user"] = $id;
	}

	/**
	* @fn setUsername
	* @param usern el nombre de usuario
	* @brief asigna el nombre de usuario apartir del nombre de usuario pasado como parametro
	**/
    function setUsername($usern){
		$this->username = $usern;
		$this->parameters1["username"] = $usern;
	}

	/**
	* @fn setStatus
	* @param status el status de usuario
	* @brief asigna el status de usuario apartir de status pasado como parametro
	* el status dice cuando un usuario esta activo, inactivo, bloqueado, baneado
	* normalmente 1 activo , 0 bloqueado
	**/
	function setStatus($status){
		$this->status = $status;
	}

	/**
	* @fn setName
	* @param name el nombre real del usuario
	* @brief asigna el nombre del usuario apartir del nombre pasado como parametro
	**/
	function setName($name){
		$this->name = $name;
		$this->parameters2["name"] = $name;
	}

	/**
	* @fn setLastName
	* @param lname el apellido del usuario
	* @brief asigna el apelldo del usuario apartir del apellido pasado como parametro
	**/
	function setLastName($lname){
		$this->last_name = $lname;
		$this->parameters2["last_name"] = $lname;
		}
	/**
	* @fn setEmail
	* @param email el correo del usuario
	* @brief asigna el correo del usuario apartir del correo pasado como parametro
	**/
	function setEmail($email){
		$this->email = $email;
		$this->parameters2["email"] = $email;

	}

	/**
	* @fn setPassword
	* @param passwrd
	* @brief asigna el password del usuario apartir del password pasado como parametro
	**/
	function setPassword($passwrd){
		$this->password = $passwrd;
		$this->parameters1["password"] = $passwrd;
	}

	function setAddress($address){ $this->parameters2['address'] = $address; }
	function setIdOcupation($ocupation) { $this->parameters2['id_ocupation'] = $ocupation;}
	function setIdNationality($nationality) { $this->parameters2['id_nationality'] = $nationality; }
	function setIdGender($gender){ $this->parameters2['id_gender'] = $gender; }
	function setIdRelationship($relationship){ $this->parameters2['id_relationship'] = $relationship; }
	/**
	* @fn getIdUser
	* @brief obtiene el identificador de usuario de el objeto User en cuestion
	* @return el id_user del objeto User en cuestion
	**/
	function getIdUser(){ return $this->id_user; }
	/**
	* @fn getUserName
	* @brief obtiene el nombre de usuario de el objeto User en cuestion
	* @return el username del objeto User en cuestion
	**/
	function getUserName(){ return $this->username; }
	/**
	* @fn getStatus
	* @brief obtiene el status de usuario de el objeto User en cuestion
	* @return el status del objeto User en cuestion
	**/
	function getStatus(){ return $this->status; }
	/**
	* @fn getName
	* @brief obtiene el nombre real de usuario de el objeto User en cuestion
	* @return el name del objeto User en cuestion
	**/
	function getName(){return $this->name; }
	/**
	* @fn getLastName
	* @brief obtiene el apellido del usuario de el objeto User en cuestion
	* @return el last_name del objeto User en cuestion
	**/
	function getLastName(){ return $this->last_name; }
	/**
	* @fn getEmail
	* @brief obtiene el email de usuario de el objeto User en cuestion
	* @return el email del objeto User en cuestion
	**/
	function getEmail(){ return $this->email; }
	/**
	* @fn getPassword
	* @brief obtiene el password de usuario de el objeto User en cuestion
	* @return el password del objeto User en cuestion
	**/
	function getPassword(){ return $this->password ; }
	/**
	* @fn getParameters1
	* @brief obtiene el los datos necesarios para agregar el usuario en la tabla users
	* @return un array  asociativo con los valores de username,password,status
	**/
	function getParameters1() { return $this->parameters1 ; }
		/**
	* @fn getParameters2
	* @brief obtiene el los datos necesarios para agregar el usuario en la tabla profile
	* @return un array asociativo con los valores de id_user,name,last_name,email
	**/
	function getParameters2() { return $this->parameters2 ; }
	/**
	* @fn getAddress
	* @brief obtiene la direccion del usuario al que pertenece el objeto creado
	* @return la direccion del usuarios
	**/
	function getAddress(){ return $this->parameters2['address']; }
	/**
	* @fn getIdOcupation
	* @return El identificador de ocupacion del usuarios obtenido del campo id_ocupation dela tabla profile
	**/
	function getIdOcupation(){ return $this->parameters2['id_ocupation'];}
	/**
	* @fn getIdNationality
	* @return EL identificador de nacionalidad del usuario obtenido del camopo id_ocupation de la tabla profile
	**/
	function getIdNationality(){ return $this->parameters2['id_nationality']; }
	/**
	* @fn getIdGender
	* @return El identificador de sexo del usuario obtenido del campo id_gender de la tabla profile
	**/
	function getIdGender(){ return $this->parameters2['id_gender']; }
	/**
	* @fn getIdRelationship
	* @return El identificador de relacion del usuario obtenido del campo id_relationsip de la tabla profile
	**/
	function getIdRelationship(){ return $this->parameters2['id_relationship']; }
};
?>
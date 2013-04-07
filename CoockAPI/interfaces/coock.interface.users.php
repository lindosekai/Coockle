<?
/* Interface Users
 * This interface contains all methods to reference the users class
 * 21 February 2013
 */

 interface UsersInterface {
 	/*
	 * The users functions in this case is the constructor of the class which implements this interface
	 */
 	function Users($sqlbuilder);
	/*
	 * Next 2 classes are used in  enviroments which a Users non-object is not necesary
	 */
	/*
	 *  addUser take as parameter a well defined User object and puts it inside de database
	 *  its necesary that the User Object has all its parameters !=""
	 */
	function addUser($user);
	/*
	 * getUserByCredencias is the function we use to  get some user from de database
	 * we search the user which matches with the username and password, and by result
	 * we return a well defined User Object
	 */
	function getUserByCreadentials($username , $password);
	/*
	 * getUserById giving a valid user id, this function return a well defined User object
	 */
	function getuserById($id_user);
 }
?>
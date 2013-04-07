function loadUsers(param){
	xhr = new XMLHttpRequest();
	xhr.open("get","find_people.php?"+param,false);
	xhr.send();
	return xhr.responseText;
}
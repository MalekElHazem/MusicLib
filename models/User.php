<?php

class User {
private $username,$password;
function __construct($username="",$password="") {
	
    $this->username=$username;
    $this->password=$password;
}

public function getUsername(){
	return $this->username;
}

public function getPassword(){
	return $this->password;
}

public function setUsername($username){
        $this->username = $username;
    }

public function setPassword($password){
        $this->password = $password;
    }

}

?>
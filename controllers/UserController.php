<?php
include_once('models/User.php') ;
include_once('database/config.php');
class UserController extends Connexion{
function __construct() {
parent::__construct();
}

function insert(User $c){

$query="insert into users(username, password)values(?, ?)";
$res=$this->pdo->prepare($query);

$aryy =array($c->getUsername(),$c->getPassword()) ;
//var_dump($aryy);
return $res->execute($aryy);

}

function getUsername($username){
    $query="SELECT * FROM users WHERE username = ? ";
    $res = $this->pdo->prepare($query);
    $res->execute(array($username));
    $array= $res->fetch();
    return $array;
}


function getUser($id){
    $query="SELECT * FROM users WHERE id = ? ";
    $res = $this->pdo->prepare($query);
    $res->execute(array($id));
    $array= $res->fetch();
    return $array;
}
function delete($idUser) {
$query = "delete from users where id=?";
$res=$this->pdo->prepare($query);
return $res->execute(array($idUser));
}
function liste(){
$query = "select * from users";
$res=$this->pdo->prepare($query);
$res->execute();
return $res;
}
function modifier_user(User $c)
{
$sql = "UPDATE users SET  username=?, password=? WHERE id=?";
$stmt= $this->pdo->prepare($sql);
$stmt->execute(array($c->getUsername(),$c->getPassword()));
}


}

?>


	
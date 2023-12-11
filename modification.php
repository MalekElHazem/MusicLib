<?php
require_once('../controllers/UserController.php');
require_once('../models/User.php');
$userCtr=new ClientController();
$user=new User();

$user->setCin($_POST['username']);
$user->setFirstName($_POST['password']);
$userCtr->modifier_user($user);
header('Location:index.php');

?>
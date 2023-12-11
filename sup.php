<?php
require_once('../controllers/UserController.php');
$userCtr=new UserController();
$userCtr->delete($_GET['id']);
header('Location:index.php');
?>

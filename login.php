<?php
session_start();
    require_once('models/User.php');
    require_once('database/config.php');
	require_once('controllers/UserController.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    

    $username = $_POST['username'];
    $password = $_POST['password']; 

    $userController = new UserController();
    $user = $userController->getUsername($username);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        header("Location:dashboard.php");
        exit();
    } else {
        header("Location:login.html");
        exit();
    }
}
?>

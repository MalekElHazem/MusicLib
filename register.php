<?php
    require_once('controllers/UserController.php');
    require_once('models/User.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $user = new User($username, $hashedPassword);
    $userCtr = new UserController();

    $res = $userCtr->insert($user);

    if ($res == true) {
        header('Location: index.php');
    }
?>

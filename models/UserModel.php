<?php

require_once 'User.php';

class UserModel {
    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function authenticate($enteredPassword) {
        return $enteredPassword === $this->user->getPassword();
    }
}
?>
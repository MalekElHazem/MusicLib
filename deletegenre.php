<?php
    include_once 'models/Genre.php';
    include_once 'controllers/GenreController.php';
    $genre = new GenreController();
    $id = $_GET['id'];
    $genre->delete($id);
    header('location:categories.php');



?>
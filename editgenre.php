<?php
    include_once 'models/Genre.php';
    include_once 'controllers/GenreController.php';
    $genreCtr = new GenreController();
    $genre = new Genre();
    $genre->setId($_POST['id']);
    $genre->setTitle($_POST['title']);
    $genre->setdescription($_POST['description']);


    $genreCtr->modifierGenre($genre);
    header('location:categories.php');

?>  
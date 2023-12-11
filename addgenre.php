<?php
    include_once 'models/Genre.php';
    include_once 'controllers/GenreController.php';
    $genre = new GenreController();
    
        $title = $_POST['title'];
        $description = $_POST['description'];
        $genre->insert(new Genre($title, $description));
        header('location:categories.php');

    


?>
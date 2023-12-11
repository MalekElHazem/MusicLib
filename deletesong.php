<?php
    //delete 
    require_once('controllers/SongController.php');
    require_once('models/Song.php');

    $idSong = $_GET['id'];
    $songCtr = new SongController();
    $songCtr->delete($idSong);
    header('Location: gallery.php');
    
?>
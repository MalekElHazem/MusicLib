<?php

    //edit song 
    require_once('models/Song.php');
    require_once('controllers/SongController.php');

    $songCtr = new SongController();
    $song = new Song();
    $song->setId($_POST['id']);
    $song->setTitle($_POST['title']);
    $song->setArtist($_POST['artist']);
    $song->setCategory($_POST['genre']);
    $song->setDate($_POST['date']);
    $song->setFeature($_POST['feature']);
    //$song->setImage($_FILES['image']['name']);
    
    if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
    
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
            $song->setFile($target_file);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        $song->setFile($_POST['existing_file']);
    }
  

    //echo file
    echo $_FILES['file']['name'];

    $songCtr->modifierSong($song);
    header('Location: gallery.php');
    

?>
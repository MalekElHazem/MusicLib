<?php
require_once('controllers/SongController.php');
require_once('models/Song.php');


$title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
$artist = isset($_POST['artist']) ? htmlspecialchars($_POST['artist']) : '';
$category = isset($_POST['genre']) ? htmlspecialchars($_POST['genre']) : '';
$date = isset($_POST['date']) ? htmlspecialchars($_POST['date']) : '';
$feature = isset($_POST['feature']) ? htmlspecialchars($_POST['feature']) : '';
//$image = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';
$file = isset($_FILES['file']['name']) ? $_FILES['file']['name'] : '';

// Check 
if (/*isset($_FILES['image']['error']) && $_FILES['image']['error'] !== UPLOAD_ERR_OK ||*/
    isset($_FILES['file']['error']) && $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
    die('File upload failed');
}


$uploadDirectory = 'uploads/';
if (!is_dir($uploadDirectory) || !is_writable($uploadDirectory)) {
    die('Uploads directory does not exist or is not writable');
}
//$imagePath = $uploadDirectory . $image;
$filePath = $uploadDirectory . $file;
/*if (!is_file($_FILES['image']['tmp_name']) || !is_readable($_FILES['image']['tmp_name'])) {
    die('Temporary image file does not exist or is not readable');
}

// Check 
if (!$image) {
    die('Image name is empty');
}


if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
    die('Failed to move uploaded image');
}

move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);*/
move_uploaded_file($_FILES['file']['tmp_name'], $filePath);
/*xif (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
    die('Failed to move uploaded image');
}

if (!move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
    die('Failed to move uploaded file');
}*/

// Create
$song = new Song();
$song->setTitle($title);
$song->setArtist($artist);
$song->setCategory($category);
$song->setDate($date);
$song->setFeature($feature);
//$song->setImage($imagePath);
$song->setFile($filePath);




$songCtr = new SongController();


$res = $songCtr->insert($song);

if ($res) {
    header('Location: gallery.php');
    exit; 
} else {
    die('Song insertion failed');
}
?>

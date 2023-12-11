<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusicLib</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <link href="css/style.css" rel="stylesheet">
        <link rel="icon" href="css/vinyl.png" type="image/x-icon"/>
        <?php
echo "<style>
.imglist {
    width: 50px;
    height: 50px;
    border-radius: 10px;
}
</style>";
?>

</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top bg-dark">
        <div class="container">
        <img src="css/vinyl.png" alt="Your Logo" height="30" width="30"><a></a>
            <a class="navbar-brand me-auto" href="dashboard.php">MusicLib</a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Logo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" aria-current="page" href="dashboard.php">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="categories.php">Genres</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 active" href="gallery.php">Songs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="aboutlog.php">About</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="logout.php" class="logout-button">Logout</a>
            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Hero section -->
    <section class="hero-section">
        <div class="container d-flex align-items-center justify-content-center text-white flex-column">
        
        <h1 class="mt-5">Gallery</h1>
        <table class="table mt-5 add">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Artist</th>
                <th scope="col">Feature</th>
                <th scope="col">File</th>
                <th scope="col">Category</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                
                <?php

                require_once('controllers/SongController.php');
                require_once('models/Song.php');

                $songCtr = new SongController();
                $songs = $songCtr->liste();
               

                foreach ($songs as $song) {
                    
                    require_once('getid3/getid3.php');

                    
                    $getID3 = new getID3;

                    
                    $ThisFileInfo = $getID3->analyze($song['file']);
                   /* echo "<pre>";
                    var_dump($ThisFileInfo);
                    echo "</pre>";*/

                    
                    if (isset($ThisFileInfo['id3v2']['APIC'][0]['data'])) {
                        $coverArt = $ThisFileInfo['id3v2']['APIC'][0]['data'];
                    } else {
                        echo "No cover art found.";
                    }

                    echo "<tr>";
                    echo "<th scope='row'>" . $song['id'] . "</th>";
                    echo "<td>";
                    if (isset($ThisFileInfo['id3v2']['APIC'][0]['data'])) {
                        $coverArt = $ThisFileInfo['id3v2']['APIC'][0]['data'];
                        $coverArtMime = $ThisFileInfo['id3v2']['APIC'][0]['image_mime'];
                        $base64CoverArt = base64_encode($coverArt);
                        echo '<img class='.'imglist'.' src="data:' . $coverArtMime . ';base64,' . $base64CoverArt . '">';
                    } else {
                        echo "No cover art found.";
                    }
                    echo "</td>";
                    echo "<td>" . $song['title'] . "</td>";
                    echo "<td>" . $song['artist'] . "</td>";
                    echo "<td>" . $song['feature'] . "</td>";
                    echo "<td><audio controls><source src='" . $song['file'] . "' type='audio/mpeg'></audio></td>";
                    echo "<td>" . $song['category'] . "</td>";
                    echo "<td>" . $song['date'] . "</td>";
                    echo "<td>";
                    echo "<a href='editsongform.php?id=" . $song['id'] . "' class='btn btn-primary'>Edit</a>";
                    echo "<a href='deletesong.php?id=" . $song['id'] . "' class='btn btn-danger'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
                    
            </tbody>
        </table>
        
        <a href="addsongform.php" class="btn btn-success mt-5 mb-5">Add</a>
        </div>
    </section>
    <!-- End Hero Section -->

    <!-- Boostrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; MusicLib 2023</p></div>
        </footer>
        
</body>
</html>

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
    <style>
          .imglist {
              width: 50px;
              height: 50px;
              border-radius: 10px;
          }
         
          .tt{

            color: #fff;
            font-size: 14px;
            padding: 8px 20px;
            border-radius: 50px;
            text-decoration: none;
            transition: 0.3s background-color;
          }
            .tt:hover{
                background-color: #fff;
                color: #000;
            }
            .card-image {
                width: 100%;
                height: 100%;
                background-size: cover;
                background-position: center;
            }
            .flex-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .card {
                flex-basis: calc(33.33% - 20px); 
                margin-bottom: 20px;
            }
            /*audio::-webkit-media-controls-panel {
    background-color: #222;
    color: #fff; 
}

audio::-webkit-media-controls-play-button,
audio::-webkit-media-controls-mute-button,
audio::-webkit-media-controls-volume-slider-container,
audio::-webkit-media-controls-volume-slider {
    color: #fff;
}*/
            </style>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top bg-dark">
        <div class="container">
        <img src="css/vinyl.png" alt="Your Logo" height="30" width="30"><a></a>
            <a class="navbar-brand me-auto" href="index.php">MusicLib</a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Logo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 active" aria-current="page" href="index.php">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="about.php">About</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="login.html" class="login-button">Login</a>
            <a href="register.html" class="tt">Register</a>

            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Hero section -->
    <section class="hero-section">
        <div class="container d-flex align-items-center justify-content-center  text-white flex-column">
            <h1>Welcome to the MusicLib</h1>
            <p></p>
            <div class="card-container flex-container">
  <?php 
     require_once('controllers/SongController.php');
     require_once('models/Song.php');

  $songCtr = new SongController();
  $songs = $songCtr->liste(); 
  foreach ($songs as $song): ?>

    <div class="card bg-dark text-white">
      <div class="card-image">
        <?php
         require_once('getid3/getid3.php');


         $getID3 = new getID3;

         
         $ThisFileInfo = $getID3->analyze($song['file']);

         if (isset($ThisFileInfo['id3v2']['APIC'][0]['data'])) {
            $coverArt = $ThisFileInfo['id3v2']['APIC'][0]['data'];
        } else {
            echo "No cover art found.";
        }


        if (isset($ThisFileInfo['id3v2']['APIC'][0]['data'])) {
            $coverArt = $ThisFileInfo['id3v2']['APIC'][0]['data'];
            $coverArtMime = $ThisFileInfo['id3v2']['APIC'][0]['image_mime'];
            $base64CoverArt = base64_encode($coverArt);
            echo '<img class="card-image" src="data:' . $coverArtMime . ';base64,' . $base64CoverArt . '">';
        } else {
            echo "No cover art found.";
        }
        ?>
      </div>
      <div class="card-content">
        <h3><?php echo $song['title']; ?></h3>
        <p>
          <span><?php echo $song['artist']; ?></span>
          <?php if ($song['feature']): ?>
            <span>ft. <?php echo $song['feature']; ?></span>
          <?php endif; ?>
        </p>
        <audio controls>
          <source src="<?php echo $song['file']; ?>" type="audio/mpeg">
        </audio>
        <p class="card-info">
          <span><?php echo $song['category']; ?></span>
          <span><?php echo $song['date']; ?></span>
        </p>
      </div>
    </div>
  <?php endforeach; ?>
</div>
        
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

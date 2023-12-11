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
            .add{
            margin-top: 200px;
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
                            <a class="nav-link mx-lg-2 active" aria-current="page" href="dashboard.php">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="categories.php">Genres</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="gallery.php">Songs</a>
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

    <section class="hero-section">
        <div class="container d-flex align-items-center justify-content-center  text-white flex-column">
            <h1>Browse</h1>
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

<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Home Page</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Your Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </nav>
  <h1>Welcome to the Home Page</h1>
    <p><a href="register.php">Register</a> or <a href="login.php">Login</a></p>
  <!-- Your page content goes here -->
<!--
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXZs5JrmG/O6pg6BfGofFpWqO2KaDm3Up6eI"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyIdQb6W12GX5nE6d9gFmzX4U15DKO8Lh6"
    crossorigin="anonymous"></script>
</body>

    

</html>
-->
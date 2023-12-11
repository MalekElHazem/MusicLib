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
                            <a class="nav-link mx-lg-2 " aria-current="page" href="index.php">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 active" href="about.php">About</a>
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
        <div class="container d-flex align-items-center justify-content-center fs-1 text-white flex-column">
            <h1>About</h1>
            <p class="p">Music Library Application (MusicLib) in PHP<br>
                Overview<br>
                MusicLib is a web application built with PHP and a database that allows users to manage their music collection. Users can add, edit, and delete songs, albums, and artists. They can also listen to music online. <br>

                Features<br>
                User Management: Users can register and log in to the application.<br>
                Music Management:<br>
                Add, edit, and delete songs, albums, and artists.<br>
                Upload music files in supported formats.<br>
                Store information about each song, including title, artist, album, genre, release date.<br>
                View album art.<br>
                Music Management:<br>
                Create, edit, and delete .<br>
                Add and remove songs from .<br>
                Play Music online.<br>

                Technology Stack<br>
                Backend: PHP<br>
                Database: MySQL<br>
                Frontend: HTML, CSS<br>
                Media player: HTML5 audio element<br></p>
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

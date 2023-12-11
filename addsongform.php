<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}
    require_once('controllers/GenreController.php');
    require_once('models/Genre.php');


    $genreCtr = new GenreController();
    $genres = $genreCtr->liste();


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
                            <a class="nav-link mx-lg-2 active" aria-current="page" href="dashboard.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="categories.php">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="gallery.php">Gallery</a>
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
    <div class="container d-flex align-items-center justify-content-center fs-1 text-white flex-column">
        <h1>Add Song</h1>
        <form action="addsong.php" method="post" enctype="multipart/form-data" class="bg-dark text-white p-4 rounded">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="artist" class="form-label">Artist:</label>
                <input type="text" name="artist" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="feature" class="form-label">Feature:</label>
                <input type="text" name="feature" class="form-control">
            </div>
            <div class="mb-3">
                <label for='genre' class="form-label">Genre:</label>
                <select name='genre' class="form-select">
                    <?php
                    foreach ($genres as $genre) {
                        $selected = $song['category'] == $genre['title'] ? 'selected' : '';
                        echo "<option value='".$genre['title']."' $selected>".$genre['title']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">File (mp3):</label>
                <input type="file" name="file" class="form-control">
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Release Date:</label>
                <input type="date" name="date" class="form-control">
            </div>
            <div class="mb-3">
                <input type="submit" value="Add Song" class="btn btn-light">
            </div>
        </form>
    </div>
</section>
<!-- End Hero Section -->

<!-- Boostrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; MusicLib 2023</p></div>
    </footer>
</body>

</html>

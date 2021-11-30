<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location: admin/dashboard.php");
    exit;
}

require 'proseslogin.php';

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="scss/main2.css">
    <link rel="icon" type="img/png" href="/img/unsika-logo-remake.png">
    <script src="https://kit.fontawesome.com/807ea63ce3.js" crossorigin="anonymous"></script>
    <title>Sistem Pakar Diagnosa Stroke</title>
</head>

<body id="home">
    <nav class="nav-custom navbar navbar-expand-lg navbar-light bg-light fixed-top mb-4">
        <div class="container pt-2">
            <a class="navbar-brand" href="#">
                <img src="img/unsika-logo-remake.png" alt="">
                <span>UNSIKA</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="konsul-form.php">Konsultasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-signup" href="login.php">Admin, Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#dde8fe" fill-opacity="1" d="M0,320L20,277.3C40,235,80,149,120,106.7C160,64,200,64,240,80C280,96,320,128,360,149.3C400,171,440,181,480,176C520,171,560,149,600,149.3C640,149,680,171,720,154.7C760,139,800,85,840,80C880,75,920,117,960,165.3C1000,213,1040,267,1080,256C1120,245,1160,171,1200,160C1240,149,1280,203,1320,197.3C1360,192,1400,128,1420,96L1440,64L1440,0L1420,0C1400,0,1360,0,1320,0C1280,0,1240,0,1200,0C1160,0,1120,0,1080,0C1040,0,1000,0,960,0C920,0,880,0,840,0C800,0,760,0,720,0C680,0,640,0,600,0C560,0,520,0,480,0C440,0,400,0,360,0C320,0,280,0,240,0C200,0,160,0,120,0C80,0,40,0,20,0L0,0Z"></path>
    </svg>

    <div class="container">
        <?php
        if (isset($_SESSION['status'])) {
        ?>
            <div class="alert alert-danger">
                <span class="fas fa-times-circle"></span>
                <span></span>
                <span class="msg"> <?= $_SESSION['status'] ?></span>
            </div>
        <?php
            unset($_SESSION['status']);
        }
        ?>
    </div>

    <section id="konsultasi">
        <div class="container mt-5">
            <div class="row-cols-auto">
                <div class="col-12 col-lg-4">
                    <h2>Login Admin,</h2>
                    <h3>Pastikan isi dengan benar Yaa !</h3>
                </div>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username" aria-describedby="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" aria-describedby="username" required>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#dde8fe" fill-opacity="1" d="M0,256L34.3,261.3C68.6,267,137,277,206,250.7C274.3,224,343,160,411,133.3C480,107,549,117,617,154.7C685.7,192,754,256,823,261.3C891.4,267,960,213,1029,202.7C1097.1,192,1166,224,1234,224C1302.9,224,1371,192,1406,176L1440,160L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
    </svg>
    </section>

    <footer class="p-3">
        <p>Created with love by <br> <a href="https://www.instagram.com/_wahyurudi/">Wahyu Rudiansyah</a> </p>
    </footer>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>
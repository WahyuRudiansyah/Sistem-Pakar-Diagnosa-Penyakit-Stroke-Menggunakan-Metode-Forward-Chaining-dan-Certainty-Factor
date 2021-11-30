<?php

include 'koneksi.php';

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
  <link rel="stylesheet" href="scss/main.css">
  <link rel="icon" type="img/png" href="/img/unsika-logo-remake.png">
  <script src="https://kit.fontawesome.com/807ea63ce3.js" crossorigin="anonymous"></script>
  <title>Sistem Pakar Diagnosa Stroke</title>
</head>

<body id="home">
  <nav class="nav-custom navbar navbar-expand-lg navbar-light bg-light fixed-top">
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
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#konsultasi">Konsultasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-signup" href="login.php">Admin, Sign Up</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section id="sispak">
    <div class="container">
      <div class="row custom-section">
        <div class="col-12 col-lg-4">
          <h2>Sistem Pakar</h2>
          <h3>Diagnosa Stroke</h3>
          <p>Stroke terjadi karena terganggunya kondisi otak atau rusaknya kondisi otak
            akibat dari tersumbatnya atau pecahnya pembuluh darah pada otak.
            Sistem Pakar ini di buat untuk dapat melakukan diagnosa awal kepada siapapun yang ingin memeriksa
            kondisi tubuhnya. Hal itu diharapkan dapat mengurangi angka penderita penyakit stroke.
          </p>
          <a class="" href="#konsultasi">Yuk, Konsultasi</a>
        </div>
      </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#dde8fe" fill-opacity="1" d="M0,256L30,234.7C60,213,120,171,180,170.7C240,171,300,213,360,234.7C420,256,480,256,540,224C600,192,660,128,720,133.3C780,139,840,213,900,202.7C960,192,1020,96,1080,80C1140,64,1200,128,1260,170.7C1320,213,1380,235,1410,245.3L1440,256L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#dde8fe" fill-opacity="1" d="M0,192L24,192C48,192,96,192,144,197.3C192,203,240,213,288,186.7C336,160,384,96,432,90.7C480,85,528,139,576,149.3C624,160,672,128,720,133.3C768,139,816,181,864,218.7C912,256,960,288,1008,266.7C1056,245,1104,171,1152,128C1200,85,1248,75,1296,85.3C1344,96,1392,128,1416,144L1440,160L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z"></path>
    </svg>
  </section>

  <section id="about">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-8">
          <h3>
            <center>Sistem Pakar Diagnosa Penyakit Stroke</center>
          </h3>
          <br>
          <center>
            <p>Sistem Pakar diagnosa Penyakit Stroke ini dapat melakukan diagnosa
              dini penyakit stroke dengan cara menerapkan pengetahuan yang diperoleh
              dari seorang ahli dan beberapa studi literatur. Sistem ini hanya
              dapat melakukan sampai tahap diagnosa awal, untuk tindakan selanjutnya
              pasien diharapkan datang langsung ke fasilitas kesehatan.
            </p>
          </center>
          <br>
          <div class="row nurita justify-content-center">
            <div class="col-sm-5">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Biodata Ahli</h5>
                  <br>
                  <center>
                    <img src="img/dr-Nurita.jpg" class="img-thumbnail rounded-circle" width="200px" alt="Dr. Nurita Hidayati, Sp.S">
                  </center>
                  <br>
                  <h5 class="card-title">Dr. Nurita Hidayati, Sp.S</h5>
                  <p class="card-text"><b>Dr. Nurita Hidayati, Sp.S</b> merupakan dokter specialis saraf
                    atau ahli dalam menangani pasien yang menderita atau mempunyai keluhan penyakit yang berhubungan dengan saraf.
                    Berikut ini adalah biodata singkat beliau
                  </p>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Nama Lengkap :</b> Dr. Nurita Hidayati, Sp.S</li>
                    <li class="list-group-item"><b>Riwayat Pendidikan</b>
                    <li class="list-group-item">
                      <p class="mb-1">SMAN 2 NGAWI JAWA TIMUR 1990-1993</p>
                      <p class="mb-1">FK UNIVERSITAS ISLAM SULTAN AGUNG SEMARANG ANGKATAN 93</p>
                      <p class="mb-1">NEUROLOGI UGM ANGKATAN 2011
                    </li>
                    </li>
                    <li class="list-group-item"><b>Riwayat Praktek</b>
                    <li class="list-group-item">
                      <p class="mb-1">RSUD KAB. BEKASI</p>
                      <p class="mb-1">RS. RIDHOKA SALMA</p>
                      <p class="mb-1">RS. HERMINA METLAND CIBITUNG</p>
                    </li>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-sm-5">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Biodata Pengembang</h5>
                  <br>
                  <center>
                    <img src="img/Way2.jpg" class="img-thumbnail rounded-circle" width="200px" alt="Wahyu Rudiansyah">
                  </center>
                  <br>
                  <h5 class="card-title">Wahyu Rudiansyah</h5>
                  <p class="card-text">Mahasiswa Teknik Informatika Fakultas Ilmu Komputer di Universitas Singaperbangsa Karawang
                  </p>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Nama Lengkap :</b> Wahyu Rudiansyah</li>
                    <li class="list-group-item"><b>Jurusan :</b> Teknik Informatika Universitas Singaperbangsa Karawang</li>
                    <li class="list-group-item"><b>Riwayat Pendidikan</b>
                    <li class="list-group-item">
                      <p class="mb-1">TEKNIK KOMPUTER JARINGAN SMK NEGERI 2 CIKARANG BARAT</p>
                    </li>
                    </li>
                    <li class="list-group-item"><b>Tempat Tanggal Lahir</b>
                    <li class="list-group-item">Sragen, 14 Juli 1999</li>
                    </li>
                    <li class="list-group-item"><b>Email</b>
                    <li class="list-group-item">wahyu.rudiansyah14@gmail.com</li>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>

  <section id="konsultasi">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#dde8fe" fill-opacity="1" d="M0,256L30,234.7C60,213,120,171,180,170.7C240,171,300,213,360,234.7C420,256,480,256,540,224C600,192,660,128,720,133.3C780,139,840,213,900,202.7C960,192,1020,96,1080,80C1140,64,1200,128,1260,170.7C1320,213,1380,235,1410,245.3L1440,256L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z">
      </path>
    </svg>
    <div class="container">
      <div class="row-cols-auto">
        <div class="col">
          <h2>Yuk Konsultasi,</h2>
          <h3>Isi Biodata Kamu Dulu Yaa !</h3>
        </div>
        <div class="row mt-5">
          <div class="col-md-6">
            <form action="functions-konsul.php" method="POST">
              <div class="mb-3">
                <input type="hidden" class="form-control" id="kd_pasien" name="kd_pasien" aria-describedby="kd_pasien">
              </div>
              <div class="mb-3">
                <label for="nama_pasien" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" aria-describedby="nama_pasien" required>
              </div>
              <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select mb-3 form-select" name="jenis_kelamin" id="jenis_kelamin" required>
                  <option selected>Pilih Jenis Kelamin</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="usia" class="form-label">Usia</label>
                <input type="text" class="form-control" id="usia" name="usia" aria-describedby="usia" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="email" required>
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <div class="form-floating">
                  <textarea class="form-control" placeholder="Leave a comment here" id="alamat" name="alamat" style="height: 100px" required></textarea>
                </div>
              </div>
              <button type="submit" class="btn btn-primary" name="user">Kirim</button>
            </form>
          </div>
        </div>
      </div>
    </div>
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
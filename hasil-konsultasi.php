<?php

include 'koneksi.php';
session_start();
if ($_SESSION['kd_pasien'] == NULL) {
    echo "<script>alert('Silakan isi form konsultasi terlebih dahulu!'); window.location=('/../konsul-form.php');</script>";
}

date_default_timezone_set("Asia/Jakarta");
$input_tanggal  = date('m-d-Y H:i:s');
$array_bobot = array('0', '0', '0.4', '0.6', '0.8', '1');
$array_gejala = array();

for ($no = 0; $no < count($_POST['kondisi']); $no++) {
    // Explode memisahkan string menjadi array
    $arkondisi = explode("_", $_POST['kondisi'][$no]);
    if (strlen($_POST['kondisi'][$no]) > 1) {
        $array_gejala += array($arkondisi[0] => $arkondisi[1]);
    }
}

// Memanggil kondisi dari db
$sqlkondisi         = mysqli_query($conn, "SELECT * FROM kondisi order by kd_kondisi+0");
while ($row_kondisi = mysqli_fetch_array($sqlkondisi)) {
    $array_kondisitext[$row_kondisi['kd_kondisi']] = $row_kondisi['kondisi'];
}

// Memanggil stadium penyakit
$sqlpkt = mysqli_query($conn, "SELECT * FROM datapenyakit order by kd_penyakit+0");
while ($row_penyakit = mysqli_fetch_array($sqlpkt)) {
    $nama_penyakit[$row_penyakit['kd_penyakit']] = $row_penyakit['nama_penyakit'];
    $keterangan_penyakit[$row_penyakit['kd_penyakit']] = $row_penyakit['keterangan'];
    $saran_penyakit[$row_penyakit['kd_penyakit']] = $row_penyakit['saran'];
}

// PERHITUNGAN CERTAINTY FACTOR

$sqlpenyakit = mysqli_query($conn, "SELECT * FROM datapenyakit order by kd_penyakit");
$arpenyakit = array();
while ($rpenyakit = mysqli_fetch_array($sqlpenyakit)) {
    $cf = 0;
    //filter by penyakit
    $sqlgejala = mysqli_query($conn, "SELECT * FROM basis_pengetahuan where kd_penyakit = '$rpenyakit[kd_penyakit]'");

    // $sqlgejala = mysqli_query($koneksi, "SELECT * FROM basis_pengetahuan where id_penyakit=3");
    $cf_rule = [];
    $c_fold = 0;
    while ($rgejala = mysqli_fetch_array($sqlgejala)) {

        $array_kondisi = explode("_", $_POST['kondisi'][0]);
        $gejala = $array_kondisi[0];

        for ($i = 0; $i < count($_POST['kondisi']); $i++) {
            $array_kondisi = explode("_", $_POST['kondisi'][$i]);
            $gejala = $array_kondisi[0];
            if ($rgejala['kd_gejala'] == $gejala) {
                $cf = ($rgejala['nilai_cf']) * $array_bobot[$array_kondisi[1]];
                array_push($cf_rule, $cf);
                $c_fold_arr = [];
                for ($i = 0; $i < count($cf_rule) - 1; $i++) {
                    $cf1 = $i == 0 ? $cf_rule[$i] : $c_fold;
                    $cf2 = $cf_rule[$i + 1];
                    if (($cf1 >= 0 && $cf2 > 0)) {
                        $cf_combine = $cf1 + $cf2 * (1 - $cf1);
                    } elseif ($cf1 < 0 || $cf2 < 0) {
                        $cf_combine = $cf1 + $cf2 / ((1 - abs($cf1)) + (1 - abs($cf2)));
                    } else {
                        $cf_combine = $cf1 + $cf2 * (1 + $cf1);
                    }
                    $c_fold = $cf_combine;
                    array_push($c_fold_arr, $c_fold);
                }
            }
        }
    }
    if ($c_fold > 0) {
        $arpenyakit += array($rpenyakit['kd_penyakit'] => number_format($c_fold, 5));
        arsort($arpenyakit);
    } elseif ($c_fold == 0) {
        $arpenyakit += array($rpenyakit['kd_penyakit'] => number_format(0, 0));
    }
}

arsort($arpenyakit);

$input_gejala = serialize($array_gejala);
$input_penyakit = serialize($arpenyakit);

$np1 = 0;
foreach ($arpenyakit as $key1 => $value1) {
    $np1++;
    $idpkt1[$np1] = $key1;
    $vlpkt1[$np1] = $value1;
}



$simpan = mysqli_query($conn, "INSERT INTO konsultasi(tanggal, gejala, penyakit) VALUES ('$input_tanggal','$input_gejala', '$input_penyakit')");
if ($simpan) {
    $kd_pasien = $_SESSION['kd_pasien'];
    $get_id_konsultasi  = mysqli_query($conn, "SELECT kd_konsultasi FROM konsultasi ORDER BY kd_konsultasi DESC LIMIT 1");
    while ($row_id_konsul = mysqli_fetch_array($get_id_konsultasi)) {
        $kd_konsultasi  = $row_id_konsul['kd_konsultasi'];
    }
    mysqli_query($conn, "INSERT INTO hasil_konsultasi(kd_konsultasi, kd_pasien, kd_penyakit, nilai_akurasi) VALUES ('$kd_konsultasi', '$kd_pasien', '$idpkt1[1]', '$vlpkt1[1]')");
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="scss/konsul.css">
    <link rel="icon" type="img/png" href="/img/unsika-logo-remake.png">
    <script src="https://kit.fontawesome.com/807ea63ce3.js" crossorigin="anonymous"></script>
    <title>Hasil Konsultasi</title>
</head>

<body id="home">
    <nav class="nav-custom navbar navbar-expand-lg navbar-light bg-light">
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
        <path fill="#dde8fe" fill-opacity="1" d="M0,160L26.7,133.3C53.3,107,107,53,160,48C213.3,43,267,85,320,101.3C373.3,117,427,107,480,128C533.3,149,587,203,640,192C693.3,181,747,107,800,85.3C853.3,64,907,96,960,138.7C1013.3,181,1067,235,1120,224C1173.3,213,1227,139,1280,101.3C1333.3,64,1387,64,1413,64L1440,64L1440,0L1413.3,0C1386.7,0,1333,0,1280,0C1226.7,0,1173,0,1120,0C1066.7,0,1013,0,960,0C906.7,0,853,0,800,0C746.7,0,693,0,640,0C586.7,0,533,0,480,0C426.7,0,373,0,320,0C266.7,0,213,0,160,0C106.7,0,53,0,27,0L0,0Z"></path>
    </svg>

    <section id="table-gejala">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <h2>Hasil Diagnosa</h2>
                    <h3>Mohon diperhatikan Hasil Diagnosanya yaa !</h3>
                    <br>
                    <table class="table table-light table-responsive-md table-bordered mt-5 table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Gejala</th>
                                <th>Gejala Penyakit</th>
                                <th>Kondisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ig = 0;
                            foreach ($array_gejala as $key => $value) {
                                $kondisi = $value;
                                $ig++;
                                $gejala = $key;
                                $query_gejala_hasil = mysqli_query($conn, "SELECT * FROM datagejala where kd_gejala = '$key'");
                                $r4 = mysqli_fetch_array($query_gejala_hasil);
                            ?>
                                <tr style="text-align: center;">
                                    <td><?php echo $ig ?></td>
                                    <td><?php echo $r4['kd_gejala']; ?></td>
                                    <td style="text-align: justify;"><?php echo $r4['nama_gejala'] ?></td>
                                    <td><?php echo $array_kondisitext[$kondisi] ?></td>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="card card-body bg-light">
                    <h5>Diagnosa</h5>
                    <div class="jumbotron jumbotron-fluid">
                        <?php
                        $np = 0;
                        foreach ($arpenyakit as $key => $value) {
                            $np++;
                            $idpkt[$np] = $key;
                            $nmpkt[$np] = $nama_penyakit[$key];
                            $vlpkt[$np] = $value;
                        }

                        ?>
                        <div class="container">
                            <div style="padding-left: 3%;">
                                <?php
                                if ($nmpkt[1] != "Tidak Terindikasi Stroke") {
                                    echo "<p class='lead fw-normal'>Berdasarkan kondisi yang telah anda pilih pada halaman sebelumnya, maka dapat disimpulkan bahwa </p>";
                                    echo "<p style='font-size: 30px;font-weight:400' class='fw-bolder'>Terdapat Kemungkinan Anda Terkena Penyakit $nmpkt[1] </p>";
                                    echo "<h6 style='margin-top: -20px;'>dengan tingkat akurasi sebesar " . number_format($vlpkt[1] * 100, 2) . "%</h6>";
                                } else {
                                    echo "<p class='lead' style='text-align: justify;'>Berdasarkan kondisi yang telah anda pilih pada halaman sebelumnya, dapat disimpulkan bahwa anda</p>";
                                    echo "<p style='font-size: 40px;font-weight:500'> $nmpkt[1]</p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" style="margin-top: 2%;">
                    <div class="card-header" style="background-color: rgba(221, 232, 254, 1);">
                        <b>Keterangan</b>
                    </div>
                    <div class="card-body">
                        <?php echo $keterangan_penyakit[$idpkt[1]] ?>
                    </div>
                </div>
                <div class="card" style="margin-top: 2%;">
                    <div class="card-header" style="background-color: rgba(242, 242, 6, 1);">
                        <b>Saran</b>
                    </div>
                    <div class="card-body">
                        <p>Untuk hasil diagnosa yang lebih akurat, anda dapat menghubungi dokter terdekat untuk melakukan pemeriksaan dan tindakan lebih lanjut.</p>
                        <?php echo $saran_penyakit[$idpkt[1]] ?>.
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
<?php
unset($_SESSION['kd_pasien']);
?>

</html>
<?php
include('koneksi.php');
$nama_pasien    = $_POST['nama_pasien'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$usia           = $_POST['usia'];
$email          = $_POST['email'];
$alamat         = $_POST['alamat'];

$query_simpan  = mysqli_query($conn, "INSERT INTO datapasien VALUES(NULL, '$nama_pasien','$jenis_kelamin', '$usia', '$email', '$alamat')");
if ($query_simpan) {
    $query_get_id = mysqli_query($conn, "SELECT kd_pasien FROM datapasien ORDER BY kd_pasien DESC LIMIT 1");
    while ($row_id = mysqli_fetch_array($query_get_id)) {
        session_start();
        $_SESSION['kd_pasien'] = $row_id['kd_pasien'];
?>

        <script>
            window.location = 'konsul.php'
        </script>
<?php
    }
} else {
    echo "<script>window.location='/../konsul-form.php';</script>";
}
?>
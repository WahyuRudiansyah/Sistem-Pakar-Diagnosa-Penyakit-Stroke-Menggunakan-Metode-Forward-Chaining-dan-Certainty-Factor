<?php
$host = 'sql308.epizy.com';
$dbusername = 'epiz_29360583';
$dbpassword = 'w4hyurud123';
$dbname = 'epiz_29360583_sispakta';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if (!$conn) {
    die("Koneksi gagal:" . mysqli_connect_error());
}


function pengetahuan($pengetahuan)
{
    global $conn;
    $result = mysqli_query($conn, $pengetahuan);
    $rows = [];

    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah_pengetahuan($data)
{
    global $conn;

    //mengambil data dari tiap elemen form
    $kd_penyakit = htmlspecialchars($data["nama_penyakit"]);
    $kd_gejala = htmlspecialchars($data["nama_gejala"]);
    $cf = htmlspecialchars($data["nilai_cf"]);

    //query insert data
    $query = "INSERT INTO basis_pengetahuan
			 VALUES
			 ('','$kd_penyakit','$kd_gejala','$cf')
			 ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function update_pengetahuan($data)
{
    global $conn;

    //mengambil data dari tiap elemen form
    $kd_pengetahuan = htmlspecialchars($data["kd_pengetahuan"]);
    $kd_penyakit = htmlspecialchars($data["nama_penyakit"]);
    $kd_gejala = htmlspecialchars($data["nama_gejala"]);
    $cf = htmlspecialchars($data["nilai_cf"]);

    //query insert data
    $query = "UPDATE basis_pengetahuan SET 
				kd_penyakit = '$kd_penyakit',
                kd_gejala = '$kd_gejala',
                nilai_cf = '$cf'

			  WHERE kd_pengetahuan = $kd_pengetahuan
			 ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus_pengetahuan($kd_pengetahuan)
{
    global $conn;

    //query delete data
    mysqli_query($conn, "DELETE FROM basis_pengetahuan WHERE kd_pengetahuan = '$kd_pengetahuan'");

    return mysqli_affected_rows($conn);
}

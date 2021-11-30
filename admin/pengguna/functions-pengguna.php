<?php
$host = 'sql308.epizy.com';
$dbusername = 'epiz_29360583';
$dbpassword = 'w4hyurud123';
$dbname = 'epiz_29360583_sispakta';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if (!$conn) {
    die("Koneksi gagal:" . mysqli_connect_error());
}


function pengguna($pengguna)
{
    global $conn;
    $result = mysqli_query($conn, $pengguna);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah_pengguna($data)
{
    global $conn;

    //mengambil data dari tiap elemen form
    $nama_pasien = htmlspecialchars($data["nama_pasien"]);
    $jenis_kelamin = $data["jenis_kelamin"];
    $usia = htmlspecialchars($data["usia"]);
    $email = htmlspecialchars($data["email"]);
    $alamat = htmlspecialchars($data["alamat"]);

    //query insert data
    $query = "INSERT INTO datapasien
			 VALUES
			 ('','$nama_pasien','$jenis_kelamin','$usia','$email','$alamat')
			 ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function update_pengguna($data)
{
    global $conn;

    //mengambil data dari tiap elemen form
    $kd_pasien = $data["kd_pasien"];
    $nama_pasien = htmlspecialchars($data["nama_pasien"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $usia = htmlspecialchars($data["usia"]);
    $email = htmlspecialchars($data["email"]);
    $alamat = htmlspecialchars($data["alamat"]);

    //query insert data
    $query = "UPDATE datapasien SET 
				nama_pasien = '$nama_pasien',
                jenis_kelamin = '$jenis_kelamin',
                usia = '$usia',
                email = '$email',
                alamat = '$alamat'

			  WHERE kd_pasien = $kd_pasien
			 ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus_pengguna($kd_pasien)
{
    global $conn;

    //query delete data
    mysqli_query($conn, "DELETE FROM datapasien WHERE kd_pasien = '$kd_pasien'");

    return mysqli_affected_rows($conn);
}

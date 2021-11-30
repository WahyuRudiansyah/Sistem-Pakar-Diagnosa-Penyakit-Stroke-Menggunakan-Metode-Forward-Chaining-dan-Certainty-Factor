<?php
$host = 'sql308.epizy.com';
$dbusername = 'epiz_29360583';
$dbpassword = 'w4hyurud123';
$dbname = 'epiz_29360583_sispakta';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if (!$conn) {
    die("Koneksi gagal:" . mysqli_connect_error());
}


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah_gejala($data)
{
    global $conn;

    //mengambil data dari tiap elemen form
    $kd_gejala = htmlspecialchars($data["kd_gejala"]);
    $nama_gejala = htmlspecialchars($data["nama_gejala"]);

    //query insert data
    $query = "INSERT INTO datagejala
			 VALUES
			 ('$kd_gejala','$nama_gejala')
			 ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function update_gejala($data)
{
    global $conn;

    //mengambil data dari tiap elemen form
    $kd_gejala = $data["kd_gejala"];
    $nama_gejala = htmlspecialchars($data["nama_gejala"]);

    //query insert data
    $query = "UPDATE datagejala SET 
				nama_gejala = '$nama_gejala'

			  WHERE kd_gejala = '$kd_gejala'
			 ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus_gejala($kd_gejala)
{
    global $conn;

    //query delete data
    mysqli_query($conn, "DELETE FROM datagejala WHERE kd_gejala = '" . $kd_gejala . "'");

    return mysqli_affected_rows($conn);
}

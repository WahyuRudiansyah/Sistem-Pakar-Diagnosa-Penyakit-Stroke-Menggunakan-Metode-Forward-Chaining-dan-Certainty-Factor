<?php
$host = 'sql308.epizy.com';
$dbusername = 'epiz_29360583';
$dbpassword = 'w4hyurud123';
$dbname = 'epiz_29360583_sispakta';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if (!$conn) {
    die("Koneksi gagal:" . mysqli_connect_error());
}


function penyakit($penyakit)
{
    global $conn;
    $result = mysqli_query($conn, $penyakit);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah_penyakit($data)
{
    global $conn;

    //mengambil data dari tiap elemen form
    $kd_penyakit = htmlspecialchars($data["kd_penyakit"]);
    $nama_penyakit = htmlspecialchars($data["nama_penyakit"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $saran = htmlspecialchars($data["saran"]);

    //query insert data
    $query = "INSERT INTO datapenyakit
			 VALUES
			 ('$kd_penyakit','$nama_penyakit','$keterangan','$saran')
			 ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function update_penyakit($data)
{
    global $conn;

    //mengambil data dari tiap elemen form
    $kd_penyakit = $data["kd_penyakit"];
    $nama_penyakit = htmlspecialchars($data["nama_penyakit"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $saran = htmlspecialchars($data["saran"]);

    //query insert data
    $query = "UPDATE datapenyakit SET 
				nama_penyakit = '$nama_penyakit',
                keterangan = '$keterangan',
                saran = '$saran'

			  WHERE kd_penyakit = '$kd_penyakit'
			 ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus_penyakit($kd_penyakit)
{
    global $conn;

    //query delete data
    mysqli_query($conn, "DELETE FROM datapenyakit WHERE kd_penyakit = '" . $kd_penyakit . "'");

    return mysqli_affected_rows($conn);
}

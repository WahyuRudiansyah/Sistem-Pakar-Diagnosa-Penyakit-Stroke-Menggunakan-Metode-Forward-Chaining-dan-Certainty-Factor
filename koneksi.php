<?php
$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'sispakta';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if (!$conn) {
    die("Koneksi gagal:" . mysqli_connect_error());
}

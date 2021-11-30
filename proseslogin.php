<?php
$host = 'sql308.epizy.com';
$dbusername = 'epiz_29360583';
$dbpassword = 'w4hyurud123';
$dbname = 'epiz_29360583_sispakta';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if (!$conn) {
    die("Koneksi gagal:" . mysqli_connect_error());
}


if (isset($_POST["login"])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $result = "SELECT * FROM dataadmin WHERE username = '$username' AND password = '$password'";
    $runlogin = $conn->query($result);
    $masuk = $runlogin->fetch_assoc();
    //cek username
    if ($runlogin->num_rows > 0) {
        $_SESSION["login"] = true;
        //cek password
        $_SESSION['username'] = $username;
        header("Location: admin/dashboard.php");
    } else {
        $_SESSION['status'] = "Username atau Password Salah";
    }
}

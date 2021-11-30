<?php

require 'functions-pengguna.php';

$kd_pasien = $_GET['kd_pasien'];

if (hapus_pengguna($kd_pasien) > 0) {
    echo " <script>
					alert('Data berhasil dihapus');
					document.location.href ='../pengguna.php';
			   </script>
			 ";
} else {
    echo " <script>
					alert('Data gagal dihapus');
					document.location.href ='../pengguna.php';
			   </script>
			 ";
}

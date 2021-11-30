<?php

require 'functions-penyakit.php';

$kd_penyakit = $_GET['kd_penyakit'];

if (hapus_penyakit($kd_penyakit) > 0) {
	echo " <script>
					alert('Data berhasil dihapus');
					document.location.href ='../penyakit.php';
			   </script>
			 ";
} else {
	echo " <script>
					alert('Data gagal dihapus');
					document.location.href ='../penyakit.php';
			   </script>
			 ";
}

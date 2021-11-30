<?php

require 'functions-gejala.php';

$kd_gejala = $_GET['kd_gejala'];

if (hapus_gejala($kd_gejala) > 0) {
	echo " <script>
					alert('Data berhasil dihapus');
					document.location.href ='../gejala.php';
			   </script>
			 ";
} else {
	echo " <script>
					alert('Data gagal dihapus');
					document.location.href ='../gejala.php';
			   </script>
			 ";
}

<?php

require 'functions-pengetahuan.php';

$kd_pengetahuan = $_GET['kd_pengetahuan'];

if (hapus_pengetahuan($kd_pengetahuan) > 0) {
	echo " <script>
					alert('Data berhasil dihapus');
					document.location.href ='../basis-pengetahuan.php';
			   </script>
			 ";
} else {
	echo " <script>
					alert('Data gagal dihapus');
					document.location.href ='../basis-pengetahuan.php';
			   </script>
			 ";
}

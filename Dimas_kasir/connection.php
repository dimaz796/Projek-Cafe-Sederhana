<?php 
$Dimas_host = "localhost";
$Dimas_username = "root";
$Dimas_password = "";
$Dimas_database = "dimas_kasir";

$conn = new mysqli($Dimas_host, $Dimas_username, $Dimas_password, $Dimas_database);

if ($conn -> connect_error) {
	echo "Gagal Koneksi ke Database";
}else{
	//echo "Koneksi Berhasil";
}

 ?>
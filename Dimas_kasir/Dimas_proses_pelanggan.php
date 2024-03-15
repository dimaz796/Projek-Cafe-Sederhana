<?php 
include 'connection.php';

if (isset($_POST['simpan'])) {

$Dimas_nama_pelanggan = $_POST['nama_pelanggan'];
$Dimas_alamat = $_POST['alamat'];
$Dimas_no_telepon = $_POST['no_telepon'];
$Dimas_jenis_kelamin = $_POST['jenis_kelamin'];
$Dimas_tempat_lahir = $_POST['tempat_lahir'];
$Dimas_tanggal_lahir = $_POST['tanggal_lahir'];
$Dimas_jenis_pelanggan = $_POST['jenis_pelanggan'];

$Dimas_sql = "INSERT INTO `dimas_pelanggan` VALUES (NULL, '$Dimas_nama_pelanggan', '$Dimas_alamat', 
			  '$Dimas_no_telepon','$Dimas_jenis_kelamin','$Dimas_tempat_lahir',
              '$Dimas_tanggal_lahir','$Dimas_jenis_pelanggan');";
$Dimas_query = mysqli_query($conn,$Dimas_sql);

	if($Dimas_query){
		echo "
		<script>
				alert('Data Pelanggann Berhasil di simpan');
				window.location.href='Dimas_master_pelanggan.php';
		</script>";
	}else{
		echo "
		<script>
			alert('Data Pelanggann Gagal di Simpan');
			window.location.href='Dimas_tambah_pelanggan.php';
		</script>";
	}
}

elseif(isset($_POST['ubah'])) {
    $Dimas_id_pelanggan = $_POST['id_pelanggan'];
    $Dimas_nama_pelanggan = $_POST['nama_pelanggan'];
    $Dimas_alamat = $_POST['alamat'];
    $Dimas_no_telepon = $_POST['no_telepon'];
    $Dimas_jenis_kelamin = $_POST['jenis_kelamin'];
    $Dimas_tempat_lahir = $_POST['tempat_lahir'];
    $Dimas_tanggal_lahir = $_POST['tanggal_lahir'];
    $Dimas_jenis_pelanggan = $_POST['jenis_pelanggan'];

	$Dimas_result = mysqli_query($conn, "UPDATE `dimas_pelanggan` SET `nama_pelanggan` = '$Dimas_nama_pelanggan', `alamat` = '$Dimas_alamat'
										 , `no_telepon` = '$Dimas_no_telepon',`jenis_kelamin` = '$Dimas_jenis_kelamin' ,
                                         `tempat_lahir` = '$Dimas_tempat_lahir' ,`tanggal_lahir` = '$Dimas_tanggal_lahir'  ,`jenis_pelanggan` = '$Dimas_jenis_pelanggan'
										 WHERE `id_pelanggan` = '$Dimas_id_pelanggan'");



	if($Dimas_result){
		echo "
		<script>
				alert('Data User Berhasil diubah');
				window.location.href='Dimas_master_pelanggan.php';
		</script>";
	}else{
		echo "
		<script>
			alert('Data User Gagal diubah');
			window.location.href='Dimas_master_pelanggan.php';
		</script>";
	}
}

 ?>
	


<?php 
include 'connection.php';

if (isset($_POST['simpan'])) {

$Dimas_nama_menu = $_POST['nama_menu'];
$Dimas_harga = $_POST['harga'];
$Dimas_kategori = $_POST['kategori'];
$Dimas_foto_menu = $_POST['foto_menu'];
$Dimas_status_menu = $_POST['status_menu'];

$Dimas_sql = "INSERT INTO `dimas_menu` VALUES (NULL, '$Dimas_nama_menu', '$Dimas_harga', 
			  '$Dimas_kategori','$Dimas_foto_menu','$Dimas_status_menu');";
$Dimas_query = mysqli_query($conn,$Dimas_sql);

	if($Dimas_query){
		echo "
		<script>
				alert('Data Role Berhasil di simpan');
				window.location.href='Dimas_master_menu.php';
		</script>";
	}else{
		echo "
		<script>
			alert('Data Role Gagal di Simpan');
			window.location.href='Dimas_tambah_menu.php';
		</script>";
	}
}

elseif(isset($_POST['ubah'])) {
	$Dimas_id_menu = $_POST['id_menu'];
	$Dimas_nama_menu = $_POST['nama_menu'];
	$Dimas_harga = $_POST['harga'];
	$Dimas_kategori = $_POST['kategori'];
	$Dimas_foto_menu = $_POST['foto'];
	$Dimas_status_menu = $_POST['status_menu'];
if ($Dimas_foto_menu == NULL) {
	$Dimas_result = mysqli_query($conn, "UPDATE `dimas_menu` SET `nama_menu` = '$Dimas_nama_menu', `harga_menu` = '$Dimas_harga'
										 , `status_menu` = '$Dimas_status_menu'  
										 WHERE `dimas_menu`.`id_menu` = '$Dimas_id_menu'");
}else{
	$Dimas_result = mysqli_query($conn, "UPDATE `dimas_menu` SET `nama_menu` = '$Dimas_nama_menu', `harga_menu` = '$Dimas_harga'
										 , `foto_menu` = '$Dimas_foto_menu',`status_menu` = '$Dimas_status_menu'  
										 WHERE `dimas_menu`.`id_menu` = '$Dimas_id_menu'");
}


	if($Dimas_result){
		echo "
		<script>
				alert('Data User Berhasil diubah');
				window.location.href='Dimas_master_menu.php';
		</script>";
	}else{
		echo "
		<script>
			alert('Data User Gagal diubah');
			window.location.href='Dimas_master_menu.php';
		</script>";
	}
}

 ?>
	


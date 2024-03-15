<?php 
include 'connection.php';

if (isset($_POST['simpan'])) {


$Dimas_nama = $_POST['nama'];
$Dimas_sql = "INSERT INTO `dimas_kategori` VALUES (NULL, '$Dimas_nama');";
$Dimas_query = mysqli_query($conn,$Dimas_sql);

	if($Dimas_query){
		echo "
		<script>
				alert('Data kategori Berhasil di simpan');
				window.location.href='Dimas_master_kategori.php';
		</script>";
	}else{
		echo "
		<script>
			alert('Data kategori Gagal di Simpan');
			window.location.href='Dimas_tambah_kategori.php';
		</script>";
	}
}

elseif(isset($_POST['ubah'])) {

$Dimas_id_kategori = $_POST['id_kategori'];
$Dimas_nama = $_POST['nama'];
$Dimas_result = mysqli_query($conn, "UPDATE dimas_kategori SET `nama_kategori` = '$Dimas_nama' WHERE `id_kategori` = $Dimas_id_kategori");

	if($Dimas_result){
		echo "
		<script>
				alert('Data Kategori Berhasil diubah');
				window.location.href='Dimas_master_kategori.php';
		</script>";
	}else{
		echo "
		<script>
			alert('Data Kategori Gagal diubah');
			window.location.href='Dimas_master_kategori.php';
		</script>";
	}
}

 ?>
	


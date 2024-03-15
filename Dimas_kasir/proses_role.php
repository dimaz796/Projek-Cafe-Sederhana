<?php 
include 'connection.php';

if (isset($_POST['simpan'])) {


$Dimas_nama = $_POST['nama'];
$Dimas_sql = "INSERT INTO `dimas_nama_role` VALUES (NULL, '$Dimas_nama');";
$Dimas_query = mysqli_query($conn,$Dimas_sql);

	if($Dimas_query){
		echo "
		<script>
				alert('Data Role Berhasil di simpan');
				window.location.href='master_role.php';
		</script>";
	}else{
		echo "
		<script>
			alert('Data Role Gagal di Simpan');
			window.location.href='tambah_role.php';
		</script>";
	}
}

elseif(isset($_POST['ubah'])) {

$Dimas_id_role = $_POST['id_role'];
$Dimas_nama = $_POST['nama'];
$Dimas_result = mysqli_query($conn, "UPDATE dimas_nama_role SET `nama` = '$Dimas_nama' WHERE `id_role` = $Dimas_id_role");

	if($Dimas_result){
		echo "
		<script>
				alert('Data Role Berhasil diubah');
				window.location.href='master_role.php';
		</script>";
	}else{
		echo "
		<script>
			alert('Data Role Gagal diubah');
			window.location.href='master_role.php';
		</script>";
	}
}

 ?>
	


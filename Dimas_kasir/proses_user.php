<?php 
include 'connection.php';

if (isset($_POST['simpan'])) {

$Dimas_id_role = $_POST['id_role'];
$Dimas_nama_user = $_POST['nama_user'];
$Dimas_username = $_POST['username'];
$Dimas_password = md5($_POST['password']);
$Dimas_role = $_POST['role'];
$Dimas_sql = "INSERT INTO `dimas_user` VALUES (NULL, '$Dimas_role', '$Dimas_username', 
			  '$Dimas_password','$Dimas_nama_user');";
$Dimas_query = mysqli_query($conn,$Dimas_sql);

	if($Dimas_query){
		echo "
		<script>
				alert('Data Role Berhasil di simpan');
				window.location.href='master_user.php';
		</script>";
	}else{
		echo "
		<script>
			alert('Data Role Gagal di Simpan');
			window.location.href='tambah_user.php';
		</script>";
	}
}

elseif(isset($_POST['ubah'])) {

$Dimas_nama_user = $_POST['nama_user'];
$Dimas_id_user = $_POST['id_user'];
$Dimas_id_role = $_POST['id_role'];
$Dimas_username = $_POST['username'];
$Dimas_password = $_POST['password'];
if ($Dimas_password == "") {
	$Dimas_result = mysqli_query($conn, "UPDATE `dimas_user` SET `nama_user` = '$Dimas_nama_user', `username` = '$Dimas_username'
										 , `id_role` = '$Dimas_id_role'  
										 WHERE `dimas_user`.`id_user` = '$Dimas_id_user'");
}else{
	$Dimas_result = mysqli_query($conn, "UPDATE `dimas_user` SET `nama_user` = '$Dimas_nama_user', `username` = '$Dimas_username' ,
									 `password` = md5('$Dimas_password') , `id_role` = '$Dimas_id_role'  
									 WHERE `dimas_user`.`id_user` = '$Dimas_id_user'");
}


	if($Dimas_result){
		echo "
		<script>
				alert('Data User Berhasil diubah');
				window.location.href='master_user.php';
		</script>";
	}else{
		echo "
		<script>
			alert('Data User Gagal diubah');
			window.location.href='master_user.php';
		</script>";
	}
}

 ?>
	


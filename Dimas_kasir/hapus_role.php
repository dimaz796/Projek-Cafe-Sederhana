<?php 
include 'connection.php';

$Dimas_id = $_GET['id'];
$Dimas_sql = "DELETE FROM dimas_nama_role WHERE id_role=$Dimas_id";
$Dimas_hapus = mysqli_query($conn,$Dimas_sql);

	if($Dimas_hapus){
		echo "
		<script>
				alert('Data Role Berhasil di Hapus');
				window.location.href='master_role.php';
		</script>";
	}else{
		echo "
		<script>
			alert('Data Role Berhasil di Hapus');
			window.location.href='master_role.php';
		</script>";
	}

 ?>
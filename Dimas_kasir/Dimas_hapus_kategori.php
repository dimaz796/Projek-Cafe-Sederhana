<?php 
include 'connection.php';

$Dimas_id = $_GET['id'];
$Dimas_sql = "DELETE FROM dimas_kategori WHERE id_kategori=$Dimas_id";
$Dimas_hapus = mysqli_query($conn,$Dimas_sql);

	if($Dimas_hapus){
		echo "
		<script>
				alert('Data Kategori Berhasil di Hapus');
				window.location.href='Dimas_master_kategori.php';
		</script>";
	}else{
		echo "
		<script>
			alert('Data Kategori Berhasil di Hapus');
			window.location.href='Dimas_master_kategori.php';
		</script>";
	}

 ?>
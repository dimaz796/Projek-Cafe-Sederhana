<?php 
include 'connection.php';

$Dimas_id = $_GET['id'];
$Dimas_sql = "DELETE FROM dimas_detail_order_temp WHERE id_detail_order_temp=$Dimas_id";
$Dimas_hapus = mysqli_query($conn,$Dimas_sql);

	if($Dimas_hapus){
        $DimasAi = mysqli_query($conn, "ALTER TABLE dimas_detail_order_temp AUTO_INCREMENT = $Dimas_Id");
		echo "
		<script>
				alert('Data Orderan Berhasil di Hapus');
				window.location.href='Dimas_tambah_order.php';
		</script>";
	}else{
		echo "
		<script>
			alert('Data Orderan Berhasil di Hapus');
			window.location.href='Dimas_tambah_order.php';
		</script>";
	}

 ?>
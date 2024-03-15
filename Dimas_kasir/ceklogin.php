<?php 
	session_start();

	include "connection.php";

	$Dimas_username = $_POST['username'];
	$Dimas_password = md5($_POST['password']);

	$Dimas_query = mysqli_query($conn, "SELECT * 
										FROM `dimas_user` 
										WHERE username='$Dimas_username' 
										AND password='$Dimas_password'");

	$Dimas_count = mysqli_num_rows($Dimas_query);


	if ($Dimas_count > 0) {
		$login = mysqli_fetch_array($Dimas_query);
		$_SESSION['id_user'] = $login['id_user'];
		$_SESSION['username'] = $login['username'];
		$_SESSION['password'] = $login['password'];
		$_SESSION['id_role'] = $login['id_role'];
		$_SESSION['nama_user'] = $login['nama_user'];
		$_SESSION['id_user'] = $login['id_user'];
		$_SESSION['status'] = 'login';

	if ($login['id_role'] == 1) {
		echo "<script>
				alert('Login Berhasil,Anda Adalah Admin!');
				window.location.href='Dimas_home_admin.php';
			</script>";
		}
	elseif ($login['id_role'] == 2) {
	echo "<script>
			alert('Login Berhasil,Anda Adalah Manager!');
			window.location.href='Dimas_home_manager.php';
		</script>";
	}elseif ($login['id_role'] == 3) {
		echo "<script>
				alert('Login Berhasil,Anda Adalah Kasir!');
				window.location.href='Dimas_home_kasir.php';
			</script>";
		}
	
	}else{
		echo "<script>
				window.location.href='index.php?pesan=gagal';
			</script>";
	}
	
	


 ?>	

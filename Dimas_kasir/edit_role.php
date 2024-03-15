<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Role</title>
</head>
<body>
	<?php 
include"navbar.php";

	$Dimas_id = $_GET['id'];
	$Dimas_result = mysqli_query($conn, "SELECT * FROM dimas_nama_role WHERE id_role=$Dimas_id");

	while($Dimas_role_data = mysqli_fetch_array($Dimas_result)){
		$Dimas_nama_role = $Dimas_role_data['nama'];
		$Dimas_id_role = $Dimas_role_data['id_role'];
	}


 ?>
<div class="main">

<form method="post" action="proses_role.php">
	 <h1>Edit Role</h1>
	 <input type="hidden" name="id_role" value="<?=$Dimas_id_role?>">
	 <br>
	 Nama Role
	 <br>
	 <input type="text" name="nama" class="form-control w-100" value="<?=$Dimas_nama_role?>"><br><br>
	 <button type="submit" name="ubah" class="btn btn-primary w-100">Ubah</button>
</form>

 </div>

</body>
</html>
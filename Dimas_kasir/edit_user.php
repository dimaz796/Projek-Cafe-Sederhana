<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ubah User</title>
</head>
<body>
	<?php 
include"navbar.php";
$Dimas_sql = "SELECT * FROM `dimas_nama_role`";
$Dimas_role = mysqli_query($conn, $Dimas_sql);
$DimasA = mysqli_fetch_all($Dimas_role);
	
	$Dimas_id = $_GET['id'];
	$Dimas_result = mysqli_query($conn, "SELECT * FROM dimas_user WHERE id_user=$Dimas_id");

	while($Dimas_user_data = mysqli_fetch_array($Dimas_result)){
		$Dimas_nama_user = $Dimas_user_data['nama_user'];
		$Dimas_id_user = $Dimas_user_data['id_user'];
		$Dimas_username_user = $Dimas_user_data['username'];
		$Dimas_password_user = $Dimas_user_data['password'];
		$Dimas_role = $Dimas_user_data['id_role'];


	}


 ?>
<div class="main">

<form method="post" action="proses_user.php">
	 <h1>Edit User</h1>
	 <input type="hidden" name="id_role" value="<?=$Dimas_id_role?>">
	 <input type="hidden" name="id_user" value="<?=$Dimas_id?>">
	 <br>
	 Nama User
	 <br>
	 <input type="text" name="nama_user" class="form-control w-100" value="<?=$Dimas_nama_user?>"><br><br>

	 Username
	 <br>
	 <input type="text" name="username" class="form-control w-100" value="<?=$Dimas_username_user?>"><br><br>

	 Password
	 <br>
	 <input type="text" name="password" class="form-control w-100" placeholder = "Jida Tidak Ganti Password Diamkan Saja"><br><br>

	 Role
	 <br>
	 	<select name="id_role" class="form-select w-100" style="height: 25px; width: 610px;">
	<?php foreach($DimasA as $row) : ?>
		<option value="<?= $row[0] ?>"><?= $row[1] ?></option>
		<?php endforeach ?>
	</select> 
	<br><br>
	 
	 <button type="submit" name="ubah" class="btn btn-primary w-100">Ubah</button>
</form>


 </div>

</body>
</html>
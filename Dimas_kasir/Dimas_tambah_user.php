<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah User</title>
</head>
<body>
	<?php 
include"navbar.php";

$Dimas_sql = "SELECT * FROM `dimas_nama_role`";
$Dimas_role = mysqli_query($conn, $Dimas_sql);
$DimasA = mysqli_fetch_all($Dimas_role);

 ?>
<div class="main">
<form method="post" action="proses_user.php">
	 <h1>Tambah User</h1>
	 <br>
	 Nama User
	 <br>
	 <input type="text" name="nama_user" class="form-control w-100" placeholder=" Masukan Nama User"><br><br>
	 Username
	 <br>
	 <input type="text" name="username" class="form-control w-100" placeholder=" Masukan Username"><br><br>
	 Password
	 <br>
	 <input type="text" name="password" class="form-control w-100" placeholder=" Masukan Password"><br><br>

	 Role <br>
	 	<select name="role" class="form-select w-100 p-1" style="height: 25px; width: 610px;">
	 		<?php foreach($DimasA as $row) : ?>
		<option value="<?= $row[0] ?>"><?= $row[1] ?></option>
		<?php endforeach ?>
	</select> 
	<br><br>

	 <button type="submit" name="simpan" class="btn btn-primary w-100">Simpan</button>
</form>

 </div>

</body>
</html>
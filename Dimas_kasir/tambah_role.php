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
 ?>
<div class="main">
<form method="post" action="proses_role.php">
	 <h1>Tambah Role</h1>
	 <br>
	 Nama Role
	 <br>
	 <input type="text" name="nama" class="inputrole" placeholder=" Masukan Nama Role"><br><br>
	 <button type="submit" name="simpan" class="buttonrole">Simpan</button>
</form>

 </div>

</body>
</html>
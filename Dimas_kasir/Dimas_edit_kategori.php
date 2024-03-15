<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit kategori</title>
</head>
<body>
	<?php 
 include"navbar.php";

	$Dimas_id = $_GET['id'];
	$Dimas_result = mysqli_query($conn, "SELECT * FROM dimas_kategori WHERE id_kategori=$Dimas_id");

	while($Dimas_kategori_data = mysqli_fetch_array($Dimas_result)){
		$Dimas_nama_kategori = $Dimas_kategori_data['nama_kategori'];
		$Dimas_id_kategori = $Dimas_kategori_data['id_kategori'];
	}


 ?>
<div class="main">

<form method="post" action="Dimas_proses_kategori.php">
	 <h1>Edit kategori</h1>
	 <input type="hidden" name="id_kategori" value="<?=$Dimas_id_kategori?>">
	 <br>
	 Nama kategori
	 <br>
	 
	 <input type="text" name="nama" class="form-control w-100" value="<?=$Dimas_nama_kategori?>"><br><br>
	 <button type="submit" name="ubah" class="btn btn-primary p-2 w-100">Ubah</button>
</form>

 </div>

</body>
</html>
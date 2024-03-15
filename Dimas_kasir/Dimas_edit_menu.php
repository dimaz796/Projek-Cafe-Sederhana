<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ubah menu</title>
</head>
<body>
	<?php 
include"navbar.php";
$Dimas_sql = "SELECT * FROM `dimas_kategori`";
$Dimas_menu = mysqli_query($conn, $Dimas_sql);
$DimasA = mysqli_fetch_all($Dimas_menu);
	
	$Dimas_id = $_GET['id'];
	$Dimas_result = mysqli_query($conn, "SELECT * FROM dimas_menu JOIN dimas_kategori 
										ON dimas_menu.id_kategori = dimas_kategori.id_kategori 
										WHERE id_menu=$Dimas_id");

	while($Dimas_menu_data = mysqli_fetch_array($Dimas_result)){
		$Dimas_nama_menu = $Dimas_menu_data['nama_menu'];
		$Dimas_id_menu = $Dimas_menu_data['id_menu'];
		$Dimas_harga_menu = $Dimas_menu_data['harga_menu'];
		$Dimas_kategori_menu = $Dimas_menu_data['nama_kategori'];
		$Dimas_foto_menu = $Dimas_menu_data['foto_menu'];
        $Dimas_status_menu = $Dimas_menu_data['status_menu'];
	}


 ?>
<div class="main">

<form method="post" action="Dimas_proses_menu.php">
	 <h1>Edit Menu</h1>
	 <input type="hidden" name="id_role" value="<?=$Dimas_id_role?>">
	 <input type="hidden" name="id_menu" value="<?=$Dimas_id?>">
	 <br>
	 Nama Menu
	 <br>
	 <input type="text" name="nama_menu"  class="form-control w-100" value="<?=$Dimas_nama_menu?>"><br><br>

	 Harga
	 <br>
	 <input type="text" name="harga"  class="form-control w-100" value="<?=$Dimas_harga_menu?>"><br><br>

	 Kategori
	 <br>
	 	<select name="id_kategori"  class="form-select w-100 p-1" style="height: 25px; width: 610px;" >
		<option value="<?=$Dimas_kategori_menu?>"><?=$Dimas_kategori_menu?></option>
	<?php foreach($DimasA as $row) : ?>
		<option value="<?= $row[0] ?>"><?= $row[1] ?></option>
		<?php endforeach ?>
	</select> 
	<br><br>

	 Foto
	 <br>
	 <input type="file" name="foto"  class="form-label w-100"><br><br>

	 Status Menu
     <br>
     <select name="status_menu" id=""  class="form-select w-100 p-1" style="height: 30px; width: 610px;" >
	 	<option value="<?= $Dimas_status_menu?>"><?= $Dimas_status_menu?></option>
        <option value="Tersedia">Tersedia</option>
        <option value="Tidak Tersedia">Tidak Tersedia</option>
     </select><br><br>
	 
	 <button type="submit" name="ubah"  class="btn btn-primary">Ubah</button>
</form>


 </div>

</body>
</html>
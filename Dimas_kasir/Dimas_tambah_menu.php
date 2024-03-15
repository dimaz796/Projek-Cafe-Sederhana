<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Menu</title>
</head>
<body>
	<?php 
include"navbar.php";

$Dimas_sql = "SELECT * FROM `dimas_kategori`";
$Dimas_kategori = mysqli_query($conn, $Dimas_sql);
$DimasA = mysqli_fetch_all($Dimas_kategori);

 ?>
<div class="main">
<form method="post" action="Dimas_proses_menu.php">
	 <h1>Tambah Menu</h1>
	 <br>
	 Nama Menu
	 <br>
	 <input type="text" name="nama_menu" class="form-control w-100" placeholder=" Masukan Menu"><br><br>
	 Harga
	 <br>
	 <input type="number" name="harga" class="form-control w-100" placeholder=" Masukan Harga"><br><br>
	 
	Kategori
      <br>
	 	<select name="kategori" class="form-select w-100 h-100" style="height: 25px; width: 610px;">
	 		<?php foreach($DimasA as $row) : ?>
		<option value="<?= $row[0] ?>"><?= $row[1] ?></option>
		<?php endforeach ?>
	</select> 
	<br><br>

    Foto Menu
	 <br>
	 <input type="file" name="foto_menu" class="form-label w-100" placeholder=" Masukan Foto Menu"><br><br>

     Status Menu
     <br>
     <select name="status_menu" id=""  class="form-select w-100 h-100" style="height: 30px; width: 610px;">
        <option value="Tersedia">Tersedia</option>
        <option value="Tidak Tersedia">Tidak Tersedia</option>
     </select><br><br>

	 <button type="submit" name="simpan" class="btn btn-primary w-100">Simpan</button>
</form>

 </div>

</body>
</html>
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
<form method="post" action="Dimas_proses_pelanggan.php">
	 <h1>Tambah Pelanggan</h1>
	 <br>
	 Nama Pelanggan
	 <br>
	 <input type="text" name="nama_pelanggan" class="form-control w-100" placeholder=" Masukan Pelanggan"><br><br>

     Alamat
	 <br>
	 <input type="text" name="alamat" class="form-control w-100" placeholder=" Masukan Alamat"><br><br>

	 No Telephone
	 <br>
	 <input type="number" name="no_telepon" class="form-control w-100" placeholder=" Masukan No Telephone"><br><br>

     Jenis Kelamin
     <br>
     <select name="jenis_kelamin" id="" class="form-select w-100">
        <option value="Laki-Laki">Laki-Laki</option>
        <option value="Perempuan">Perempuan</option>
     </select>
	<br><br>

    Tempat Lahir
	 <br>
	 <input type="text" name="tempat_lahir" class="form-control w-100" placeholder=" Masukan Tempat Lahir"><br><br>

     Tanggal Lahir
     <br>
	 <input type="date" name="tanggal_lahir" class="form-control w-100" placeholder=" Masukan Tanggal Lahir"><br>
	 <br>
	 
	Jenis Pelanggan
      <br>
	<select name="jenis_pelanggan" class="form-select w-100">
		<option value = "Gold">Gold</option>
        <option value = "Silver">Silver</option>
        <option value = "Bronze">Bronze</option>
	</select> 
	<br><br>


	 <button type="submit" name="simpan" class="btn btn-primary w-100">Simpan</button>
</form>


 </div>

</body>
</html>
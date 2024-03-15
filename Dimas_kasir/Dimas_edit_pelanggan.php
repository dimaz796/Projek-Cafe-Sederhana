<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Pelanggan   </title>
</head>
<body>
	<?php 
include"navbar.php";
$Dimas_sql = "SELECT * FROM `dimas_kategori`";
$Dimas_menu = mysqli_query($conn, $Dimas_sql);
$DimasA = mysqli_fetch_all($Dimas_menu);
	
	$Dimas_id = $_GET['id'];
	$Dimas_result = mysqli_query($conn, "SELECT * FROM dimas_pelanggan 
										WHERE id_pelanggan=$Dimas_id");

	while($Dimas_pelanggan_data = mysqli_fetch_array($Dimas_result)){
        $Dimas_id_pelanggan = $Dimas_pelanggan_data['id_pelanggan'];
		$Dimas_nama_pelanggan = $Dimas_pelanggan_data['nama_pelanggan'];
		$Dimas_alamat = $Dimas_pelanggan_data['alamat'];
		$Dimas_no_telephone = $Dimas_pelanggan_data['no_telepon'];
		$Dimas_jenis_kelamin = $Dimas_pelanggan_data['jenis_kelamin'];
        $Dimas_tempat_lahir = $Dimas_pelanggan_data['tempat_lahir'];
        $Dimas_tanggal_lahir = $Dimas_pelanggan_data['tanggal_lahir'];
        $Dimas_jenis_pelanggan = $Dimas_pelanggan_data['jenis_pelanggan'];
	}


 ?>
<div class="main">

<form method="post" action="Dimas_proses_pelanggan.php">
	 <h1>Tambah Pelanggan</h1>
     <input type="hidden" name="id_pelanggan"  value="<?=$Dimas_id?>">
	 <br>
	 Nama Pelanggan
	 <br>
	 <input type="text" name="nama_pelanggan" class="form-control w-100" value="<?=$Dimas_nama_pelanggan;?>"><br><br>

     Alamat
	 <br>
	 <input type="text" name="alamat" class="form-control w-100" value="<?=$Dimas_alamat;?>"> <br><br>

	 No Telephone
	 <br>
	 <input type="number" name="no_telepon" class="form-control w-100" value="<?=$Dimas_no_telephone;?>"><br><br>

     Jenis Kelamin
     <br>
     <select name="jenis_kelamin" id="" class="form-select w-100" >
        <option value="<?= $Dimas_jenis_kelamin?>"><?= $Dimas_jenis_kelamin?></option>
        <option value="Laki-Laki">Laki-Laki</option>
        <option value="Perempuan">Perempuan</option>
     </select>
	<br><br>

    Tempat Lahir
	 <br>
	 <input type="text" name="tempat_lahir" class="form-control w-100"  value="<?=$Dimas_tempat_lahir;?>"><br><br>

     Tanggal Lahir
     <br>
	 <input type="date" name="tanggal_lahir" class="form-control w-100"  value="<?=$Dimas_tanggal_lahir;?>"><br>
	 <br>
	 
	Jenis Pelanggan
      <br>
	<select name="jenis_pelanggan" class="form-select w-100">
        <option value="<?=$Dimas_jenis_pelanggan?>"><?=$Dimas_jenis_pelanggan?></option>
		<option value = "Gold">Gold</option>
        <option value = "Silver">Silver</option>
        <option value = "Bronze">Bronze</option>
	</select> 
	<br><br>


	 <button type="submit" name="ubah" class="btn btn-primary w-100">Ubah</button>
</form>

 </div>

</body>
</html>
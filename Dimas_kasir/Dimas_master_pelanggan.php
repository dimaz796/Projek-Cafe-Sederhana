<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Pelanggan</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>

<?php 
include"navbar.php";
 ?>

 <?php 
 	$sql = "SELECT * FROM dimas_pelanggan";
	 if(isset($_POST['submit'])){
		$keywoard = $_POST['search'];
		$sql = "SELECT * FROM `dimas_pelanggan` 
		WHERE LOWER(nama_pelanggan) 
		LIKE '$keywoard%'
		OR alamat like '$keywoard%'
		OR no_telepon like '$keywoard%'
		OR tempat_lahir like '%$keywoard%'
		OR jenis_pelanggan like '%$keywoard%'
		OR jenis_kelamin like '%$keywoard%';";
		}
 	$pelanggan = mysqli_query($conn, $sql);
    $DimasBg= array("Gold"=>"warning","Silver"=>"light", "Bronze"=>"secondary", );
    
  ?>



<div class="main">
<h1>Data pelanggan</h1>


<div class="mb-3">
<a class="btn btn-primary" href="Dimas_tambah_pelanggan.php"><i class="bi bi-person-add"></i>Tambah Data User</a>
</div>


<nav class="navbar" style ='width: 1000px;' >
  <div class="container-fluid" >
    <a class="navbar-brand"></a>
    <form class="d-flex" role="search" method="post">
	<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-outline-success me-2" type="submit" name ="submit">Search</button>
	  <button class="btn btn-outline-danger" type="submit" name ="reset">Reset</button>
    </form>
  </div>
</nav>



<table class='table table-bordered table-striped table-hover' style ='width: 1000px;'>
	<tr class="align-middle">
		<th>ID</th>
		<th>Nama Pelanggan</th>
		<th >Alamat</th>
		<th>No Hp</th>
		<th>Jenis Kelamin</th>
        <th>TTL</th>
        <th >Jenis Pelanggan</th>
        <th>Aksi</th>
	</tr>

<?php 
foreach ($pelanggan as $row){ 
$Dimas_tanggal_lahir = strtotime($row["tanggal_lahir"]);
?>
		<tr class="tect-center align-middle">
		<td ><?= $row['id_pelanggan'] ;?></td>
		<td ><?= $row['nama_pelanggan'] ;?></td>
		<td ><?= $row['alamat'] ;?></td>
        <td ><?= $row['no_telepon'] ;?></td>
        <td ><?= $row['jenis_kelamin'] ;?></td>
        <td style="width:auto"><?= $row['tempat_lahir'] ;?> <?="," ;?> <?= date('d-m-Y',$Dimas_tanggal_lahir) ;?></td>
        <td><div class="badge text-bg-<?= $DimasBg[$row['jenis_pelanggan']] ?>">
        <?= $row['jenis_pelanggan']?></div></td>

		<td align="center" style="width : 200px">
			
			<a href="Dimas_edit_pelanggan.php?id=<?=$row['id_pelanggan']?>">
			<button class="btn btn-success">Edit </button>
			</a>
			<a href="Dimas_hapus_pelanggan.php?id=<?=$row['id_pelanggan']?>">
			<button class="btn btn-danger">Hapus </button>
			</a>
	</td>
	</tr>	
<?php } ?>


	
</table>
 

</body>
</html>
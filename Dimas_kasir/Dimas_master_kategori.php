<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data kategori</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<style >
		table{
			border-collapse: collapse;
			width: 10%;
		}
	</style>
</head>
<body>

<?php 
include"navbar.php";
 ?>

 <?php 
 	$Dimas_sql = "SELECT * FROM `dimas_kategori`";
	 
	if(isset($_POST['submit'])){
		$keywoard = $_POST['search'];
		$Dimas_sql = "SELECT * FROM `dimas_kategori` 
		WHERE LOWER(nama_kategori) 
		LIKE '$keywoard%'
		OR id_kategori like '$keywoard%'";
		}

 	$Dimas_kategori = mysqli_query($conn, $Dimas_sql);
  ?>



<div class="main">
<h1>Data kategori</h1>

<div class="mb-3">
<a class="btn btn-primary" href="Dimas_tambah_kategori.php"><i class="bi bi-person-add"></i>Tambah Data User</a>
</div>

<nav class="navbar" style ='width: 1000px;'>
  <div class="container-fluid" >
    <a class="navbar-brand"></a>
    <form class="d-flex" method="post">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-outline-success me-2" type="submit" name ="submit">Search</button>
	  <button class="btn btn-outline-danger" type="submit" name ="reset">Reset</button>
    </form>
  </div>
</nav>

<table class='table table-bordered table-striped table-hover' style ='width: 1000px;'>
	<tr>
		<th>ID kategori</th>
		<th>Nama kategori</th>
		<th>Aksi</th>
	</tr>

<?php 
foreach ($Dimas_kategori as $Dimas_row){ ?>
		<tr>
		<td><?= $Dimas_row['id_kategori'] ;?></td>
		<td ><?= $Dimas_row['nama_kategori'] ;?></td>
		<td align="center"><a href="Dimas_edit_kategori.php?id=<?=$Dimas_row['id_kategori']?>"><button class="btn btn-success">Edit</button></a> | <a href="Dimas_hapus_kategori.php?id=<?=$Dimas_row['id_kategori']?>"><button class="btn btn-danger">Hapus</button></a></td>
	</tr>	
<?php } ?>


	
</table>
</div>

</body>
</html>
<?php 
include"navbar.php";
 ?>
	<?php 

	
		$sql = "SELECT * FROM dimas_menu 
		JOIN dimas_kategori 
		ON dimas_menu.id_kategori = dimas_kategori.id_kategori";

		if(isset($_POST['submit'])){
		$keywoard = $_POST['search'];
		$id_kategori = $_POST['id_kategori'];

		if($id_kategori != ""){
			$sql = "SELECT * FROM dimas_menu 
					JOIN dimas_kategori 
					ON dimas_menu.id_kategori = dimas_kategori.id_kategori
					WHERE dimas_menu.nama_menu LIKE '%$keywoard%'
					AND dimas_kategori.id_kategori=$id_kategori";
		}else{
			$sql = "SELECT * FROM dimas_menu 
					JOIN dimas_kategori 
					ON dimas_menu.id_kategori = dimas_kategori.id_kategori
					WHERE dimas_menu.nama_menu LIKE '%$keywoard%'";
		}
		}
		
		$menu = mysqli_query($conn, $sql);
	  ?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Menu</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>

<div class="main">

<h1>Data Menu</h1>

<div class="mb-3">
<a class="btn btn-primary" href="Dimas_tambah_menu.php"><i class="bi bi-person-add"></i>Tambah Data User</a>
</div>

<nav class="navbar" style ='width: 1000px;'>
  <div class="container-fluid" >
    <a class="navbar-brand"></a>
    <form class="d-flex" method="post">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
	  <?php 
	  $sqlkategori = "SELECT * FROM dimas_kategori";
	  $kategori = mysqli_query($conn, $sqlkategori); 
	  
	  ?>
	  <select name="id_kategori" id="form-kategori" class="form-select me-2">
		<option value="">ALL</option>
		<?php foreach ($kategori as $row){?>
			<option value="<?=$row['id_kategori']?>"><?=$row['nama_kategori']?></option>
		<?php }?>	
	  </select>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           	
	  
      <button class="btn btn-outline-success me-2" type="submit" name ="submit">Search</button>
	  <button class="btn btn-outline-danger" type="submit" name ="reset">Reset</button>
    </form>
  </div>
</nav>




<table class='table table-bordered table-striped table-hover' style ='width: 1000px;'>
	<tr>
		<th>ID Menu</th>
		<th  style="width : 150px">Nama Menu</th>
		<th >Harga Menu</th>
		<th>Kategori</th>
		<th>Foto Menu</th>
        <th style="width : 150px">Status Menu</th>
        <th style ='width:200px;'>Aksi</th>
	</tr> 

<?php 
foreach ($menu as $row){ ?>
		<tr class="align-middle">
		<td ><?= $row['id_menu'] ;?></td>
		<td ><?= $row['nama_menu'] ;?></td>
		<td ><?= $row['harga_menu'] ;?></td>
        <td ><?= $row['nama_kategori'] ;?></td>
        <td ><img style="width : 75px" src="pict/<?= $row['foto_menu'];?>" alt=""></td>
        <td ><?= $row['status_menu'] ;?></td>
		<td align="center">
			
			<a href="Dimas_edit_menu.php?id=<?=$row['id_menu']?>">
			<button class="btn btn-success">Edit </button>
			</a>
			<a href="Dimas_hapus_menu.php?id=<?=$row['id_menu']?>">
			<button class="btn btn-danger">Hapus </button>
			</a>
	</td>
	</tr>	
<?php } ?>


	
</table>
</div>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data User</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>

<?php 
include"navbar.php";
 ?>

 <?php 
 	$sql = "SELECT * FROM dimas_user JOIN dimas_nama_role ON dimas_user.id_role=dimas_nama_role.id_role";

	 if(isset($_POST['submit'])){
		$keywoard = $_POST['search'];
		$id_role = $_POST['id_role'];

		if($id_role != ""){
			$sql = "SELECT * FROM dimas_user
					JOIN dimas_nama_role 
					ON dimas_user.id_role = dimas_nama_role.id_role
					WHERE dimas_user.nama_user LIKE '%$keywoard%'
					AND dimas_nama_role.id_role=$id_role";
		}else{
			$sql = "SELECT * FROM dimas_user
					JOIN dimas_nama_role 
					ON dimas_user.id_role = dimas_nama_role.id_role
					WHERE dimas_user.nama_user LIKE '%$keywoard%'";
		}
		}

 	$user = mysqli_query($conn, $sql);
  ?>



<div class="main">
<h1>Data user</h1>

<div class="mb-3">
<a class="btn btn-primary" href="Dimas_tambah_user.php"><i class="bi bi-person-add"></i>Tambah Data User</a>
</div>

<nav class="navbar" style ='width: 1000px;'>
  <div class="container-fluid" >
    <a class="navbar-brand"></a>
    <form class="d-flex" method="post">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
	  <?php 
	  $sqlrole = "SELECT * FROM dimas_nama_role";
	  $role = mysqli_query($conn, $sqlrole); 
	  
	  ?>
	  <select name="id_role" id="form-kategori" class="form-select me-2">
		<option value="">ALL</option>
		<?php foreach ($role as $row){?>
			<option value="<?=$row['id_role']?>"><?=$row['nama']?></option>
		<?php }?>	
	  </select>
      <button class="btn btn-outline-success me-2" type="submit" name ="submit">Search</button>
	  <button class="btn btn-outline-danger" type="submit" name ="reset">Reset</button>
    </form>
  </div>
</nav>


<table class='table table-bordered table-striped table-hover' style ='width: 1000px;'>
	<tr>
		<th>ID user</th>
		<th>Nama user</th>
		<th>Username</th>
		<th>Role</th>
		<th>Aksi</th>
	</tr>

<?php 
foreach ($user as $row){ ?>
		<tr>
		<td><?= $row['id_user'] ;?></td>
		<td ><?= $row['nama_user'] ;?></td>
		<td ><?= $row['username'] ;?></td>
		<td ><?= $row['nama'] ;?></td>
		<td align="center">
			<a href="edit_user.php?id=<?=$row['id_user']?>">
			<button class="btn btn-success">Edit</button>
		</a> |
		 <a href="Dimas_hapus_user.php?id=<?=$row['id_user']?>">
		 <button class="btn btn-danger">Hapus</button>
		</a>
	</td>
	</tr>	
<?php } ?>


	
</table>
</div>

</body>
</html>